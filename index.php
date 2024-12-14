<?php
ob_start(); 
session_start();
require_once("controleur/controleur.class.php");
$unControleur = new Controleur();

?>

<!DOCTYPE html>
<html>
<head>
	<title>SITE Orange</title>
	<meta charset="utf-8">
</head>
<body>
<center>
	<h1> Site Orange </h1>
	<?php
		if ( ! isset($_SESSION['email'])){
			require_once("vue/vue_connexion.php");
		}
		if(isset($_POST['Connexion']))
		{
			$email = $_POST['email']; 
			$mdp   = $_POST['mdp'] ;
			$unUser = $unControleur->verifConnexion($email, $mdp);
			//var_dump($unUser);
			if($unUser){
				$_SESSION['email'] = $unUser['email']; 
				$_SESSION['nom'] = $unUser['nom']; 
				$_SESSION['prenom'] = $unUser['prenom'];
				$_SESSION['role'] = $unUser['role'];
				header("Location: index.php?page=1");  
			}else{
				echo "<br> Veuillez vérifier vos identifiants.";
			}
		}
	if(isset($_SESSION['email'])){
	echo '
	<div class="link-container">
	<a href="index.php?page=1">
	<img src="images/" height="60" width="60">
	<span></span>
	</a>
	</div>
	<div class="link-container">
	<a href="index.php?page=2">
	<img src="images/" height="60" width="60">
	<span></span>
	</a>
	</div>
	<div class="link-container">
	<a href="index.php?page=3">
	<img src="images/" height="60" width="60">
	<span></span>
	</a>
	</div>
	<div class="link-container">
	<a href="index.php?page=4">
	<img src="images/" height="60" width="60">
	<span></span>
	</a>
	</div>
	<div class="link-container">
	<a href="index.php?page=5">
	<img src="images/" height="60" width="60">
	<span></span>
	</a>
	</div>
	<div class="link-container">
	<a href="index.php?page=6">
	<img src="images/" height="60" width="60">
	<span></span>
	</a>
	</div>';
	if (isset($_GET['page'])){
		$page = $_GET['page'];
	}else {
		$page = 1; 
	}
	switch ($page) {
		case 1 : require_once ("controleur/"); break; 
		case 2 : require_once ("controleur/"); break; 
		case 3 : require_once ("controleur/"); break; 
		case 4 : require_once ("controleur/"); break; 
		case 5 : require_once ("controleur/"); break; 
		case 6 : 	session_destroy(); 
					unset($_SESSION['email']); 
					header("Location: index.php"); break;
	}
	}
	?>
</center>
</body>
<?php
ob_end_flush(); 
?>
</html>
