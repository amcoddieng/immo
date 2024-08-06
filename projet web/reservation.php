<!DOCTYPE html>
<?php 
session_start();
	if ($_SESSION['access']!=="client") {
		$_SESSION['inscription']="<h4 style='text-align: center;color:red;'>connectez-vous d'abord pour voir vos reservations </h4><br/>";
			header('Location:authentification.php');
		}
 ?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reservation</title>
	<style type="text/css">
		/*#cont{

			border:6px steelblue solid;
			margin-top: 100px;
			width: 74%;
			margin-left: 25%;
			min-height: 600px;
		}
		#bien{
			border-top:1px  steelblue solid;
			box-shadow: 0px 1px 10px 0px steelblue;
			padding:auto;
			margin-bottom: 6px ;
			width:100% ;
			min-height: 200px	;
			display: flex;
			padding: 15px;
			margin-left: 6%;
		}
		
		.img_bien{
			width: 200px;
			height: 13`0px;
			border-radius: 13px;
			margin-top: 15px;
			border: solid;
		}
		.titre{
			color: black;
			font-weight: bold;
			font-family: sans-serif;
    		background-color: steelblue;*/

			
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
		#reserve{
			background-color: white;
			color: steelblue;
			padding: 3px;
			border-radius: 15px;
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
			color: black;
			background-color: lightgray;
			margin-top: 10px;
			padding: 1px;
			box-shadow: 1px 1px 2px 0px;
		}
		.nom1{
			float: right;
			color: black;
			background-color: red;
			margin-top: 10px;
			padding: 1px;
			box-shadow: 1px 1px 2px 0px;
		}
		.nom2{
			float: right;
			color: black;
			background-color: green;
			margin-top: 10px;
			padding: 1px;
			box-shadow: 1px 1px 2px 0px;
		}
		.nom3{
			float: right;
			color: black;
			background-color: yellow;
			margin-top: 10px;
			padding: 1px;
			box-shadow: 1px 1px 2px 0px;
		}
		.img_bien{
			width: 14vh;
			height: 14vh;
			border-radius: 13px;
			margin-top: 4vh;
/*			border: solid;*/
		}
	</style>
</head>
<?php include'header.php';include 'nav.php';?>

<body>
	<div id="biens">
		<?php 
		// code affichage de tous les reservations
		$recup=bd_connect()->query("SELECT *FROM reservations INNER JOIN biens ON reservations.id_biens=biens.id_biens ORDER BY date_de_reservation DESC ");
		if ($recup->rowCount()>0) {
			while($ligne=$recup->fetch()){
				// if ($ligne['etat'] == 'attente') {
				// 	echo "<script>
				// 		document.getElementById('nomm').className='nom1'
				// 	</script>";
				// }else{
				// 	echo "<script>
				// 		document.getElementById('nomm').className='nom2'
				// 	</script>";
				// }
				$e=array(explode(",",$ligne['photos']));
				echo "

				<article id='bien'>
					<img src=".$e[0][0]." class='img_bien'>
					<div id='l'>
					<span id='nomm' class='nom'>Etat : ".@$ligne['etat']."</span><br/>
					<a href='detail.php?id=".$ligne['id_biens']."' class='titre'>".$ligne['nom_bien']."</a>
					<br/>
					<span class='prix'>Prix : ".$ligne['prix']." FCFA par mois</span><br/>
					<span class='type'>Type : ".$ligne['type']."</span><br/>
					<span class='adresse'>Region : ".$ligne['region']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Departement :".$ligne['departement']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </span>
					<span class='adresse'>Adresse : ".$ligne['adresse']."</span><br/>
					<span class='date'>Publier le : ".$ligne['date_pub']."</span><br/>
					<span class='descr'>Description: ".$ligne['description']."</span><br/>
					<a class='btn_opt1' target='blank' href='traitement.php?Favoris=".$ligne['id_biens']."'>Ajouter au favoris</a>
					<a class='btn_opt2' target='blank' href='traitement.php?annul_reserve=".$ligne['id_reservation']."'>Suprimer</a>
					<a class='btn_opt3' href='detail.php?id=".$ligne['id_biens']."'>Detail</a>
					<br/><br/>
					</div>
					
				</article>";
				
			}
		}else{
	  		echo "<h3 style='text-align: center;letter-spacing:6px;'>Vous avez effectuer aucune reservations</h3>";
	  	}

	 ?>
	</div>
</body>
<?php
	  			include 'footer.php';
	  		  ?>
</html>