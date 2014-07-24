<?php 

// Find out what kind of whisper we are going to do is this a sales or support call?

$callType = $_GET["type"];

// If the Type is a sales call say to the agent that this is a sales call and give them an option to divert to voicemail or accept the call. 
if ($callType == "sales") {
$TwiMLResponse = "<Gather action=\"./agentResponse.php\" numDigits=\"1\"><Say>You have an incoming sales call.</Say><Say>To accept the call, press 1.</Say><Say>To reject the call, press 2.</Say></Gather><Say>Sorry, I didn't get your response.</Say><Redirect>screen-caller.xml</Redirect>";
}

// If this is a support call say to the agent that this is a support call and give them an option to divert to VM or accept the call

if ($callType == "support") {
$TwiMLResponse = "<Gather action=\"./agentResponse.php\" numDigits=\"1\"><Say>You have an incoming support call.</Say><Say>To accept the call, press 1.</Say><Say>To reject the call, press 2.</Say></Gather><Say>Sorry, I didn't get your response.</Say><Redirect>screen-caller.xml</Redirect>";
}
header("content-type: text/xml"); 
?>

<Response><?php echo $TwiMLResponse; ?></Response>