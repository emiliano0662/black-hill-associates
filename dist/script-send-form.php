<?php
$targetfolder = "files/";

$targetfolder = $targetfolder . basename($_FILES['input_file_cv']['name']);

$file_type = $_FILES['input_file_cv']['type'];

if ($file_type == "application/pdf") 
{
	move_uploaded_file($_FILES['input_file_cv']['tmp_name'], $targetfolder);
}

$message = $_POST['input_message'];
$email = $_POST['input_email'];

$asunto = "Resume Services (Load & Paid)";
$destinatario = "info@blackhillassociates.com"; 

$cuerpo = "<html><head><title>Black Hill Associates</title></head><body><p><b>Email:</b> ".$email."</p><br><p><b>Message:</b> ".$message."</p><br><p><b>Resume Services: </b> <a href=\"http://blackhillassociates.com/beta/".$targetfolder."\" target=\"_blank\" download>Download</a></p></body></html>"; 

$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

$headers .= "From: ".$email."\r\n"; 
$headers .= "Reply-To: ".$email."\r\n"; 

mail($destinatario,$asunto,$cuerpo,$headers);

$today = date("dmYHis");

$data = array(
    'cmd'               => '_xclick',
    'hosted_button_id'  => '6RNT8A4HBBJRE',
    'business'          => 'pariadac001-facilitator-1@gmail.com',
    'custom'            => $today,
    'item_name'         => 'Black Hill Associates',
    'item_number'       => '1',
    'amount'            => 30,
    'charset'           => 'utf-8',
    'lc'                => 'US',
    'currency_code'     => 'USD',
    'cancel_return'     => 'http://localhost/black-hill-associates/dist/',
    'return'            => 'http://localhost/black-hill-associates/dist/'
); ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Black Hill Associates</title>

    <style type="text/css">
        #windows-fixed {
            width: 100%;
            height: 100vh;
            position: fixed;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
        }
        #windows-fixed h3 {
            font-family: 'Arial';
            font-size: 40px;
            color: #1c38b4;
        }
    </style>
</head>
<body>

    <div id="windows-fixed"><h3>loading...</h3></div>

    <form id="pay" method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr" target="_self">
        <?php foreach($data as $key => $value): ?>
            <input name="<?=$key?>" type="hidden" value="<?=$value?>">
        <?php endforeach; ?>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript">$(document).ready(function() { $("#pay").submit(); });</script>

</body>
</html>