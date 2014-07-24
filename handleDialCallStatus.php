<?php 

// If the call is due to be hung up be cause the whisper hung up, then we want to redirect the call to Voicemail and capture the Voicemail

$whisperStatus = $_POST["DialCallStatus"];

if ($whisperStatus == "busy" or "no-answer" or "failed") {

$TwiMLResponse = "<Say>I am sorry. No one is around at the moment to take your call. Please leave your name and number and someone will get back to you shortly. Thank you!</Say><Record action=\"./handleRecording.php\" maxLength=\"60\" finishOnKey=\"*\" /><Say>I did not receive a recording</Say>";
}
else
{
$TwiMLResponse = "<Hangup/>";
}

header("content-type: text/xml"); 
?>

<Response><?php echo $TwiMLResponse; ?></Response>