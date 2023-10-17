<?php


$msg ="";
$css_class="";

if (isset($_POST['submit'])) {
	echo "<pre>", print_r($_FILES['pp']['name']), "</pre>";


	$profileImageName = time() .'_'. $_FILES['pp']['name'];
	
	$target = '../images/' . $profileImageName;
	
	
    

	if (move_uploaded_file($_FILES['pp']['tmp_name'], $target)) {
		
			$msg = "Image uploaded! and save to database";	
		$css_class = "alert-success";

		}else {
			$msg = "Database Error: Failed to save user!";	
		$css_class = "alert-danger";
		}


	}