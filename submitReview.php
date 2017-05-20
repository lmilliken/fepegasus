<?php
// define variables and set to empty values
require_once ("db.php");

$proposal =   $_POST["proposal"];
$technical = $_POST["technical-execellence-feasbility"]; 
$interdisciplinary = $_POST["interdisciplinary"]; 
$potential = $_POST["potential"];
$recommend = $_POST["recommendation"];
$comments =  $_POST["comments"];
$date = date('Y-m-d H:i:s T');

$submittype;
// echo $rLastName;
// echo '<br>';
// echo $rFirstName;
// echo '<br>';
// echo $rEmail;
// echo '<br>';
// echo $proposal;
// echo '<br>';
// echo $proposalid;


if (isset($_POST["reviewid"]))
{
	$submittype = "updating";
	$reviewID = $_POST["reviewid"];

	$query = <<< QUERY
	UPDATE pegasusreview
	SET
		technical = "$technical",
		interdisciplinary = "$interdisciplinary",
		potential =	"$potential",
		recommend = "$recommend",
		comments = "$comments",
		submittime = "$date,'%Y%M%d%T:%f'"
	Where reviewid = "$reviewID"
QUERY;
}
else
{
	$submittype = "submitting";
	$rLastName =  $_POST["rlname"];
	$rFirstName = $_POST["rfname"];
	$rEmail = $_POST["remail"];
	$proposalid = $_POST["proposalid"];

	$query = <<< QUERY
	INSERT INTO pegasusreview (reviewerlname, reviewerfname, revieweremail, proposalfk, proposal, technical, interdisciplinary, potential, recommend, comments, submittime) 
	VALUES (
		"$rLastName", 
		"$rFirstName",
		"$rEmail",
		"$proposalid",
		"$proposal",
		"$technical",
		"$interdisciplinary",
		"$potential",
		"$recommend",
		"$comments",
		"$date,'%Y%M%d%T:%f'"
		)
QUERY;
};


echo $query;
submitReview($query);

echo '<script type="text/javascript">
            location.replace("PegasusReview.php?type='.$submittype . '&reviewedProposal=' .$proposal . '")</script>';
            
?>