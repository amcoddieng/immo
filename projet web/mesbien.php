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
	<title>ajouter un bien</title>
	<style type="text/css">
		
		
		#biens{
			width: 100%;
/*			border: solid;*/
/*			margin-left:25%;*/
			margin-top: 90px;
			min-height: 345px;
		}
	/*	#bien{
/*			border: steelblue solid;*/
/*/6			width: ;*/
/*			min-height: 100px;*/
/*			margin-bottom: 6px;*/
/*			display: flex;*/
/*			margin-top: 100px;*/
/*			align-items: center;*/
/*			box-shadow: 0px 1px 10px 0px steelblue;*/
/*			border-top:1px  steelblue solid;*/
/*			padding: 15px;*/

/*		}*/
		
		.img_bien{
			width: 5vh;
			height: 5vh;
			border-radius: 13px;
/*			margin-top: -30px;*/
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
		#mesbien{
			background-color: white;
			color: steelblue;
			padding: 3px;
			border-radius: 15px;
		}
		.btn_opt1{
/*			float: right;*/
/*			margin-right: 5px;*/
			color: white;
			background-color: steelblue;
			box-shadow: 3px 1px 3px 0px red;
			padding: 3px;
			margin-left: 2vh;
			cursor: pointer;
			transition: 0.3s;
			margin-top: 20px;
			text-decoration: none;
		}
		.btn_opt2{
/*			float: right;*/
/*			margin-right: 15px;*/
			color: white;
			background-color: steelblue;
			box-shadow: 3px 1px 3px 0px green;
			padding: 3px;
			margin-left: 2vh;
			cursor: pointer;
			transition: 0.3s;
			margin-top: 20px;
			text-decoration: none;
		}
		.btn_opt3{
/*			float: right;*/
/*			margin-right: 15px;*/
			color: white;
			margin-left: 2vh;
			background-color: steelblue;
			box-shadow: 3px 1px 3px 0px yellow;
			padding: 3px;
			cursor: pointer;
			transition: 0.3s;
			margin-top: 20px;
			text-decoration: none;
		}
		
		.btn_opt2:hover,.btn_opt1:hover,.btn_opt3:hover{
			padding: 4px;
		}

		.btn_opt2:active,.btn_opt1:active,.btn_opt3{
			padding: 3px;
		}
		td{
		border:3px steelblue solid;
/*		padding-bottom: 3px;*/
/*		border:1px steelblue solid;	*/
/*		border-left:1px steelblue solid;*/
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
	table{
		border-collapse: collapse;
		margin-left: 10px;
		font-size: 2vh;
	}

		
	</style>
</head>
<body>

<?php include 'headerCommercial.php';

?>

	
		<section id="biens">
			
	<?php 
		// code affichage de tous les biens
	
		$l=getDonneesBien_email($_SESSION['email']);
		if ($l->rowCount()==0) {
			echo "<h3 style='text-align:center;''>Vous avez aucun bien enregistrer<h3/>";
		}else{
			echo "
			<table>
			<tr>
				<td>Photo</td>
				<td>Nom</td>
				<td>Prix</td>
				<td>Cycle</td>
				<td>Type</td>
				<td>Adresse</td>
				<td>Publier le</td>
				<td>Description</td>
				<td>Detail</td>
				<td>Suprimer</td>
				<td>Modifier</td>
				

			</tr>
			";
			while($ligne=$l->fetch()){
				$e=array(explode(",",$ligne['photos']));
				echo "
				<tr>
				<td><img src=".$e[0][0]." class='img_bien'></td>
				<td>".$ligne['nom_bien']."</td>
				<td>".$ligne['prix']." FCFA</td>
				<td>".$ligne['cycle']."</td>
				<td>".$ligne['type']."</td>
				<td>".$ligne['adresse']."</td>
				<td>".$ligne['date_pub']."</td>
				<td>".$ligne['description']."</td>
				<td><a class='btn_opt3' href='detail.php?id=".$ligne['id_biens']."'>Detail</a></td>
				<td><a class='btn_opt1' href='mesbien.php?idd=".$ligne['id_biens']."'>Suprimer</a></td>
				<td><a class='btn_opt2' href='modProd.php?id=".$ligne['id_biens']."'>Modifier</a></td>
			</tr>
				";
							;
					if(@$_GET['idd']){
						sup(@$_GET['idd']);
					}
		}
		echo "</table>";
	}
	 ?>

		</section>



























			<?php
	  			include 'footer.php';
	  		  ?>
		</table>
	</body>
</html>
