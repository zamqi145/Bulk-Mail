<meta charset="UTF-8">
<?php 
include("connect.php");
require("library/class.phpmailer.php");
$sayi = 1;
$bak = $conn->query("SELECT * FROM users WHERE onay!='0' "); // Update
while ($say = mysqli_fetch_array($bak)) {
	$ad = $say['username']; //update
	$alici = $say['eposta']; //update
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPDebug = 1; 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'ssl'; //chose your SMTPSecure (ssl or tls)
	$mail->Host = "mail.site.com"; //update your Host like mail.site.com
	$mail->Port = 465; //587 for tls, 465 for ssl(you can find your settings in your web mail
	$mail->IsHTML(true);
	$mail->SetLanguage("tr", "library/phpmailer/language"); //choose language
	$mail->CharSet  ="utf-8";
	$mail->Username = "info@site.com"; //username (web mail adress)
	$mail->Password = "password"; //password (web mail password)
	$mail->SetFrom("info@site.com", "Title"); //forwarder mail and person
	$mail->AddAddress($alici);
	$mail->Subject = "Mail Title"; //Mail Title
	$mail->Body = " Your mail"; //Your Mail, you can use like this: $ad."Your mail";
	if(!$mail->Send()){
		echo $sayi." - E-mail Error: ".$mail->ErrorInfo."<br>";
	} else {
		echo $sayi." - Succesful  <br>";
	}
	$sayi++;
}
?>
