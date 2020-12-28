
<?php

include 'assets.php';


// if(isset($_SESSION['page1'])){
// 	if($_SESSION['page1']!="done"){

// 		if(!empty($_SESSION) && is_array($_SESSION)) {
// 		    foreach($_SESSION as $sessionKey => $sessionValue)
// 		    	session_unset($_SESSION[$sessionKey]);
// 		}
// 	}
// }

// session_destroy();



if(!isset($_SESSION['page1'])){
	$_SESSION['page1'] = "not-done";
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {


  if (empty($_POST["fname"])) {


    $fnameErr = "Name is required";

  } else {
    $fname = test_input($_POST["fname"]);
    // check if name only contains letters and whitespace
    // if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
    //   $fnameErr = "Only letters and white space allowed"; 

    //   $fname = "";
    // }

    $_SESSION['fname'] = $fname;
  }
  

  if (empty($_POST["lname"])) {
    $lnameErr = "Last Name is required";
  } else {
    $lname = test_input($_POST["lname"]);
    // check if name only contains letters and whitespace
    // if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
    //   $lnameErr = "Only letters and white space allowed"; 

    //   $lname = "";
    // }

    $_SESSION['lname'] = $lname;
  }



  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 

      $email ="";
    }

    $_SESSION['email'] = $email;

  }


  if (!empty($_POST["gender"])) {
	$gender = test_input($_POST["gender"]);

   	$_SESSION['gender'] = $gender;
  }else{
  	$gender = "none";

   	$_SESSION['gender'] = $gender;
  }



  if (empty($_POST["maritalstatus"])) {
    $maritalErr = "Marital Status is required";
  } else {
    $marital = test_input($_POST["maritalstatus"]);

    $_SESSION['marital'] = $marital;
  }

	if ($fname != "" && $lname != "" && $email != "" && $gender != "" && $marital != ""){

	
		$_SESSION['page1'] = "done";


		header('Location: sessionform2.php');

	}else{
		include 'errors.php';
	}



}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<!-- <p><span class="error">* required field</span></p> -->

<form class="clearfix" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >  

	<div class="column">
		<fieldset>
		<legend>Personal Details</legend>
		  <label>First name: </label><input type="text" name="fname" value="<?php if(isset( $_SESSION['fname']))echo $_SESSION['fname'];?>"/>
		  
		  <br><br>

		  <label>Last name: </label><input type="text" name="lname" value="<?php if(isset( $_SESSION['lname']))echo $_SESSION['lname'];?>"/>
		  
		  <br><br>

		  <label>E-mail: </label><input type="text" name="email" value="<?php if(isset( $_SESSION['email']))echo $_SESSION['email'];?>"/>

		   <br><br>

		  	<label>Gender:</label>
		    <br>
		    <br>
		  	<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female"/>Female
		  	<br>
		  	<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male"/>Male
		    <br>
		 	<input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other"/>Other  
		    <br>
		    <br>


		   <label>Marital Status:</label>
		    <select name="maritalstatus">
		    	<option value="none">---</option>
				<option value="married">married</option>
			    <option value="single">single</option>
			    <option value="divorced many times">what?</option>
			</select>

		  </fieldset>
	</div>
	
	<div class="column">

		<fieldset>
			<label>City</label>
		    <select name="city">
		    	<option value="none">---</option>
				<option value="auckland">Auckland</option>
			    <option value="wellington">Wellington</option>
			    <option value="christchurch">Christchurch</option>
			</select>
			<br><br>
			<legend>Location</legend>

			<label>Suburb </label><input type="text" name="suburb" value="<?php if(isset( $_SESSION['suburb']))echo $_SESSION['suburb'];?>"/>
			<br><br>		  
			<label>Street </label><input type="text" name="street" value="<?php if(isset( $_SESSION['street']))echo $_SESSION['street'];?>"/>
			<br><br>
			<label>Phone number </label><input type="text" name="pnumber" value="<?php if(isset( $_SESSION['pnumber']))echo $_SESSION['pnumber'];?>"/>


		</fieldset>
	</div>

  <input type="submit" name="submit1" value="Continue to step 2"/>  

</form>


<?php

include 'footer.php';
?>

