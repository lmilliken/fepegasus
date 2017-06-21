<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/custom.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
</head>


<body>

<div>

<table class="table table-striped">
    <tr>
    <th>Proposal</th>
    <th>Technical</th> 
    <th>Interdisciplinary</th>
    <th>Potential</th>
    <th>Recommendation</th>
    <th>Comments</th>
    <th>Reviewer</th>
    <th>TimeStamp</th>
   </tr>

   <?php
   require_once ("db.php");

    $query = "SELECT * FROM pegasusreview 
    left join pegasusapplications on pegasusapplications.proposalid = pegasusreview.proposalfk
    order by proposalid, submittime";

    //echo $query;
    $result = executeQuery($query);

     {foreach ($result as $review)
             {extract($review);

              echo '<tr>';
              echo '<td>' . $proposalid . '. ' . $lastname . ', ' . $firstname . ': ' . $proposaltitle . '</td>';
              echo '<td>' . $technical . '</td>';
              echo '<td>' . $interdisciplinary . '</td>';
              echo '<td>' . $potential . '</td>';
              echo '<td>' . $recommend . '</td>';
              echo '<td>' . $comments . '</td>';
              echo '<td>' . $reviewerlname . '</td>';
              echo '<td>' . $submittime . ' UTC </td>';
              echo '</tr>';

             };
           };
   ?>
</table>
</div>

</body>
</html>
