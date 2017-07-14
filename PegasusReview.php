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

<label id="reviewer">Reviewer: </label>
<br>
<label style="display:none" id="rEmailAddress"></label><label style="display:none"id="rLastName"></label><label style="display:none" id="rFirstName"></label>
<br>

    <?php
    
    if(isset($_GET['reviewedProposal'])){
        $type = $_GET['type'];
        $proposal = $_GET['reviewedProposal'];
        echo '<p style="color: red; text-align:center">Thank you for ' .$type. ' your review of "' .$proposal .'".  Please select another proposal to review.</p>'  ;  
        
        }
        

    ?>



<label id="pleaseChoose">Please choose a proposal to review</label>
<br>

 <select  style="max-width: 500px" onchange="showProposal()" class="form-control selectDropdown" name="proposals" id="proposals">
      <option  value=""></option>
          <?php
            require_once ("db.php");
            $proposals = getProposals();
              foreach ($proposals as $aProposal)
              {
                  extract($aProposal); //extract the array elements
                  echo '<option value="'. $proposalid. '">' . $proposalid. '. ' . $lastname . ', ' . $firstname . '</option>';
              }
          ?>
   </select>

<br>
<div style="border: 2px solid red; border-radius: 5px; padding: 10px">
    <div id="txtHint"><center><p>Proposal information and review form will be listed here...</p></center></div>
</div>

<br>
<br>
<label id="reviewText">My completed reviews (click to edit):</label>
<br>
<div id="reviewedProposals" style="margin-left: 30px">
    <p id ="aReviewedProposal"></p>
</div>

<br>
<br>
<label>All proposals:</label>
<br>
<div style="margin-left: 30px">
          <?php
            require_once ("db.php");
            $proposals = getProposals();
              foreach ($proposals as $aProposal)
              {
                  extract($aProposal); //extract the array elements
                  echo $proposalid . '. ';
                  echo '<strong><a target="_blank" href="'.$profilelink.'">' . $lastname . ', ' . $firstname . '</a></strong>'. ' (<a target="_blank" href="'.$proposallink.'">proposal</a>) ';
                  echo '<br>';
              }
          ?>
</div>

<br>
<br>
</div>



<script type="text/javascript">

function showProposal(str) {

    //$('#txtHint').text(str)
    $lastName = document.getElementById('rLastName').textContent;
    $firstName = document.getElementById('rFirstName').textContent;
    $rEmail = document.getElementById('rEmailAddress').textContent;

    var dropdown = document.getElementById('proposals');

    var proposalid =  dropdown.options[dropdown.selectedIndex].value;

    if (proposalid == "") {
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
        xmlhttp.open("GET","getThisProposal.php?proposalid="+proposalid + "&lname=" + $lastName + "&fname=" + $firstName   + "&remail=" + $rEmail,true);
        //+"&lname=" + $lastName + "&fname=" + $firstName   + "&remail=" + $rEmail
        xmlhttp.send();
    }
}


function submitReview(){
    // $user = document.getElementById("proposals").value
    // $proposal = document.getElementById($user).innerHTML;
    // document.getElementById("txtHint").innerHTML = "Thank you for submitting your review of &quot;"  + $proposal + "&quot;, please select another proposal to review.";

/*  if (window.XMLHttpRequest) {
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
        xmlhttp.send();*/

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
            $("#fullname").val(result.FirstName + ' ' + result.LastName )
            $("#EmailAddress").val(result.EmailAddress)
            
            $("#ProfileLink").val("http://network.futureearth.org/network/members/profile?UserKey=" + result.ContactKey)
            $("#reviewer").append(result.LastName + ', ' + result.FirstName)
            
            $("#rEmailAddress").text(result.EmailAddress)
            $("#rLastName").text(result.LastName)
            $("#rFirstName").text(result.FirstName)

            $email =  document.getElementById('rEmailAddress').innerHTML;
            //document.getElementById("aReviewedProposal").innerHTML = $email;
            //showReviewedProposals($email);
            checkNull();
        },
        error: function (error) {
            alert('Call failed.');
        }
   });
});


function checkNull() {
    var test = document.getElementById('rEmailAddress').textContent;
    if(test==""){
        $("#txtHint").empty().append("<center>Oops!  Something went wrong.  Please try logging in again or using another browswer (NOT Safari).  <br>If you continue to see this error, please use the <a href='https://drive.google.com/file/d/0B6SsZEv5HafhSlZ6ZEZTeXB2cXh0RUhMM1prNzFpbjBBdUQ0/view?usp=sharing' target='_blank'>review template</a> and email them to Craig Starger (craig.starger@futureearth.org).</center>");
        $("#pleaseChoose").remove();
        $(".selectDropdown").hide();
        $("#reviewer").hide();
        $("#myCompletedReviews").remove();
        $("#reviewText").remove();
        }//if

        else{
        showReviewedProposals($email);
        };//else
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

</script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 --><script src="js/bootstrap.min.js"></script> 
</body>
</html>