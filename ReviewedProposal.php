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



<div class="container">
<br>
<br>
<a href="PegasusReview.php">&lt;&lt;&nbspBack</a>
<br>
<br>
<div style="border: 2px solid red; border-radius: 5px; padding: 10px">
<?php
require_once ("db.php");

$reviewID = ($_GET['reviewid']);
//echo $reviewID;

$query = "SELECT * FROM pegasusreview 
left join pegasusapplications on pegasusapplications.proposalid = pegasusreview.proposalfk
where reviewid = " . $reviewID;

//echo $query;
$result = executeQuery($query);

if (count($result)<>1){
    echo "An error has occurred, please contact Laurel Milliken (laurel.milliken@futureearth.org).";
    die;
} else
        {foreach ($result as $proposal)
             {extract($proposal);
                echo '<form method="post" action="submitReview.php">';
                  echo '<label>Reviewer: '. $reviewerlname . ', ' . $reviewerfname. '</label>';
                  echo '<br><br>';
                  echo '<label>Proposal:</label><br>';
                  echo '<strong style="padding-left: 8px"><a target="_blank" href="' .$profilelink . '">' . $lastname . ', ' . $firstname . '</a></strong>'. ': ';
                  echo  '<a target="_blank" href="' .$proposallink . '">' . $proposaltitle . '</a> ';
                  echo '<br>';
                  echo '<p strong style="padding-left: 8px">';
                  echo $hostinstitution . ', ' . $hostcountry ;
                  echo '</p>';
                  

                  echo '<input type="hidden" name="reviewid" value=' . $reviewID . '>';
                  echo '<input type="hidden" name="proposal" value="' .  $lastname . ', ' . $firstname . ': ' . $proposaltitle . '">';
                  // echo '<input type="hidden" name="rlname" value=' . $rLastName . '>';
                  // echo '<input type="hidden" name="rfname" value=' . $rFirstName . '>';
                  // echo '<input type="hidden" name="remail" value=' . $rEmail . '>';

                echo <<<FORM
                <br>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th class="">Ratings</th>
                      <th class="">Excellent</th>
                      <th class="">Very Good</th>
                      <th class="">Good</th>
                      <th class="">Fair</th>
                      <th class="">Poor</th> 
                    </tr>
                  </thead>

                <tbody>
                 <tr class="odd">
                  <td class="">The technical excellence and feasibility of planning and executing the Research Plan within the proposed budget and time constraints (50%)</td>
                    <td class="">
                    <input type="radio" id="technical-execellence-feasbility" name="technical-execellence-feasbility" value="10" class="form-radio" 
FORM;
                    if ($technical==10){echo "checked";}

        echo '
        ></td>
            
            <td class="">
            <input type="radio" id="technical-execellence-feasbility" name="technical-execellence-feasbility" value="8" class="form-radio" 
        ';
                    if ($technical==8){echo "checked";}

        echo '
        ></td>
            
            <td class="">
            <input type="radio" id="technical-execellence-feasbility" name="technical-execellence-feasbility" value="6" class="form-radio"';
                    if ($technical==6){echo "checked";}

        echo '></td>

            <td class="">
            <input type="radio" id="technical-execellence-feasbility" name="technical-execellence-feasbility" value="4" class="form-radio"';
                    if ($technical==4){echo "checked";}

        echo '></td>

            <td class="">
            <input type="radio" id="technical-execellence-feasbility" name="technical-execellence-feasbility" value="2" class="form-radio"';
                    if ($technical==2){echo "checked";}
        echo '></td> 
        </tr>


        <tr class="even">
        <td class="">The interdisciplinary design and strength of the team, depth and breadth of collaboration across disciplines, countries, and sectors of society (25%)</td>
            <td class="">
            <input type="radio" id="interdisciplinary" name="interdisciplinary"" value="5" class="form-radio"';
                    if ($interdisciplinary==5){echo "checked";}

        echo '></td>
            
            <td class="">
            <input type="radio" id="interdisciplinary" name="interdisciplinary" value="4" class="form-radio"';
                    if ($interdisciplinary==4){echo "checked";}

        echo '></td>
            
            <td class="">
            <input type="radio" id="interdisciplinary" name="interdisciplinary" value="3" class="form-radio"';
                    if ($interdisciplinary==3){echo "checked";}

        echo '></td>

            <td class="">
            <input type="radio" id="interdisciplinary" name="interdisciplinary" value="2" class="form-radio"';
                    if ($interdisciplinary==2){echo "checked";}

        echo '></td>

            <td class="">
            <input type="radio" id="interdisciplinary" name="interdisciplinary" value="1" class="form-radio"';
                    if ($interdisciplinary==1){echo "checked";}

        echo '></td> 
         </tr>

         <tr class="even">
         <td class="">The potential for the research to lead to significant advances within the thematic areas outlined above and relevance to the Future Earth Vison and Key Challenge on Natural
        Assets (25%)</td>
            <td class="">
            <input type="radio" id="potential" name="potential" value="5" class="form-radio"';
                    if ($potential==5){echo "checked";}

        echo '></td>
            
            <td class="">
            <input type="radio" id="potential" name="potential" value="4" class="form-radio"';
                    if ($potential==4){echo "checked";}

        echo '></td>
            
            <td class="">
            <input type="radio" id="potential" name="potential" value="3" class="form-radio"';
                    if ($potential==3){echo "checked";}

        echo '></td>

            <td class="">
            <input type="radio" id="potential" name="potential" value="2" class="form-radio"';
                    if ($potential==2){echo "checked";}

        echo '></td>

            <td class="">
            <input type="radio" id="potential" name="potential" value="1" class="form-radio"';
                    if ($potential==1){echo "checked";}

        echo '></td> 
         </tr>
        </tbody>
        </table>


        <br>


        <table class="table table-striped">
          <thead>
            <tr>
              <th class="">Recommendation</th>
              <th class="">Highly recommend</th>
              <th class="">Recommend</th>
              <th class="">Do not recommend</th>
            </tr>
          </thead>

        <tbody>
         <tr class="odd">
          <td class="">Would you recommend this proposal for funding?</td>
            <td class="">
            <input type="radio" id="recommendation" name="recommendation" value="3" class="form-radio"';

                    if ($recommend==3){echo "checked";}

        echo '></td>
            
            <td class="">
            <input type="radio" id="recommendation" name="recommendation" value="2" class="form-radio"';
                    if ($recommend==2){echo "checked";}

        echo '></td>
            
            <td class="">
            <input type="radio" id="recommendation" name="recommendation" value="1" class="form-radio"';
                   if ($recommend==1){echo "checked";}

        echo '></td>

          </tr>
        </tbody>
        </table>

        <br>
        <label>Additional comments:</label>
        <br>
        <textarea name="comments" class="form-control" rows="3">';
                echo $comments;
        echo '</textarea>
        <br>
        <center>
            <button type="submit" class="btn btn-primary">Update</button>
            <button class="btn btn-default" onclick="PegasusReview.php">Cancel</button>
        </center>
        </form>';
        };//foreach
    };//else

?>
</div>
</div>
</body>
</html>