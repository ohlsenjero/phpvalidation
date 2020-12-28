<?php 

session_start();

if(isset( $_SESSION['page1'])){
	$page1 =  $_SESSION['page1'];

}else{
	$page1 ="";
}
if(isset( $_SESSION['page2'])){
	$page2 =  $_SESSION['page2'];

}else{
	$page2 ="";
}
if(isset( $_SESSION['page3'])){
	$page3 =  $_SESSION['page3'];

}else{
	$page3 ="";
}

$termsErr =$fnameErr = $lnameErr =$emailErr = $genderErr = $websiteErr = $maritalErr = $confirmed= "";

?>


<html>
<head>


<link rel="stylesheet" href="styles.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</head>
<body>  

	<div class="apply-header">
		<h1>Apply Online</h1>
	</div>


<div class="page-buttons-holder">

	<div class="page-buttons page1">
		<p>1</p>
	</div>

	<div class="page-buttons page2">
		<p>2</p>
	</div>

	<div class="page-buttons page3">
		<p>3</p>
	</div>

	<div class="page-buttons page4">
		<p>4</p>
	</div>

</div>