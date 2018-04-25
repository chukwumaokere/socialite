<?php
include '../../../db.php';
global $db;
        $json = file_get_contents('php://input');

        $obj = json_decode($json,true);
	$id = $obj['id'];
/*
	$id = $obj['id'];
        $username= $obj['username'];
        $password = $obj['password'];
        $email = $obj['email'];
        $phone = $obj['phone'];
        $firstn = $obj['firstname'];
        $lastn = $obj['lastname'];
*/
/*
        $fields = [
                'username' => $username,
                'password' => $password,
                'email' => $email,
                'phone' => $phone,
                'firstname' => $firstn,
                'lastname' => $lastn,
        ];
*/	
	$base = 'UPDATE users SET ';
	$addon = '';
	foreach ($obj AS $fieldname => $value){
		if ($fieldname == 'handlelinks' && $value == ''){
			$value = 0;
		}
		if ($fieldname == 'handlelinks' && $value == '0'){
                        $value = 0;
                }
		if ($fieldname == 'handlelinks' && $value == '1'){
                        $value = 1;
                }
		if ($fieldname != 'id'){
                        $addon .= "$fieldname = \"$value\", ";
                }
	}
	$addon = rtrim($addon, ', ');
	$addon .= ' ';
	$where = "WHERE id = $id";
	$q = $base . $addon . $where;

	$db->query($q);
	echo json_encode("$q");

//$sm = print_r($obj, true);
//file_put_contents("dumpobj.txt", $sm);
