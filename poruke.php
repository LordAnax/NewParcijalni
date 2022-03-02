<?php
	require "classes/Page.php";
	

	class MSG extends Page
	{
		protected function GetContent()
		{
		
			
			$output = '';
			
			$output .= $this->Poruke();
			$output .= '<br/><br/>';
			$output .= '<form method="post" enctype="multipart/form-data">'; 
      $output .= '<input type="text" id="message" name="message" placeholder="Napisite poruku">';
			$output .= '<input type="submit" value="Posalji poruku" name="btnSub"/>';
			$output .= '</form>';
			$output .= '';
			
			return $output;
		}
		
/* 

private function HandleFormData(){
		if(!isset($_POST["btnSub"])){
			return;
		}

		$id = $this->_authenticator->GetCurrentUserId();
		$conName = $_POST["conName"];
		$conNumber = $_POST["conNumber"];
		
		$this->_authenticator->CreateNewContact($id, $conName, $conNumber);
		
		echo "<div class='w3-display-topmiddle' style='white-space:nowrap; color:red; padding-top:15rem; z-index: 1;'>";
			echo "<strong>Kreiran novi kontakt!</strong>";
			echo "<meta http-equiv='refresh' content='0'>";
		echo "</div>";
	}



*/


		private function Poruke()
		{
			$output = '';
			$output .= '<table border="2">';
			
			$q = "SELECT * FROM msg";
			$output .= '<label>Chat</label>';
			$count = 0;
			
			foreach($this->_database->query($q) as $row)
			{
				$posiljatelj = $row["user"];
				$vrijeme = $row["dateTime2"];
				$poruka = $row["message"];
				
				$output .= "<tr><td>$vrijeme</td><td>$posiljatelj</td><td>$poruka</td></tr>";
				
				$count++;
			}
			
			if($count === 0)
			{
				$output .= '<tr><td colspan="3">Zapocnite chat</td></tr>';
			}
			
			$output .= '</table>';
			
			return $output;
		}
		
		protected function PageRequiresAuthenticUser()
		{
			return true;
		}
	}

	$site = new MSG();
	$site->Display('AlgebraChat Moje poruke');