<form name ="submitReview" id="submitReview" action="submitReviewPegasus.php" method="post">
  <div class="form-group">
    <label for="fullname">Reviewer Name</label>
    <input class="form-control" id="fullname" disabled>
  </div>

  <div class="form-group">
    <label for="email">Reviewer Email</label>
    <input type="email" class="form-control" id="EmailAddress" disabled>
  </div>


    <div class="form-group">
    <label for="gender">Gender</label>
		   <select class="form-control">
		   	 <option disabled selected value> -- select an option -- </option> 
		    <option value="Male">Male</option>
		    <option value="Female">Female</option>
		    <option value="Unknown">Prefer not to disclose</option>
		  </select>
  </div>

    <div class="form-group">
    <label for="hostinstitution">Host Institution</label>
    <input type="text" class="form-control" id="hostinstitution	" >
  </div>

    <div class="form-group">
    <label for="hostinstitutioncountry">Host Institution Country</label>
    <input type="text" class="form-control" id="proposaltitle" >
  </div>

  <div class="form-group">
    <label for="proposaltitle">Title of your proposal</label>
    <input class="form-control">
  </div>

  <div class="form-group">
    <label for="gender">Please upload your proposal</label>
    <input type="file" id="proposalfile">
    <p class="help-block">.pdf or .docx format</p>
  </div>

  <div class="checkbox">
    <label>
      <input type="checkbox"> Check me out
    </label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>

<label for="FirstName">First Name</label>
      <input id="fullname"></input>
      <label for="LastName">Last Name</label>
      <input id="LastName"></input>
      <label for="ProfileLink">Profile Link</label>
      <input id="ProfileLink"></input>
      <button id="populate">Populate Fields</button>  