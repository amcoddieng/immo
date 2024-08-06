<!DOCTYPE html>
<?php 
	session_start();
	
 ?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mes clients</title>
	<style type="text/css">
		#client{
			background-color: white;
			color: steelblue;
			padding: 3px;
			border-radius: 15px;
		}
		#biens{
/*			width:;*/
/*			border: solid;*/
/*			margin-left:25%;*/
			margin-top: 90px;
			min-height: 345px;
		}
		#bien{
/*			border: steelblue solid;*/
			width: ;
			min-height: 100px;
			margin-bottom: 6px;
			display: flex;
/*			margin-top: 100px;*/
			align-items: center;
			box-shadow: 0px 1px 10px 0px steelblue;
			border-top:1px  steelblue solid;
			padding: 15px;

		}
		
		.img_bien{
			width: 15%;
			height: 100px;
			border-radius: 13px;
			margin-top: -30px;
/*			border: solid;*/
		}
		.titre{
			color: black;
			font-weight: bold;
			font-family: sans-serif;
/*			background-color: steelblue;*/

			
		}
		
		#l{
			padding-left: 15px;
			width:85%;
/*			border: solid;*/
		}
		.adresse,.descr,.date,.type,.prix,.dispo{
/*			margin-left: 50px;*/
			font-weight: bold;
		}
		
		.btn_opt1{
			float: right;
			margin-right: 15px;
			color: white;
			background-color: steelblue;
			box-shadow: 3px 1px 3px 0px red;
			padding: 3px;
			cursor: pointer;
			transition: 0.3s;
			margin-top: 30px;
			text-decoration: none;
		}
		.btn_opt2{
			float: right;
			margin-right: 15px;
			color: white;
			background-color: steelblue;
			box-shadow: 3px 1px 3px 0px green;
			padding: 3px;
			cursor: pointer;
			transition: 0.3s;
			margin-top: 30px;
			text-decoration: none;
		}
		.btn_opt3{
			float: right;
			margin-right: 15px;
			color: white;
			background-color: steelblue;
			box-shadow: 3px 1px 3px 0px yellow;
			padding: 3px;
			cursor: pointer;
			transition: 0.3s;
			margin-top: 30px;
			text-decoration: none;
		}
		
		.btn_opt2:hover,.btn_opt1:hover,.btn_opt3:hover{
			padding: 4px;
		}

		.btn_opt2:active,.btn_opt1:active,.btn_opt3{
			padding: 3px;
		}
		table{
			border-top: solid;
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

	</style>
</head>
<?php 
	if ($_SESSION["access"]!=="commerciaux") {
		include 'header.php';
	  include 'nav.php';
	}else{
		include 'headerCommercial.php';
	}
	

?>
<body>
	<section id="biens">
		<?php  
			if ($_SESSION["access"]==="commerciaux") {
				// code affichage de tous les clients
				$recup=bd_connect()->query("SELECT *FROM reservations INNER JOIN biens ON reservations.id_biens=biens.id_biens WHERE etat='accepté' AND email='".$_SESSION['email']."' ");
				if ($recup->rowCount()>0) {	
	 			echo" <h3 style='text-align: center;letter-spacing:3px;'>toutes ces locations sont en cours...</h3>
	 				<table>
	  		<tr>	  			
	  			<td>ID</td>
	  			<td>Nom</td>
	  			<td>Type</td>
	  			<td>Prix</td>
	  			<td>Cycle</td>
	  			<td>Adresse</td>
	  			<td>Occupant</td>
	  			<td>Debut contrat</td>
	  			<td>Fin contrat</td>
	  			<td>Detail</td>

	  		</tr>
	 			";
		  		while($ligne=$recup->fetch()){
		  				$e=array(explode(",",$ligne['photos']));
		  				if ($ligne['fin_contrat']===NULL) {
		  					$ligne['fin_contrat']="indefinie";
		  				}
					echo "
				<tr>	  			
	  				<td>".$ligne['id_biens']."</td>
	  				<td>".$ligne['nom_bien']."</td>
	  				<td>".$ligne['type']."</td>
	  				<td>".$ligne['prix']."</td>
	  				<td>".$ligne['cycle']."</td>
	  				<td>".$ligne['region']." - ".$ligne['departement']." - ".$ligne['adresse']."</td>
	  				<td>".$ligne['email_client']."</td>
	  				<td>".$ligne['debut_de_contrat']."</td>
	 	 			<td>".$ligne['fin_contrat']."</td>
	  				<td><a href='traitement.php?fin_contrat=".$ligne['id_reservation']."&bien=".$ligne['id_biens']."&email_client=".$ligne['email_client']."&debut=".$ligne['debut_de_contrat']."'>Annuler le contrat</a></td>
	  		</tr>
					";

		  		}
		  		echo"</table><br/><br/><br/><br/><br/><br/>";
		}else{
			  	echo "<h3 style='text-align: center;letter-spacing:6px;'>Aucune location en cours...</h3>";
			}
			}elseif ($_SESSION["access"]==="client") {
				// code affichage de tous les locations d'un client
				$recup=bd_connect()->query("SELECT *FROM reservations INNER JOIN biens ON reservations.id_biens=biens.id_biens WHERE etat='accepté' AND email_client='".$_SESSION['email']."' ");
				if ($recup->rowCount()>0) {
					while($ligne=$recup->fetch()){
						$e=array(explode(",",$ligne['photos']));
						echo "

						<article id='bien'>
							<img src=".$e[0][0]." class='img_bien'>
							<div id='l'>
							<a href='detail.php?id=".$ligne['id_biens']."' class='titre'>".$ligne['nom_bien']."</a>
							<br/>
							<span class='prix'>Prix : ".$ligne['prix']." FCFA par mois</span><br/>
							<span class='type'>Type : ".$ligne['type']."</span><br/>
							<span class='adresse'>Region : ".$ligne['region']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Departement :".$ligne['departement']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </span>
							<span class='adresse'>Adresse : ".$ligne['adresse']."</span><br/>
							<span class='date'>debut du contrat : ".$ligne['debut_de_contrat']."</span><br/>
							<span class='descr'>Description: ".$ligne['description']."</span><br/>
							<a class='btn_opt2'  href='traitement.php?fin_contrat=".$ligne['id_reservation']."&bien=".$ligne['id_biens']."&email_client=".$ligne['email_client']."&debut=".$ligne['debut_de_contrat']."'>annulation du contrat</a>
							<a class='btn_opt3' href='detail.php?histo2=".$ligne['id_biens']."&client=".$ligne['email_client']."'>Detail du contrat</a>
							
							</div>
							
						</article>";
			}
			}
		}else{
				header('Location:authentification.php');
				exit();
			}		 
		?>
	</section>
	<?php
	  			include 'footer.php';
	  		  ?>
</body>
</html>