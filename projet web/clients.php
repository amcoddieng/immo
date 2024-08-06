<!DOCTYPE html>
<?php 
	session_start();
	if ($_SESSION["access"]!=="commerciaux") {
		header('Location:authentification.php');
		exit();
	}
 ?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mon profil</title>
</head>
<style type="text/css">
	#Monprofil{
			background-color: white;
			color: steelblue;
			padding: 3px;
			border-radius: 15px;
		}
	td{
		border-bottom:1px steelblue solid;
		border:1px steelblue solid;	
		border-left:1px steelblue solid;
/*		border-top:1px steelblue solid;
/*		font-weight: bold;
/*		background-color: red;*/
		padding-right:20px;
		padding-bottom:0px;
		text-align: center;
/*		display: flex;*/
		flex-direction: row;
/*		justify-content: center;*/
/*		align-items: center;*/
	}
	#biens{
		min-height: 60vh;
	}
	.phot{
		width: 60px;
		height: 60px;
	}
	table{
		border-collapse: collapse;
		margin-left: 0px;
	}
	.btn_opt1{
			float: right;
			margin-left: 1%;
			color: white;
			background-color: steelblue;
			box-shadow: 3px 1px 3px 0px red;
			padding: 3px;
			cursor: pointer;
			transition: 0.3s;
			margin-left: 10px;
			text-decoration: none;
		}
		.btn_opt2{
			float: right;
			margin-left: 1%;
			color: white;
			background-color: steelblue;
			box-shadow: 3px 1px 3px 0px green;
			padding: 3px;
			cursor: pointer;
			transition: 0.3s;
			margin-left: 10px;
			text-decoration: none;
		}
		.btn_opt3{
			float: right;
/*			margin-left: 400px;*/
			color: white;
			background-color: steelblue;
			box-shadow: 3px 1px 3px 0px yellow;
			padding: 3px;
			cursor: pointer;
			transition: 0.3s;
			margin-left: 10px;
			text-decoration: none;
		}
		
		.btn_opt2:hover,.btn_opt1:hover,.btn_opt3:hover{
			padding: 4px;
		}

		.btn_opt2:active,.btn_opt1:active,.btn_opt3{
			padding: 3px;
		}
		.hh3{
			background-color: green;
			text-align: center;
		}
				#bien{
			width:% ;
			min-height: 50px;
			margin-bottom: 6px;
			display: flex;
			align-items: center;
			box-shadow: 0px 1px 10px 0px steelblue;
			border-top:1px  steelblue solid;
			padding: 15px;

		}
		
		.img_bien{
			width: 15%;
			height: 100px;
			border-radius: 13px;
			margin-top: 15px;
/*			border: solid;*/
		}
		.titre{
			color: black;
			font-weight: bold;
			font-family: sans-serif;
/*			background-color: steelblue;*/

			
		}
		.descr{
			margin-top: 100px;
			margin-right: 350px;
/*			background-color: steelblue;*/
		}
		#l{
			padding-left: 15px;
			width: 100%;
		}
		.adresse{
			margin-left:0px;
		}

</style>
<body>

<?php include 'headerCommercial.php';?>
<br/><br/><br/><br/>
<section id="biens">
	<?php
		if (isset($_GET['sup'])) {
			suprimer("users","email",$_GET['sup']);
		}elseif (isset($_GET['desact'])) {
			desact("desact",$_GET['desact']);
		}elseif (isset($_GET['act'])) {
			desact("act",$_GET['act']);
		}elseif(isset($_GET['hist'])){
			// code affichage de tous les historiques d'un clients
		$recup=bd_connect()->query("SELECT *FROM historique INNER JOIN biens ON historique.id_biens=biens.id_biens WHERE email_client='".$_GET['hist']."' ");
	 		if ($recup->rowCount()>0) {	
	 			echo"
	 			<h3 class='hh3'>Historique de ".$_GET['hist']."</h3>
	 				<table>
	  		<tr>	  			
	  			<td>ID</td>
	  			<td>Nom</td>
	  			<td>Type</td>
	  			<td>Prix</td>
	  			<td>Cycle</td>
	  			<td>Adresse</td>
	  			<td>Resultats</td>
	  			<td>Debut contrat</td>
	  			<td>Fin contrat</td>
	  			<td>Propriete</td>
	  			<td>Detail</td>

	  		</tr>
	 			";
		  		while($ligne=$recup->fetch()){
		  				$e=array(explode(",",$ligne['photos']));
					echo "
				<tr>	  			
	  				<td>".$ligne['id_biens']."</td>
	  				<td>".$ligne['nom_bien']."</td>
	  				<td>".$ligne['type']."</td>
	  				<td>".$ligne['prix']."</td>
	  				<td>".$ligne['cycle']."</td>
	  				<td>".$ligne['region']." - ".$ligne['departement']." - ".$ligne['adresse']."</td>
	  				<td>".$ligne['etat']."</td>
	  				<td>".$ligne['debut_du_contrat']."</td>
	 	 			<td>".$ligne['fin_de_contrat']."</td>
	  				<td>".$ligne['email']."</td>
	  				<td><a href='detail.php?id=".$ligne['id_biens']."'>Detail</a></td>
	  		</tr>
					";

		  		}
		  		echo"</table><br/><br/><br/><br/><br/><br/>";
		}else{
			echo "<h3 class='hh3'>cette client n'a pas d'historique de location</h3>";
		}
	}
?>
	
	  	<table>
	  		<tr>
	  			<td>photo profil</td>
	  			<td>Prenom</td>
	  			<td>Nom</td>
	  			<td>Email</td>
	  			<td>Lieu de naissance</td>
	  			<td>Date de naissance</td>
	  			<td>Numero</td>
	  			<td>Mot d passe</td>
	  			<td></td>
	  			<td></td>
	  			<td></td>
	  		</tr>
	  		
	  		
	  	 <?php
	 // code affichage de tous les clients
		$recup=bd_connect()->query("SELECT *FROM users WHERE status='client' ");
	 
	  		while($ligne=$recup->fetch()){
	  			if ($ligne['etat']=="act") {
	  				$bnt="<a class='btn_opt3' href='clients.php?desact=".$ligne['email']."'>desactiver</a>";
	  			}elseif($ligne['etat']=="desact"){
	  				$bnt="<a class='btn_opt3' href='clients.php?act=".$ligne['email']."'>activer</a>";
	  			}
				echo "
					<tr>
	  			<td><img src=".$ligne['profil']." class='phot'></td>
	  			<td>".$ligne['Prenom']."</td>
	  			<td>".$ligne['nom']."</td>
	  			<td>".$ligne['email']."</td>
	  			<td>".$ligne['lieu de naissance']."</td>
	  			<td>".$ligne['date de naissance']."</td>
	  			<td>".$ligne['numero']."</td>
	  			<td>".$ligne['mot_de_passe']."</td>
	  			<td><a class='btn_opt2' href='clients.php?hist=".$ligne['email']."'>historique</a></td>
	  			<td>".@$bnt."</td>
	  			<td><a class='btn_opt1' href='clients.php?sup=".$ligne['email']."'>suprimer</a></td>
	  		</tr>
				";
				
	  }
			
?>

	  	</table>

	
</section>

<?php
	  			include 'footer.php';
	  		  ?>
</body>
</html>