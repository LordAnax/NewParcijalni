<?php
	require "classes/Page.php";
	
	class Index extends Page
	{
		protected function GetContent()
		{
			$output = '';
			
			if (isset($_SESSION["username"])) {
				$username = $_SESSION["username"];
				$output .= '<h1>Dobrodošli u AlgebraChat ,'. strtoupper($username) .'</h1>';
				$output .= '<p>---Besplatni grupni chat---</p>';
			}else{
				$output .= '<h1>Dobrodošli u AlgebraChat</h1>';
				$output .= '<p>---Besplatni grupni chat---</p>';
			}
			$output .= "</div>";
		$output .= "</div>";
		
		return $output;
	}


		protected function PageRequiresAuthenticUser()
		{
			return false;
		}
	}

	$site = new Index();
	$site->Display('AlgebraChat Index');







	//Zamijeniti Databazu sa novom databazom te je isprazniti od korisnika 
	// Napisati Readme file 
	// Uploadati na Github
	// pokupiti input sa i postati u chat
	