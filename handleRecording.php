<?php 
// Define Email Address and Name

$eMailAddress = "YOUR EMAIL ADDRESS";
$emailName = "YOUR NAME";
$phoneLineName = "YOUR PHONE LINE NAME";

// Get the details of the call and recording
$recordingURL = $_POST["RecordingUrl"];
$fromCallerID = $_POST["From"];

// Get the Time
$humanTime = date('H:i d/F', time());

// Assemble the headers
$headers = "From: Voicemail<voicemail@YOURDOMAIN.com>\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

// Assemble the MessageBody. 
$eMailBody = "Hi $emailName,<br /><br />";
$eMailBody .= "The $phoneLineName was Called today at: $humanTime<br />";
$eMailBody .= "The Caller ID was: $fromCallerID<br />";
$eMailBody .= "The Voicemail is: <br /><br /><audio controls><source src=\"$recordingURL\"></audio><br /><br />";
$eMailBody .= "<a href=\"$recordingURL\">Click here To listen</a><br />";
$eMailBody .= "Thanks!<br /><br />Chicken Voicemail!";

// Assemble the Mail message
// mail(to,subject,message,headers,parameters);

mail($eMailAddress, "New Voicemail for $phoneLineName", $eMailBody, $headers);

header("content-type: text/xml"); 
?>

<Response></Response>