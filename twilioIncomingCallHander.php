<?php
// Set your Sales number here
$salesNumber = "+44123451234";
// Set your service number here
$supportNumber = "44123451234";
// Check if the HTTP request is loop by checking for any pressed digits
$menuInput = $_GET["Digits"];
// If the menu is 1 we know they want sales team so we are going to say 
// 'Transfering you to sales now, Please note call calls are recoreded for training purposes' 
// Then we are going to call the sales line and whisper the details of the call as well as giving the agent to divert to VM.
// If the menu is 2 the call is for support, so are going to transfer the call to out support line and whisper that the call is about customer support.
// If the menu is blank its a 1st time caller so we great the caller and then present the landing menu. 
if ($menuInput == "1") {
$TwiMLResponse = '<Dial timeout="10" action="./handleDialCallStatus.php"><Number url="./whisper.php?type=sales">."$salesNumber".</Number></Dial>';
}
elseif ($menuInput == "2") {
$TwiMLResponse = '<Dial timeout="10" action="./handleDialCallStatus.php"><Number url="./whisper.php?type=support">."$supportNumber".</Number></Dial>';
}
else {
$TwiMLResponse = '<Gather method="GET" timeout="25" numDigits="1"><Say voice="alice">Hello and welcome to Your Company Hotline. Our opening hours are 8 am to 6 PM London Time. For Sales please press 1. For support or other enquiries please press 2.</Say></Gather>';
}
header("content-type: text/xml"); 
?>

<Response><?php echo $TwiMLResponse; ?></Response>
