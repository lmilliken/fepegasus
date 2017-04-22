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


echo '<p style="margin-left: 10px">';

foreach ($result as $proposal)
              {
                  extract($proposal); //extract the array elements
                  echo  '<strong><a target="_blank" href="' .$profilelink . '">' . $lastname . ', ' . $firstname . '</a></strong>'. ': ';
                  echo  '<a target="_blank" href="' .$proposal . '">' . $proposaltitle . '</a> ';
                  echo '<br>';
                  echo $hostinstitution . ', ' . $hostcountry ;
              };

echo "</p>";

?>