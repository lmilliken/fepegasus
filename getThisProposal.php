<?php
/*
    Purpose: Methods to connect to and execute queries
    Author: Laurel Milliken
    Date: April 2017
*/

require_once ("db.php");

$email = ($_GET['email']);

$query = "SELECT * FROM pegasusapplications WHERE email = '".$email."'";

$result = executeQuery($query);


echo '<p>';

foreach ($result as $proposal)
              {
                  extract($proposal); //extract the array elements
                  echo  '<label>Proposal</label><br><strong><a target="_blank" href="' .$profilelink . '">' . $lastname . ', ' . $firstname . '</a></strong>'. ': ';
                  echo  '<a target="_blank" href="' .$proposal . '">' . $proposaltitle . '</a> ';
                  echo '<br>';
                  echo $hostinstitution . ', ' . $hostcountry ;
              };

echo "</p>";

echo <<<FORM
<form action="/submitreview.php">
<label>Ratings</label>
<table class="table table-striped">
  <thead>
    <tr>
      <th class=""></th>
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
    <input type="radio" id="technical-execellence-feasbility" name="technical-execellence-feasbility" value="10" class="form-radio"></td>
    
    <td class="">
    <input type="radio" id="technical-execellence-feasbility" name="technical-execellence-feasbility" value="8" class="form-radio"></td>
    
    <td class="">
    <input type="radio" id="technical-execellence-feasbility" name="technical-execellence-feasbility" value="6" class="form-radio"></td>

    <td class="">
    <input type="radio" id="technical-execellence-feasbility" name="technical-execellence-feasbility" value="4" class="form-radio"></td>

    <td class="">
    <input type="radio" id="technical-execellence-feasbility" name="technical-execellence-feasbility" value="2" class="form-radio"></td> 
  </tr>


 <tr class="even">
 <td class="">The interdisciplinary design and strength of the team, depth and breadth of collaboration across disciplines, countries, and sectors of society (25%)</td>
    <td class="">
    <input type="radio" id="interdisciplinary" name="interdisciplinary"" value="5" class="form-radio"></td>
    
    <td class="">
    <input type="radio" id="interdisciplinary" name="interdisciplinary" value="4" class="form-radio"></td>
    
    <td class="">
    <input type="radio" id="interdisciplinary" name="interdisciplinary" value="3" class="form-radio"></td>

    <td class="">
    <input type="radio" id="interdisciplinary" name="interdisciplinary" value="2" class="form-radio"></td>

    <td class="">
    <input type="radio" id="interdisciplinary" name="interdisciplinary" value="1" class="form-radio"></td> 
 </tr>

 <tr class="even">
 <td class="">The potential for the research to lead to significant advances within the thematic areas outlined above and relevance to the Future Earth Vison and Key Challenge on Natural
Assets (25%)</td>
    <td class="">
    <input type="radio" id="potential" name="potential" value="5" class="form-radio"></td>
    
    <td class="">
    <input type="radio" id="potential" name="potential" value="4" class="form-radio"></td>
    
    <td class="">
    <input type="radio" id="potential" name="potential" value="3" class="form-radio"></td>

    <td class="">
    <input type="radio" id="potential" name="potential" value="2" class="form-radio"></td>

    <td class="">
    <input type="radio" id="potential" name="potential" value="1" class="form-radio"></td> 
 </tr>
</tbody>
</table>


<br>

<label>Recommendation</label>
<table class="table table-striped">
  <thead>
    <tr>
      <th class=""></th>
      <th class="">Highly recommend</th>
      <th class="">Recommend</th>
      <th class="">Do not recommend</th>
    </tr>
  </thead>

<tbody>
 <tr class="odd">
  <td class="">Would you recommend this proposal for funding?</td>
    <td class="">
    <input type="radio" id="recommendation" name="recommendation" value="3" class="form-radio"></td>
    
    <td class="">
    <input type="radio" id="recommendation" name="recommendation" value="2" class="form-radio"></td>
    
    <td class="">
    <input type="radio" id="recommendation" name="recommendation" value="1" class="form-radio"></td>

  </tr>
</tbody>
</table>

<br>
<label>Additional comments:</label>
<br>
<textarea class="form-control" rows="3"></textarea>
<br>
<center><button type="submit" class="btn btn-primary">Submit</button></center>
</form>
FORM;

?>