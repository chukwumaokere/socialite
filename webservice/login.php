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
	
	$fields = [
		'username' => $username,
		'password' => $password,
		'email' => $email,
		'phone' => $phone,
		'firstname' => $firstn,
		'lastname' => $lastn,
	];

	$reqfields = [
		'username' => $username,
		'password' => $password,
	];

	$enteredUN = $reqfields['username'];
        $enteredPW = $reqfields['password'];

	$pre = "Login Failed! \n";
	$msg = '';
	$err = 0;
	$errt = 0;
	foreach($reqfields as $field => $value){
		if (empty($reqfields[$field]) || $reqfields[$field] == '' || !$reqfields[$field]){
			$err = 1;
			$field = ucfirst($field);
		
			$msg .= "$field is empty\n";
		}
	}
	if ($err == 0){
		$q = "SELECT * FROM users WHERE username = '$username' AND (deleted IS NULL OR deleted != 1)";
		$check = $db->query($q);
	//	$check = $db->query("SELECT * FROM users WHERE username = '$username'");
		if ($check->num_rows > 0){ 
			
			while ($row = $check->fetch_assoc() ){
				$retrievedID = $row['id'];
				$retrievedPW = $row['password']; 
				$retrievedUN = $row['username'];
				$retrievedFN = $row['firstname'];
				$retrievedLN = $row['lastname'];
				$retrievedEM = $row['email'];
				$retrievedPN = $row['phonenumber'];
				$retrievedBD = $row['dob'];
				$retrievedSD = $row['date_signed_up'];
				$retrievedPP = $row['profilepic'];
				$retrievedHL = $row['handlelinks'];
				//$retrievedHL = settype($retrievedHL, 'boolean');

				$enteredUN = $reqfields['username'];
                        	$enteredPW = $reqfields['password'];	
				if ($retrievedPW && $retrievedUN && $enteredUN && $enteredPW){
					 if ( (strtolower($enteredUN) != strtolower($retrievedUN)) || $enteredPW != $retrievedPW){
						$errt = 1; 
                                        	$msg .= "Could not log in with that info. \n Please check your Username and Password. \n";
					 }
				}
			}
                }else{
			$errt = 1;
			$msg .= "No account found with the entered information";
		}
		if ($errt == 0){
			$text .= "Login Successful! \n";
			$msg = array('response' => $text,
					'data' => ['id' => $retrievedID,
						   'firstname' => $retrievedFN,
						   'lastname' => $retrievedLN,
						   'email' => $retrievedEM,
						   'phone' => $retrievedPN,
						   'birthday' => $retrievedBD,
						   'date_signed_up' => $retrievedSD,
						   'profilepic' => $retrievedPP,
						   'handlelinks' => $retrievedHL,
							],
					);
                }
	}else{
		$msg = $pre . $msg;
	}

		echo json_encode($msg);
?>
