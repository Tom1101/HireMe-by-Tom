<?php
function sendMail($title, $content, $nTo, $mTo,$diachicc=''){
	$nFrom = 'HireMe by Tom';
	$mFrom = 'tp049268@mail.apu.edu.my';	//dia chi email cua ban
	$mPass = 'Tuananh1101';		//mat khau email cua ban
	$mail             = new PHPMailer();
	$body             = $content;
	$mail->IsSMTP(); 
	$mail->CharSet 	= "utf-8";
	$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
	$mail->SMTPAuth   = true;                  	// enable SMTP authentication
	$mail->SMTPSecure = "STARTTLS";                 // sets the prefix to the servier
	$mail->Host       = "smtp.office365.com";
	$mail->Port       = 587;
	$mail->Username   = $mFrom;  // GMAIL username
	$mail->Password   = $mPass;           	 // GMAIL password
	$mail->SetFrom($mFrom, $nFrom);
	//chuyen chuoi thanh mang
	$ccmail = explode(',', $diachicc);
	$ccmail = array_filter($ccmail);
	if(!empty($ccmail)){
		foreach ($ccmail as $k => $v) {
			$mail->AddCC($v);
		}
	}
	$mail->Subject    = $title;
	$mail->MsgHTML($body);
	$address = $mTo;
	$mail->AddAddress($address, $nTo);
	$mail->AddReplyTo('tp049268@mail.apu.edu.my', 'HireMe by Tom');
	if(!$mail->Send()) {
		return 0;
	} else {
		return 1;
	}
}

function sendMailAttachment($title, $content, $nTo, $mTo,$diachicc='',$file,$filename){
	$nFrom = 'Freetuts.net';
	$mFrom = 'xxxx@gmail.com';	//dia chi email cua ban 
	$mPass = 'passlamatkhua';		//mat khau email cua ban
	$mail             = new PHPMailer();
	$body             = $content;
	$mail->IsSMTP(); 
	$mail->CharSet 	= "utf-8";
	$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
	$mail->SMTPAuth   = true;                  	// enable SMTP authentication
	$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
	$mail->Host       = "smtp.gmail.com";      	
	$mail->Port       = 465;
	$mail->Username   = $mFrom;  // GMAIL username
	$mail->Password   = $mPass;           	 // GMAIL password
	$mail->SetFrom($mFrom, $nFrom);
	//chuyen chuoi thanh mang
	$ccmail = explode(',', $diachicc);
	$ccmail = array_filter($ccmail);
	if(!empty($ccmail)){
		foreach ($ccmail as $k => $v) {
			$mail->AddCC($v);
		}
	}
	$mail->Subject    = $title;
	$mail->MsgHTML($body);
	$address = $mTo;
	$mail->AddAddress($address, $nTo);
	$mail->AddReplyTo('info@freetuts.net', 'Freetuts.net');
	$mail->AddAttachment($file,$filename);
	if(!$mail->Send()) {
		return 0;
	} else {
		return 1;
	}
}

function randomString($length = 6) {
    $str = "";
    $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
    $max = count($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(0, $max);
        $str .= $characters[$rand];
    }
    return $str;
}

?>