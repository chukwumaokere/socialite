<?php 
include '../../../db.php';
global $db;
	$json = file_get_contents('php://input');

	$obj = json_decode($json,true);

	$username= $obj['username'];
	$password = $obj['password'];
	$email = $obj['email'];
	$phone = $obj['phone'];
	$firstn = $obj['firstname'];
	$lastn = $obj['lastname'];
	$dob =  DateTime::createFromFormat('F d, Y', $obj['dob']);
	$newdob = $dob->format('Y-m-d');
	$date = date('Y-m-d H:i:s');
	$fields = [
		'username' => $username,
		'password' => $password,
		'email' => $email,
		'phone' => $phone,
		'firstname' => $firstn,
		'lastname' => $lastn,
	];
	$pre = 'Account Creation Failed!';
	$msg = '';
	$err = 0;
	$errt = 0;
	foreach($fields as $field => $value){
		if (empty($fields[$field]) || $fields[$field] == '' || !$fields[$field]){
			$err = 1;
			if ($field == 'firstname') $field = 'first Name';
			if ($field == 'lastname') $field = 'last Name';
			$field = ucfirst($field);
		
			$msg .= "$field is empty\n";
		}
	}
	if ($err == 0){
		$check = $db->query("SELECT * FROM users WHERE email = '$email'");
		$checktwo = $db->query("SELECT * FROM users WHERE username = '$username'");
		if ($check->num_rows > 0){
			$errt = 1;
			$msg .= $pre . "Account with that Email already exists! \n";
                       // echo json_encode('Account with that Email already exists!');
                }
		if($checktwo->num_rows > 0){
			$errt = 1;
			if ($msg == ''){
				$msg .= $pre . "Account with that Username already exists! \n ";
			}else{
				$msg .= "Account with that Username already exists! \n ";
			}
			//echo json_encode('Account with that Username already exists!');
		}
		if ($errt == 0){
			$q = "INSERT INTO users (username, password, firstname, lastname, email, phonenumber, dob, last_login, logged_in, session_key, date_signed_up) VALUES ('$username', '$password', '$firstn', '$lastn', '$email', '$phone', '$newdob', NULL, NULL, NULL, '$date')";
			$add = $db->query($q);
			if ($add){
				$msg .= 'Account Created Successfully!';
				//echo json_encode('Account Created Successfully!');
			}else{
				$msg .= 'Account creation failed. Please try again';
				//$msg .= "\n $q";
				//echo json_encode('Account creation failed. Please try again');
                        }
		}

		
	}else{
		$msg = $pre . $msg;
	}

	echo json_encode($msg);
?>
