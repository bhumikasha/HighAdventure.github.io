<?php

$to				= "info@tourthehimalayas.com,highadventure@rediffmail.com, hiadventure@gmail.com";
$subject		= "Website eMail from High Adventure";
$headers  		= "MIME-Version: 1.0" . "\r\n";
$headers 		= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$message 		= "


<html>
<body>
<center>

  <p align='center'>
  <font face='Verdana'><u><b><font size='4' color='#800000'>
  Client Mail for High Adventure 
  </font></b></u></font>
  </p>

 <table border='0' cellspacing='1' width='92%' id='AutoNumber10' class='simpletext'>

 <tr>
    <td align='right'> <strong> Name</strong></td>
    <td >&nbsp;</td>
    <td >". $_POST['name'] ."</td>
  </tr>

  <tr>
    <td align='right'> <strong> Mobile No</strong></td>
    <td >&nbsp;</td>
    <td >". $_POST['mobile'] ."</td>
  </tr>
    
   <tr>
    <td align='right'> <strong> Email</strong></td>
    <td >&nbsp;</td>
    <td >". $_POST['email'] ."</td>
  </tr>
  
   <tr>
    <td align='right'> <strong> Person</strong></td>
    <td >&nbsp;</td>
    <td >". $_POST['person'] ."</td>
  </tr>
     <tr>
    <td align='right'> <strong> Children</strong></td>
    <td >&nbsp;</td>
    <td >". $_POST['children'] ."</td>
  </tr> 
  
   <tr>
    <td align='right'> <strong> Days</strong></td>
    <td >&nbsp;</td>
    <td >". $_POST['days'] ."</td>
  </tr>
  
  <tr>
    <td align='right'> <strong>Traveldate</strong></td>
    <td >&nbsp;</td>
    <td >". $_POST['traveldate'] ."</td>
  </tr>
  
   <tr>
    <td align='right'> <strong>Budget</strong></td>
    <td >&nbsp;</td>
    <td >". $_POST['budget'] ."</td>
  </tr>

  <tr>
    <td align='right'> <strong> Country</strong></td>
    <td >&nbsp;</td>
    <td >". $_POST['country'] ."</td>
  </tr>
	<tr>
    <td align='right'> <strong>Comments</strong></td>
    <td >&nbsp;</td>
    <td >". $_POST['comments'] ."</td>
  </tr>

</table>               
</body>
</html>

";
$headers .= "To: High Adventure <". $to .">" . "\r\n";

$headers .= "From:". $_POST['email'] . "\r\n";

mail($to, $subject, $message, $headers);

print "<script>alert('Your Request Send. We will contact you soon.'); window.location = 'index.html'</script>";

?>