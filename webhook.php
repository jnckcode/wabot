<?php
$input=file_get_contents("php://input");
preg_match('/"message":"([^"]+)"/msu',$input,$match);
//echo $match[1];

//Data Parses Base64 Encode&Decode
if (preg_match('/#encode64/msu', $match[1]) == 1) {
	$cutComm=str_replace("#encode64 ",'', $match[1]);
	$encode64=base64_encode($cutComm);
	//echo $encode64;
	//SendData To chat
$arr1 = [
   "replies" => [
   	     [
            "message" => "{Created By JNCKCode}" 
         ],
         [
            "message" => "$encode64" 
         ], 
         [
            "message" => "Success Encode To base64" 
         ]
      ] 
];
$json1=json_encode($arr1);
print_r($json1);
}elseif(preg_match('/#decode64/msu', $match[1]) == 1) {
	$cutCommx=str_replace("#decode64 ",'', $match[1]);
	$decode64=base64_decode($cutCommx);
	//echo $decode64;
	$arr2 = [
   "replies" => [
   	     [
            "message" => "{Created By JNCKCode}" 
         ],
         [
            "message" => "$decode64" 
         ], 
         [
            "message" => "Success Decode To Binary" 
         ]
      ] 
];
$json2=json_encode($arr2);
print_r($json2);
}

//Data Parses Hex-Bin
if (preg_match('/#hex2bin/msu', $match[1]) == 1) {
	$cuthex=str_replace("#hex2bin ",'', $match[1]);
	$hex2bin=hex2bin($cuthex);
	//echo $hex2bin;
	$arr3 = [
   "replies" => [
   	     [
            "message" => "{Created By JNCKCode}" 
         ],
         [
            "message" => "$hex2bin" 
         ], 
         [
            "message" => "Success Encode To Hex2Bin" 
         ]
      ] 
];
$json3=json_encode($arr3);
print_r($json3);
}elseif(preg_match('/#bin2hex/msu', $match[1]) == 1) {
	$cutbin=str_replace("#bin2hex ",'', $match[1]);
	$bin2hex=bin2hex($cutbin);
	//echo $bin2hex;
	$arr4 = [
   "replies" => [
   	     [
            "message" => "{Created By JNCKCode}" 
         ],
         [
            "message" => "$bin2hex" 
         ], 
         [
            "message" => "Success Encode To Bin2Hex" 
         ]
      ] 
];
$json4=json_encode($arr4);
print_r($json4);
}

//Quotes
if (preg_match('/#getQuote/msu', $match[1]) == 1) {
	//$cuthex=str_replace("#hex2bin ",'', $match[1]);
	$file=file_get_contents('quote.txt');
	$gas = explode("|",$file);
	$date=date("d-m-Y");
	$gasx=$gas[array_rand($gas,1)];
	//echo $gas[array_rand($gas,1)];
	$arr5 = [
   "replies" => [
   	     [
            "message" => "{Created By JNCKCode}" 
         ],
         [
            "message" => "$gasx" 
         ], 
         [
            "message" => "Bumi, $date" 
         ]
      ] 
];
$json5=json_encode($arr5);
print_r($json5);
}elseif(preg_match('/#putQuote/msu', $match[1]) == 1) {
	$quote=str_replace("#putQuote ",'', $match[1]);
	$insert=file_put_contents('quote.txt', '|'.$quote,FILE_APPEND);
	//print_r(file_get_contents('quote.txt'));
	$arr6 = [
   "replies" => [
   	     [
            "message" => "{Created By JNCKCode}" 
         ],
         [
            "message" => "Update Quotes Sukses !" 
         ], 
         [
            "message" => "$quote" 
         ]
      ] 
];
$json6=json_encode($arr6);
print_r($json6);
}

//LINK DOWNLOAD
//Quotes
if (preg_match('/#getLink/msu', $match[1]) == 1) {
	//$cuthex=str_replace("#hex2bin ",'', $match[1]);
	$file=file_get_contents('link.txt');
	$gas = explode("|",$file);
	$date=date("d-m-Y");
	$gasxz=$gas[array_rand($gas,1)];
	//echo $gas[array_rand($gas,1)];
	$arr7 = [
   "replies" => [
   	     [
            "message" => "{Created By JNCKCode}" 
         ],
         [
            "message" => "$gasxz" 
         ], 
         [
            "message" => "Server_Date: $date" 
         ]
      ] 
];
$json7=json_encode($arr7);
print_r($json7);
}elseif(preg_match('/#putLink/msu', $match[1]) == 1) {
	$quote=str_replace("#putLink ",'', $match[1]);
	$insert=file_put_contents('link.txt', '|'.$quote,FILE_APPEND);
	//print_r(file_get_contents('quote.txt'));
	$arr8 = [
   "replies" => [
   	     [
            "message" => "{Created By JNCKCode}" 
         ],
         [
            "message" => "Update Link Sukses !" 
         ], 
         [
            "message" => "$quote" 
         ]
      ] 
];
$json8=json_encode($arr8);
print_r($json8);
}
?>