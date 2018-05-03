<?php
include '../../../db.php';
global $db;
        $json = file_get_contents('php://input');

        $obj = json_decode($json,true);
        $id = $obj['id'];

        $q = "SELECT * FROM users WHERE id = $id";
	$check = $db->query($q);
	
	if ($check->num_rows > 0){
		while ($row = $check->fetch_assoc() ){
			$retrievedHL = $row['handlelinks'];
			if ($retrievedHL == '0'){
                        	$retrievedHL = false;
                        }else{
                        	$retrievedHL = true;
                        }
			
		
		}
	}
        $text .= "Retrieved Data Successfully \n";
        $msg = array(
			'response' => $text,
			'data' => ['handlelinks' => $retrievedHL,],
                    );
	
        echo json_encode($msg);
