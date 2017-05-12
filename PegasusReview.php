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
<label id="rEmailAddress"></label><label id="rLastName"></label><label id="rFirstName"></label>

<br>

<label>Completed reviews:</label>
<br>

<div id="reviewedProposals" style="margin-left: 15px">
    <p id ="aReviewedProposal"></p>
</div>

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
                  echo '<option id ="'. $email. '" value="'. $email. '">' . $lastname . ', ' . $firstname . ': ' . $proposaltitle .  '</option>';
              }
          ?>
   </select>

<br>
<div style="border: 2px solid red; border-radius: 5px; padding: 10px">
	<div id="txtHint"><center><p>Proposal information and review form will be listed here...</p></center></div>
</div>
</div>



<script type="text/javascript">

function showProposal(thisProposal) {

	//$('#txtHint').text(str)
	$lastName = document.getElementById('rLastName').textContent;
	$firstName = document.getElementById('rFirstName').textContent;
	$rEmail = document.getElementById('rEmailAddress').textContent;
	$thisProposal = $("#proposals option:selected").html();

/*Proposal information and review form will be listed here...*/
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "tacos";
        return;
    } else {document.getElementById("txtHint").innerHTML = "carbs";}    


/*{ 
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
        xmlhttp.open("GET","getThisProposal.php?pemail="+str + "&proposal=" + $thisProposal +"&lname=" + $lastName + "&fname=" + $firstName   + "&remail=" + $rEmail,true);
        //+"&lname=" + $lastName + "&fname=" + $firstName   + "&remail=" + $rEmail
        xmlhttp.send();
    }*/

}

function showReviewedProposals(email) {

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("aReviewedProposal").innerHTML = this.responseText;
            }
        };

        xmlhttp.open("GET","getMyReviews.php?remail="+email,true);
        //+"&lname=" + $lastName + "&fname=" + $firstName   + "&remail=" + $rEmail
        xmlhttp.send();
    }


function submitReview(){
	// $user = document.getElementById("proposals").value
	// $proposal = document.getElementById($user).innerHTML;
	// document.getElementById("txtHint").innerHTML = "Thank you for submitting your review of &quot;"  + $proposal + "&quot;, please select another proposal to review.";

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
        xmlhttp.open("POST","submitReview.php",true);
        xmlhttp.send();

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
            
            $("#rEmailAddress").text(result.EmailAddress)
            $("#rLastName").text(result.LastName)
            $("#rFirstName").text(result.FirstName)


            $email =  document.getElementById('rEmailAddress').innerHTML;
            //document.getElementById("aReviewedProposal").innerHTML = $email;

            showReviewedProposals($email);

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