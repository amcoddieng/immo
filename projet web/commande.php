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
	<title>Commande</title>
</head>
<style type="text/css">
	#commande{
			background-color: white;
			color: steelblue;
			padding: 3px;
			border-radius: 15px;
		}
		#biens{
/*			border:black solid;*/
			border-left:2px steelblue solid;
/*			border:3px steelblue solid;*/
			width: ;
/*			border: solid;*/
			margin-left:120px;
			margin-right:120px;
			margin-top: 70px;
			min-height: 60px;
		}
		#bien{
			width:% ;
			min-height: 10px;
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
		.btn_opt1{
			float: right;
			margin-left: 1%;
			color: white;
			background-color: steelblue;
			box-shadow: 3px 1px 3px 0px red;
			padding: 3px;
			cursor: pointer;
			transition: 0.3s;
/*			margin-top: 30px;*/
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
/*			margin-top: 30px;*/
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
/*			margin-top: 30px;*/
			text-decoration: none;
		}
		
		.btn_opt2:hover,.btn_opt1:hover,.btn_opt3:hover{
			padding: 4px;
		}

		.btn_opt2:active,.btn_opt1:active,.btn_opt3{
			padding: 3px;
		}
		.nom{
			float: right;
			color: darkgray;
		}
</style>

<?php include 'headerCommercial.php';?>
	  <section id="biens">
	<?php
	  // code affichage de tous les commandes
		$recup=bd_connect()->query("SELECT *FROM reservations INNER JOIN biens ON reservations.id_biens=biens.id_biens WHERE etat='attente' AND email='".$_SESSION['email']."' ");
	  	if ($recup->rowCount()>0) {
	  		while($ligne=$recup->fetch()){
				$e=array(explode(",",$ligne['photos']));
				echo "

				<article id='bien'>
					<img src=".$e[0][0]." class='img_bien'>
					<div id='l'>
					<span class='nom'>Demande soumis par :<a href='' > ".$ligne['email_client']."<a></span><br/>
					<a href='detail.php?id=".$ligne['id_biens']."' class='titre'>".$ligne['nom_bien']."</a>
					<br/>
					<span class='prix'>Prix : ".$ligne['prix']." FCFA par mois</span><br/>
					<span class='type'>Type : ".$ligne['type']."</span><br/>
					<span class='adresse'>Region : ".$ligne['region']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Departement :".$ligne['departement']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </span>
					<span class='adresse'>Adresse : ".$ligne['adresse']."</span><br/>
					<span class='date'>Periode du contrat : Entre <h4 style='display:inline;background-color:green;color:white'>".$ligne['debut_de_contrat']." et ".$ligne['fin_contrat']."</h4></span><br/>
					<span class='descr'>Description: ".$ligne['description']."</span><br/>
					<a class='btn_opt1'  href='traitement.php?rejeter=".$ligne['id_reservation']."&bien=".$ligne['id_biens']."&email_client=".$ligne['email_client']."&debut=".$ligne['debut_de_contrat']."'>Rejeter</a>
					<a class='btn_opt2'  href='traitement.php?accepter=".$ligne['id_reservation']."&bien=".$ligne['id_biens']."'>Accepter</a>
					<a class='btn_opt3' href='detail.php?id=".$ligne['id_biens']."'>Detail</a>
					
					</div>
					
				</article>";
			}
	  	}else{
	  		echo "<h3 style='text-align: center;letter-spacing:6px;'>Aucune reservation en attente...</h3>";
	  	}
			
?>
</section>
<body>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
</body>
<?php
	  			include 'footer.php';
	  		  ?>
</html>