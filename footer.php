

</body>


<script>



if(window.location == "http://localhost/session/sessionform2.php" &&"<?php echo $page1;?>"!="done" || window.location == "http://localhost/session/sessionform3.php"&&"<?php echo $page1;?>"!="done" || window.location == "http://localhost/session/sessionform4.php"&&"<?php echo $page1;?>"!="done"){
	
	window.location = "sessionform.php";
}else 
if(window.location == "http://localhost/session/sessionform3.php"&&"<?php echo $page2;?>"!="done" || window.location == "http://localhost/session/sessionform4.php" &&"<?php echo $page2;?>"!="done"){
	window.location = "sessionform2.php";
}else 
if(window.location == "http://localhost/session/sessionform4.php" &&"<?php echo $page3;?>"!="done"){
	window.location = "sessionform3.php";
}



$(document).ready(function(){


		
	if(typeof "<?php echo $page1;?>" != "undefined"){


		if("<?php echo $page1;?>"=="done"){

		
			$('.page2').css({'background-color': '#ffcb30', 'cursor': 'pointer'});

			$('.page1').click(function(){

				window.location = "sessionform.php";

			});

			$('.page2').click(function(){

				window.location = "sessionform2.php";

			});
		}
	}


	if(typeof "<?php echo $page2;?>" != "undefined"){


		if("<?php echo $page2;?>"=="done"){


			$('.page3').css({'background-color': '#ffcb30', 'cursor': 'pointer'});

			$('.page3').click(function(){

				window.location = "sessionform3.php";

			});

		}

	}



	if(typeof "<?php echo $page3;?>" != "undefined"){


		if("<?php echo $page3;?>"=="done"){


			$('.page4').css({'background-color': '#ffcb30', 'cursor': 'pointer'});

			$('.page4').click(function(){

				window.location = "sessionform4.php";

			});

		}

	}


});
	


</script>


</html>