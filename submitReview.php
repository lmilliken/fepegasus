<?php
// define variables and set to empty values
require_once ("db.php");


$rLastName =  $_POST["rlname"];
$rFirstName = $_POST["rfname"];
$rEmail = $_POST["remail"];
$proposal =   $_POST["proposal"];
$technical = $_POST["technical-execellence-feasbility"]; 
$interdisciplinary = $_POST["interdisciplinary"]; 
$potential = $_POST["potential"];
$recommend = $_POST["recommendation"];
$comments =  $_POST["comments"];
$date = date('Y-m-d');

echo $rLastName;
echo '<br>';
echo $rFirstName;
echo '<br>';
echo $rEmail;
echo '<br>';
echo $proposal;
echo '<br>';


$query = <<< QUERY
	INSERT INTO pegasusreview (reviewerlname, reviewerfname, revieweremail, proposal, technical, interdisciplinary, potential, recommend, comments, submittime) 
	VALUES (
		"$rLastName", 
		"$rFirstName",
		"$rEmail",
		"$proposal",
		"$technical",
		"$interdisciplinary",
		"$potential",
		"$recommend",
		"$comments",
		"$date,'%Y%M%d'"
		)
QUERY;

echo $query;
submitReview($query);

// header('Location: PegasusReview.php?reviewedProposal=' .$proposal.'' );


?>