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

<p id="EmailAddress"></p>

<label>Completed reviews:</label>
<br>
<br>
<br>
<br>

<label>Please choose a proposal to review</label>
<br>

 <select name="ratingpk" id="rating">
      <option value=""></option>
          <?php
          	require_once ("db.php");
	        $proposals = getProposals();
              foreach ($proposals as $aProposal)
              {
                  extract($aProposal); //extract the array elements
                  echo '<option value="'. $email. '">' . $lastname . ', ' . $firstname . ': ' . $proposaltitle .  '</option>';
              }
          ?>
   </select>

</div>

<script type="text/javascript">
					$(document).ready(function(){
				    	$.ajax({
			                type: 'GET',
			                url: 'https://api.connectedcommunity.org/api/v2.0/Contacts/GetWhoAmI',
			                datatype: "application/json",
			                headers: {
			                    "HLIAMKey": "cca336b4-3916-4045-a731-430b6ff36a61"
			                },
			                xhrFields: {
			                    withCredentials: true
			                },
			                success: function (result) {
			                    $("#fullname").val(result.FirstName + ' ' + result.LastName	)
			                    $("#EmailAddress").val(result.EmailAddress)
			                    $("#EmailAddress").text(result.EmailAddress)
			                    $("#ProfileLink").val("http://network.futureearth.org/network/members/profile?UserKey=" + result.ContactKey)
			                },
			                error: function (error) {
			                    alert('Call failed.');
			                }
				       });
					});
			</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>	
</body>
</html>