<?php
$to = "nhungnth72@wru.n";
$subject = "Send Email from Localhost";
$txt = "Hello Teacher!";
$headers = "From: nhungnguyenkuma@gmail.com" . "\r\n" .
"CC: somebodyelse@example.com";
$sendmail = mail($to,$subject,$txt,$headers);
if ( $sendmail == true ) {
    echo " Gửi thành công ";
}else{
    echo " Gửi không thành công ";
}
?>
