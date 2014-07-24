<?php 

// Picks up the response from the agents input. If they Pressed 1 we connect the call, if they press 2 we close the line. 

$agentResponse = $_POST["Digits"]; 

// If the agents response is to divert to VM then issue the VM Response, If not connect the call.
if ($agentResponse == "1") {
$TwiMLResponse = "<Say>Connecting You To The Caller</Say>";
}
if ($agentResponse == "2") {
$TwiMLResponse = "<Hangup/>";
}

header("content-type: text/xml"); 
?>

<Response><?php echo $TwiMLResponse; ?></Response>
