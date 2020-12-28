
<?php

include 'assets.php';


if(isset($_SESSION['fname'], $_SESSION['lname'], $_SESSION['email'], $_SESSION['gender'], $_SESSION['marital'], $_SESSION['terms'])){

  $fname =$_SESSION['fname'];
  $lname =$_SESSION['lname'];
  $email = $_SESSION['email'];
  $gender = $_SESSION['gender'];
  $marital = $_SESSION['marital'];
  $terms = $_SESSION['terms'];

}

$sendEmails="";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST["done"])){

  // if(isset($_SESSION) && is_array($_SESSION)) {
  //      foreach($_SESSION as $sessionKey => $sessionValue)
  //        session_unset($_SESSION[$sessionKey]);
  //  }

  session_destroy();
}

  if (isset($_POST["send-mail"])){


    $message =  "Your details:

                 \n Name: ". $fname.
                "\n Last Name: ". $lname.
                "\n Gender: ".$gender. 
                "\n Marital Status: ".$marital;

if (!empty($_POST["email-list"])) {

    $sendEmails= test_input($_POST["email-list"].", ".$email);

}

    mail($sendEmails, "form input, stat:recognition", $message,  "From: jerohlsen@gmail.com");

    print_r("message has been sent to ".$sendEmails);
  }



$result=0;

if (isset($_POST["upload"]) == "Upload") { 


  $resultrray = array();

  foreach($_FILES as $file){ 

    $cun = count($file['name']); 

    for($x=0; $x < $cun; $x++){

      if ($file["size"][$x] > 50000) {
          echo "Sorry, your file is too large.";
         
      }else{

  ?>      <h1><?php  $imagename = basename($file['name'][$x]); ?> </h1>
  <?php 

        $result = @move_uploaded_file($_FILES['image_file']['tmp_name'][$x], $imagename); // upload it 

        array_push($resultrray, $imagename);
      }
    }
  }

  $message = "<html><head></head><body>";


  for($x=0; $x < count($resultrray); $x++){   

    if ($result>=1) echo("<p class='uploaded-txt'>Successfully uploaded: <b>".$resultrray[$x]."</b></p>"); // did it work?

    if ($result==1) echo("<img class='uploaded-img' src='".$resultrray[$x]."'>"); // display the uploaded file

    $message .= "<img src='http://localhost/vamos/".$resultrray[$x]."'";

  }

  $message .= "</body></html>";

} // end if

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>


<div class="confirm-div">

  <br>
  <br>
  <h1> CONGRATULATIONS </h1>

  <br>
 
<form class="send-mail" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

 
  <p> Choose from the list below the e-mails you want to send this information to </p>

  <label>E-mails:</label>
  <select name="email-list">
    <option value="jerohlsen@gmail.com">jerohlsen@gmail.com</option>
    <option value="admin@linkingpeople.co.nz">admin@linkingpeople.co.nz</option>
    <option value="nowhere@never.com">nowhere</option>
  </select>


<h3>Your details: </h3>

<?php 

  echo "<br>";
  echo "<p>name: &nbsp;&nbsp;".$fname."</p>";
  echo "<p>last name: &nbsp;&nbsp; ".$lname;
  echo "<br>";
  echo "<p>e-mail: &nbsp;&nbsp; ".$email;
  echo "<br>";
  echo "<p>gender: &nbsp;&nbsp; ".$gender;
  echo "<br>";
  echo "<p>marital status: &nbsp;&nbsp; ".$marital;
?>



  <input type="submit" name="send-mail" value="Send Email"/>

</form>


<p> Do you want to add an image to your profile?</p>

<form class="img-browse"  enctype='multipart/form-data'  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

  <input type="file" name="image_file[]" multiple>
  <input type="submit" name="upload" value="Upload"  />

</form>

<form class="done" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

  <input type="submit" name="done" value="Done" onclick="close();" />

</form> 

</div>


<?php 

include 'footer.php';
?>