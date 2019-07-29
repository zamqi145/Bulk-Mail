<meta charset="UTF-8">
<?php 
include("connect.php");
require("class.phpmailer.php");
$sayi = 1;
$bak = $conn->query("SELECT * FROM users WHERE hesapturu!='0' && onay!='0' ");
while ($say = mysqli_fetch_array($bak)) {
    $ad = $say['username'];
    $alici = $say['eposta'];
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPDebug = 1; 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "mail.reklaminiz.com"; 
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->SetLanguage("tr", "phpmailer/language");
	$mail->CharSet  ="utf-8";
	$mail->Username = "info@reklaminiz.com"; 
	$mail->Password = "15995135775314785236";
	$mail->SetFrom("info@reklaminiz.com", "Reklamınız Reklam Sistemi - Destek Ekibi"); 
	$mail->AddAddress($alici);
	$mail->Subject = "Bayramınız Kutlu Olsun"; 
	$mail->Body = $ad." Bey, huzur, sağlık ve mutluluk dolu bayramlar yaşamak dileği ile Ramazan Bayramını en içten dileklerimizle kutluyoruz.<br>Reklamınız - Reklam Sistemi Destek Ekibi"; 
	if(!$mail->Send()){
		echo $sayi." - Email Gönderim Hatasi: ".$mail->ErrorInfo."<br>";
	} else {
		echo $sayi." - Email Gonderildi <br>";
	}
	$sayi++;

}

?>