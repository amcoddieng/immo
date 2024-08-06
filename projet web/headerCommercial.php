<!DOCTYPE html>
<html>
<head>
	<?php
	require'user.class.php';
	function bd_connect(){
	return new PDO('mysql:host=localhost;dbname=agence_immobiliere;charset=utf8','root','');
}  ?>
	<script src="https://kit.fontawesome.com/a60502bf60.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>connexion</title>
<style type="text/css">
html{
	background-color:white;
	border:6px steelblue solid;
	width: 80%;
	margin:auto;
	border-bottom: none;
}
#sp-header {
	position: fixed;
	margin: auto;
	margin-top: -10px;
/*	margin-left: -11px;*/
    background-color:steelblue;
    text-align: center;
    display: flex;
    flex-direction: row;
    padding: auto;
    height: 60px;
    align-items: center;
    margin-bottom: 30px;
    border: steelblue solid;
/*    justify-content: center;*/
	width:80% ;
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
	margin-top: -100px;
	background-color:lavender;
/*	border:6px steelblue solid;*/
/*	width: 80.4%;*/
	margin:auto;
	border-bottom: none;
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
	width: 90px;
	height: 60px;
	margin-right: 10px;
}
#cntlogo{
	width: 360px;
	height: 60px;
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
	height: 80%;
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
.aaa{
	background-color:steelblue ;
	border: 1.5px solid;
	padding: 2px;
	margin-left: 30px;
	color: white;
	font-weight: bolder;
	
}
.img_profil{
	width: 60px;
	height: 60px;
}
html{
/*	background-color: ;*/
/*border-bottom: 10px;*/
/*	width:80%;/**/
/*	margin: auto;*/
/*	border-left: 1px steelblue solid;*/
/*	border-right: 1px steelblue solid;*/*/

}
.pp{
			display: flex;
			margin-left: 140vh;
/*			margin-left:790px;*/
			float: right;
			margin-top: 40px;
			position: fixed;
			background-color: steelblue;
			color: white;
			font-weight: bold;
			text-decoration: none;
			padding-left: 13px;
			padding-right: 13px;
			padding-top: 3px;
			padding-bottom: 3px;
			border-radius: 15px;
			letter-spacing: 1px;
			transition: 0.3s;
		}.pp:hover{
			padding-left: 15px;
			padding-right: 15px;
			padding-top: 4px;
			padding-bottom: 4px;
		}
		.pp:active{
			background-color: white;
			color: steelblue;
		}
</style>
</head>
<header id="sp-header" class="header-sticky">
	<a href="mesbien.php" id="cntlogo" ><img src="img/img du site/logo1.png" id="imglogo"/>sama-cle.com</a>
	<div id="btnhead">	
		<a href="clients.php" id="Monprofil" class="btnhead">Clients</a>
		<a href="mesbien.php" id="mesbien" class="btnhead">Mes biens</a>
		<a href="location.php" id="client" class="btnhead">locations</a>
		<a href="commande.php" id="commande" class="btnhead">Demandes</a>
	</div>
	<?php $donnees= getDonnees(@$_SESSION['email']);

	if (@$_SESSION['connection']=='start') {
	 	echo "<div id='profil'><a class='aa' href='authentification.php' >
	 		<img src=".@$donnees['profil']."  class='img_profil' />&nbsp".@$donnees['Prenom']." &nbsp".$donnees['nom']."</a> <a href='deconnexion.php' class='aaa'>Deconnexion</a></div>";
	 }
	 ?>
</header><br/>
	 <a class="pp" href="ajoutProp.php">Ajouter un Bien</a>

</html>
