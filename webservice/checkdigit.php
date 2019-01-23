<?php

$sscc = $_REQUEST['sscc'];

calculateCheckDigit($sscc);


function calculateCheckDigit($barcode){
        $i = 0;
        $length = strlen($barcode);
        $response = '';
        $checkdigit = 0;

        if ($length == 17){
                while($i < $length){
                        if ($i % 2 == 0){
                                $value = intval($barcode[$i]) * 3;
                                $checkdigit += $value;
                        }
                        if ($i % 2 == 1){
                                $value = intval($barcode[$i]) * 1;
                                $checkdigit += $value;
                        }
                        $checkdigit += value;
                        $i++;
                }
                $checkdigit = ceil($checkdigit/10) * 10 - $checkdigit;
                $fullbarcode = "(00) " . $barcode . $checkdigit;
                $response['response'] = $fullbarcode;
        }else{
                $response['response'] = "This barcode is not the correct length for an SSCC-18 barcode. Please check your entry and try again";
        }

        echo json_encode($response);
}
