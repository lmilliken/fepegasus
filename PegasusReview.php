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

<label id="reviewer">Reviewer: </label>
<br>
<label id="EmailAddress"></label><label id=rLastName></label><label id=rFirstName></label>
<br>
<label>Completed reviews:</label>
<br>
<br>
<br>
<br>

<label>Please choose a proposal to review</label>
<br>

 <select style="max-width: 500px" onchange="showProposal(this.value)" class="form-control" name="proposals" id="proposals">
      <option  value=""></option>
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

<br>
<div style="border: 2px solid red; border-radius: 5px; padding: 10px">
	<div id="txtHint"><p>Proposal information and review form will be listed here...</p></div>
</div>
</div>



<script type="text/javascript">

function showProposal(str) {

	//$('#txtHint').text(str)
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "Proposal information and review form will be listed here...";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getThisProposal.php?email="+str,true);
        xmlhttp.send();
    }
}





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
			                    
			                    $("#ProfileLink").val("http://network.futureearth.org/network/members/profile?UserKey=" + result.ContactKey)
			                    $("#reviewer").append(result.LastName + ', ' + result.FirstName)
			                    
			                    $("#EmailAddress").text(result.EmailAddress)
			                    $("#rLastName").text(result.LastName)
			                    $("#rFirstName").text(result.FirstName)
			                },
			                error: function (error) {
			                    alert('Call failed.');
			                }
				       });
					});
</script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 --><script src="js/bootstrap.min.js"></script>	
</body>
</html>