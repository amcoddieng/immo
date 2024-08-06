<!DOCTYPE html>
<?php
	require'user.class.php';
	function bd_connect(){
	return new PDO('mysql:host=localhost;dbname=agence_immobiliere;charset=utf8','root','');
}  ?>
<html>
<head>
	<script src="https://kit.fontawesome.com/a60502bf60.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>connexion</title>
<style type="text/css">
	.titre{
			color: black;
			font-weight: bold;
			font-family: sans-serif;
/*			background-color: steelblue;*/

			
		}
	#biens{

			border:1vh steelblue solid;
			width: 74%;
/*			border: solid;*/
			margin-left:25%;
			margin-top: 10vh;
			min-height: 400px;
		}
		#bien{
/*			border-top:1vh  steelblue solid;*/
			box-shadow: 0px 1px 10px 0px steelblue;
			padding:auto;
			margin-bottom: 6px ;
			font-size: 2vh;
			width:119vh ;
			min-height: 2vh	;
			display: flex;
			padding-left:1vh;
			padding-right:1vh;
/*			margin-left: 6%;*/
		}
		

	html{
		background-image: url(2.jpg);
		background-position: top;
/*		background-size: cover;*/
		background-attachment: fixed;
		background-size: 100%;
		background-color:white ;
	}
body{
/*	margin-top: -100px;*/
	background-color:lavender;
	border:6px steelblue solid;
	width: 80.4%;
	margin:auto;
	border-bottom: none;
}
#sp-header {
	position: fixed;
	margin-top: -10px;
/*	margin-left: 11px;*/
    background-color:steelblue;
    text-align: center;
    display: flex;
    flex-direction: row;
    padding: auto;
    height: 6vh;
	font-size: 2vh;
    align-items: center;
    margin-bottom: 30px;
    border: steelblue solid;
/*    justify-content: center;*/
	width:80% ;
}

.btnhead{
	transition: 0.3s;
	color: white;
	background-color: steelblue;
	font-weight: bold;
	font-size: 120%;
	letter-spacing: 1px;
	text-decoration: none;
	margin-left:30px;
	border: 1px steelblue solid;
}
.btnhead:hover{
	transition: 0.3s;
	color: steelblue;
	border: 1px white solid;
	background-color: white;
	border-radius: 10px;
	padding: 3px;
}
#btnhead{
	background-color: steelblue;
/*	border: 1px black solid;*/
	margin-left:0px;
	width: 60%;

}
#barreRecherche{
/*	background-color: orangered;*/
	margin-left:90px;
}
#imglogo{
	width: 12vh;
	height: 8vh;
	margin-top: -2vh;
	margin-right: 10px;
}
#cntlogo{
	width: 30vh;
	height: 6vh;
	margin-left: 10px;
	display: flex;
	justify-content: center;
	align-items: center;
	font-weight: bold;
	font-size: 120%;
	background-color: steelblue;
	color: white;
	text-decoration: none;
}
#profil{
/*	border:solid;*/
/*	height: vh;*/
	background-color: steelblue;
	color: white;
	width: 26%;
	display: flex;
	align-items: center;
	justify-content: center;
	margin-right:10px;
/*	border: solid;*/
}
.aa{
	background-color:steelblue ;
/*	border: 1.5px solid;*/
	padding: 2px;
	color: white;
	font-weight: bolder;
	text-decoration: none;
	display: flex;
	align-items: center;
}
.img_profil{
	width: 6vh;
	height: 6vh;
}
.aaa{
	background-color:steelblue ;
	border: 1.5px solid;
	padding: 2px;
	margin-left: 30px;
	color: white;
	font-weight: bolder;
	
}

</style>
</head>
<body>
<header id="sp-header" class="header-sticky">
	<a href="accueil.php" id="cntlogo" ><img src="img/img du site/logo1.png" id="imglogo"/>sama-cle.com</a>
	<div id="btnhead">	
		<a href="accueil.php" id="accueil" class="btnhead">Accueil</a>
		<a href="reservation.php" id="reserve" class="btnhead">Mes reserves</a>
		<a href="location.php" id="location" class="btnhead">Location</a>
		<a href="favoris.php" id="favoris" class="btnhead">Mes Favoris</a>
	</div>
	<?php $donnees= getDonnees(@$_SESSION['email']);
	if (@$_SESSION['access']=="client") {
	 	echo "<div id='profil'><a class='aa' href='accueil.php' >
	 		<img src=".@$donnees['profil']." class='img_profil' />&nbsp".@$donnees['Prenom']." &nbsp".@$donnees['nom']."
	 	</a><a href='deconnexion.php' class='aaa'>Deconnexion</a></div>";
	 }else{
	 	echo "<div id='profil'><a class='aa' href='authentification.php' >connexion</a></div>";	
	 }
	 ?>
</header>
</body>
</html>
