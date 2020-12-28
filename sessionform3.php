
<?php

include 'assets.php';



$fname =$_SESSION['fname'];

$lname =$_SESSION['lname'];


$email = $_SESSION['email'];

$gender = $_SESSION['gender'];

$marital = $_SESSION['marital'];

$terms = $_SESSION['terms'];


if(!isset($_SESSION['page3'])){
  $_SESSION['page3'] = "not-done";
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {



  if (isset($_POST["print"])) {
    print_r("Printed");
  } else if(isset($_POST["confirm"])) {

    print_r("CONFIRMADO");
    $confirmed = "confirmed";
    $_SESSION['page3'] = "done";
    header('Location: sessionform4.php');

  }

}



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>


<br><br>
<br><br>


<div class="confirm-div">


<h2>
  Please confirm your details to finish the application</h2>

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
</div>

<br>
<br>

<form class="print" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

<input type="submit" name="print" value="Print"/>

</form>


<form class="confirm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

<input  type="submit" name="confirm" value="Confirm"/>

</form>


<?php 
include 'footer.php';
?>