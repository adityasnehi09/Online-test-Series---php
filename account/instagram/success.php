




<!DOCTYPE html>
<html lang="en">

  <body>
	<div style='text-align:center'>
	
    <?php

if (!empty($_SESSION['userdetails'])) 
{
	header('Location: home.php');
}
      require 'instagram.class.php';
      require 'instagram.config.php';
      
      // Display the login button
      $loginUrl = $instagram->getLoginUrl();
      echo "<a class=\"button\" href=\"$loginUrl\">Sign in with Instagram</a>";
    ?>
hjbjhbjh

  </body>


</html>