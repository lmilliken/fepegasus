<?php
// define variables and set to empty values
require_once ("db.php");

$rEmail = ($_GET['remail']);


// echo $rEmail . 'this works!';

$query = <<< QUERY
	SELECT * FROM `pegasusreview` WHERE `revieweremail` = "$rEmail"
	order by proposalfk
QUERY;

// echo $rEmail;
// echo $query;

$proposals = executequery($query);
foreach ($proposals as $aProposal)
  {
      extract($aProposal); //extract the array elements
      echo $proposalfk .  '. ' .'<a href="ReviewedProposal.php?reviewid=' .$reviewid . '">' .  $proposal . '</a>, submitted ' . $submittime . ' UTC';
      echo '<br>';
  };


?>


