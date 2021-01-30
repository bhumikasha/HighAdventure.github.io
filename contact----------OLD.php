.<?php
// Website Contact Form Generator 
// http://www.tele-pro.co.uk/scripts/contact_form/ 
// This script is free to use as long as you  
// retain the credit link 
 
function authSendEmail($from, $namefrom, $to, $nameto, $subject, $message)
{
//SMTP + SERVER DETAILS
/* * * * CONFIGURATION START * * * */
$smtpServer = "mail.tourthehimalayas.com";
$port = "25";
$timeout = "30";
$username = "info@tourthehimalayas.com";
$password = "high88088";
$localhost = "localhost";
$newLine = "\r\n";
/* * * * CONFIGURATION END * * * * */

//Connect to the host on the specified port
$smtpConnect = fsockopen($smtpServer, $port, $errno, $errstr, $timeout);
$smtpResponse = fgets($smtpConnect, 515);
if(empty($smtpConnect))
{
$output = "Failed to connect: $smtpResponse";
return $output;
}
else
{
$logArray['connection'] = "Connected: $smtpResponse";
}

//Request Auth Login
fputs($smtpConnect,"AUTH LOGIN" . $newLine);
$smtpResponse = fgets($smtpConnect, 515);
$logArray['authrequest'] = "$smtpResponse";

//Send username
fputs($smtpConnect, base64_encode($username) . $newLine);
$smtpResponse = fgets($smtpConnect, 515);
$logArray['authusername'] = "$smtpResponse";

//Send password
fputs($smtpConnect, base64_encode($password) . $newLine);
$smtpResponse = fgets($smtpConnect, 515);
$logArray['authpassword'] = "$smtpResponse";

//Say Hello to SMTP
fputs($smtpConnect, "HELO $localhost" . $newLine);
$smtpResponse = fgets($smtpConnect, 515);
$logArray['heloresponse'] = "$smtpResponse";

//Email From
fputs($smtpConnect, "MAIL FROM: $from" . $newLine);
$smtpResponse = fgets($smtpConnect, 515);
$logArray['mailfromresponse'] = "$smtpResponse";

//Email To
fputs($smtpConnect, "RCPT TO: $to" . $newLine);
$smtpResponse = fgets($smtpConnect, 515);
$logArray['mailtoresponse'] = "$smtpResponse";

//The Email
fputs($smtpConnect, "DATA" . $newLine);
$smtpResponse = fgets($smtpConnect, 515);
$logArray['data1response'] = "$smtpResponse";

//Construct Headers
$headers = "MIME-Version: 1.0" . $newLine;
$headers .= "Content-type: text/html; charset=iso-8859-1" . $newLine;
$headers .= "To: $nameto <$to>" . $newLine;
$headers .= "From: $namefrom <$from>" . $newLine;

fputs($smtpConnect, "To: $to\nFrom: $from\nSubject: $subject\n$headers\n\n$message\n.\n");
$smtpResponse = fgets($smtpConnect, 515);
$logArray['data2response'] = "$smtpResponse";

// Say Bye to SMTP
fputs($smtpConnect,"QUIT" . $newLine);
$smtpResponse = fgets($smtpConnect, 515);
$logArray['quitresponse'] = "$smtpResponse";
}

// get posted data into local variables
$EmailFrom 	= "info@tourthehimalayas.com";
$EmailTo 	= "info@tourthehimalayas.com,hiadventure@gmail.com";
$Subject 	= "From website";
$fname 		= Trim(stripslashes($_POST['name'])); 
$cell 		= Trim(stripslashes($_POST['mobile'])); 
$email 		= Trim(stripslashes($_POST['email'])); 
$person		= Trim(stripslashes($_POST['person'])); 
$children 	= Trim(stripslashes($_POST['children'])); 
$days		= Trim(stripslashes($_POST['days'])); 
$traveldate	= Trim(stripslashes($_POST['traveldate'])); 
$budget 	= Trim(stripslashes($_POST['budget'])); 
$country 	= Trim(stripslashes($_POST['country']));
$comments 	= Trim(stripslashes($_POST['comments']));

// validation
$validationOK=true;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=thankyou.htm\">";
  exit;
}

// prepare email body text
$Body = "";
$Body .= "fname: ";
$Body .= $name;
$Body .= "\n";
$Body .= "cell: ";
$Body .= $cell;
$Body .= "\n";
$Body .= "email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "person: ";
$Body .= $person;
$Body .= "\n";
$Body .= "children: ";
$Body .= $children;
$Body .= "\n";
$Body .= "days: ";
$Body .= $days;
$Body .= "\n";
$Body .= "traveldate: ";
$Body .= $traveldate;
$Body .= "\n";
$Body .= "budget: ";
$Body .= $budget;
$Body .= "\n";
$Body .= "country: ";
$Body .= $coutry;
$Body .= "\n";
$Body .= "comments: ";
$Body .= $comments;
$Body .= "\n";


 
$to =$EmailTo;
$nameto = $name;
$from = $EmailFrom;
$namefrom = "Webmaster";
$subject =$Subject;
$message = $Body;
if(authSendEmail($from, $namefrom, $to, $nameto, $subject, $message))

{
 
print "<meta http-equiv=\"refresh\" content=\"0;URL=thankyou.htm\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=thankyou.htm\">";
}


?>

