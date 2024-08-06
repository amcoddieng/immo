	<?php 
	session_start();
	// if ($_SESSION["access"]!=="commerciaux") {
	// 	header('Location:authentification.php');
	// 	exit();
	// }
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ajouter un bien</title>
	<style type="text/css">
		*{
/*			border: solid;*/
		}
		.c{
			margin-top: 6vh;
/*			display: flex;*/
/*			align-items: center;*/
			background-color: steelblue;
			width: 100%;
/*			justify-content: center;*/
			font-size:3vh;
			color: white;
			letter-spacing: 1px;
			text-align: center;
			padding-left: ;
			height: 4vh;
/*			top:0px;*/
			font-weight: bold;
/*			margin:auto;*/
		}
		#divform{
			min-height: 60vh;
			margin-top: 1vh;
			display: flex;
/*			border:steelblue solid;*/
			display: ineline-block;
			width: 100%;
			justify-content: center;
/*			flex-direction: column;*/
/*			align-items: center;*/
		}
		#img_det{
			margin-top: 1vh;
			width: 100%;
			height: 90%;
/*			margin-left: 120px;*/
			display: flex;
/*			border: 1px steelblue solid;*/
			border-radius: 30px;
			margin-left:0%;
			transition: 2s;
		}
		.img_det1{
			margin-top: 15px;
			width:6vh;
			height:6vh;
			margin-left: 10px;
			display: inline-block;
			transition: 2s;
			}
		.img_petit{
			display: flex;
			transition: 2s;
/*			flex-direction: column;*/
			width: 100%;
			min-height: 50px;
/*			margin:auto;*/
			margin-top:-6px ;
/*			border: solid;*/
/*			align-items: center;*/
			justify-content: left;
/*			display: block;*/

		}
		.img_grand{
/*			border: solid;*/
			margin-top: 1vh;
			transition: 3s;
			margin-left: 6%;
			height: 60vh;
			width: 60%;
			display: inline-block;
		}
		.cont{
			display:inline-block;
/*			border: solid;*/
			width: 100%;
			display: flex;
		}
		.det{
/*			display: flex;*/
/*			border:steelblue solid;*/
			margin-left: 3%;
/*			line-height: 21px;*/
/*			margin-top: -480px;*/
/*			height: 200%;*/
/*			flex-direction: column;*/
			width: 38%;
			font-size: 2.2vh;

		}
		.btn_opt1{
			float: right;
			margin-right: 1%;
			color: white;
			background-color: steelblue;
			box-shadow: 3px 1px 3px 0px red;
			padding: 3px;
			cursor: pointer;
			transition: 0.3s;
			font-size: 2vh;
/*			margin-top: -25px;*/
/*			margin-top: 40px;*/
			text-decoration: none;
		}
		.btn_opt2{
			float: right;
			margin-right:1%;
			color: white;
			background-color: steelblue;
			box-shadow: 3px 1px 3px 0px green;
			padding: 3px;
			cursor: pointer;
			transition: 0.3s;
/*			margin-top: 40px;*/
			font-size: 2vh;
			text-decoration: none;
		}
		.btn_opt2:hover,.btn_opt1:hover{
			padding: 1px;
		}
		.btn_opt2:active,.btn_opt1:active{
			padding: 3px;
		}
		#opt{
			float: right;
			margin-right: 190px;
			color: white;
			background-color: steelblue;
			box-shadow: 3px 1px 3px 0px green;
			padding: 3px;
			cursor: pointer;
			transition: 0.3s;
			margin-top: -30px;
			text-decoration: none;
		}
		h4{
/*			width: 250px;*/
			min-height: 1px;
/*			border: solid;*/
		}

	</style>
</head>

<body>
<?php 
	if (@$_SESSION["access"]=="commerciaux") {
			include 'headerCommercial.php';
		}else{
			include 'header.php';
		}
	
	if (isset($_GET['id'])) {
		
		$ligne=getDonneesBien_id($_GET['id']);
		echo "
			<br/><br/>
		<p class='c'>Detail du Bien</p>
		";
	if (@$_SESSION["access"]=="commerciaux") {
		echo "<a class='btn_opt1' href='mesbien.php?idd=".$_GET['id'] ."'>Suprimer</a>
    			<a class='btn_opt2' href='modProd.php?id=".$_GET['id']."'>Modifie</a>
				<a class='btn_opt2' href='detail.php?histo=".$_GET['id']."'>historiques de location</a>";
		}else{
				echo "<a class='btn_opt1' href='traitement.php?Reserve=".$ligne['id_biens']."' id='ot'>Reserver</a>
				<a class='btn_opt2' href='traitement.php?Favoris=".$ligne['id_biens']."'>Ajouter au favoris</a>";
			}
			$e=array(explode(",",$ligne['photos']));
	
		echo "		
	<div id='divform'>
			<div class='img_grand'>
				<img src=' ".$e[0][0]." ' id='img_det'/>
			</div>
	<div  class='det'>
			<span><h4> ".$ligne['nom_bien']."</h4></span>
			<span><h4>type :".$ligne['type']."</h4></span>
			<span><h4>Adresse :".$ligne['adresse']." ".$ligne['departement']." ".$ligne['region']."</h4></span>
			<span><h4>disponibilite :".$ligne['disponibilite']."</h4></span>
			<span><h4>date de publication :".$ligne['date_pub']."</h4></span>
			<span><h4>Prix : ".$ligne['prix']."/".$ligne['cycle']."</h4></span>
			<span ><h3>Description :</h3>".$ligne['description']." </span>
</div>	
	</div>
		<div class='img_petit'>


		";

		foreach ($e[0] as $key => $value) {
				echo "
				 <img src='$value ' id='id$key' class='img_det1' />
					<script>
					document.getElementById('id$key').addEventListener('mouseover',function () {
					document.getElementById('img_det').src=document.getElementById('id$key').src
					})
					</script>";
					}
		}elseif (isset($_GET['histo'])) {
			// code affichage de tous les historiques d'un clients
		$recup=bd_connect()->query("SELECT *FROM historique INNER JOIN users ON historique.email_client=biens.email_client WHERE id_biens='".$_GET['histo']."' ");
	 		if ($recup->rowCount()>0) {	
	 			echo"
	 				<table>
	  		<tr>	  			
	  			<td>ID</td>
	  			<td>Nom</td>
	  			<td>Type</td>
	  			<td>Prix</td>
	  			<td>Cycle</td>
	  			<td>Adresse</td>
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
	}elseif (isset($_GET['histo2'])) {
		$ligne=getDonneesBien_id($_GET['histo2']);
		echo "
			<br/><br/>
		<p class='c'>Detail du Bien</p>
		";
	if (@$_SESSION["access"]=="commerciaux") {
		echo "<a class='btn_opt2' href='detail.php?histo=".$_GET['histo2']."'>historiques de location</a>";
		}else{
				echo "<a class='btn_opt1' href='traitement.php?Reserve=".$ligne['id_biens']."' id='ot'>Reserver</a>
				<a class='btn_opt2' href='traitement.php?Favoris=".$ligne['id_biens']."'>Ajouter au favoris</a>";
			}
			$e=array(explode(",",$ligne['photos']));
	
		echo "		
	<div id='divform'>
			<div class='img_grand'>
				<img src=' ".$e[0][0]." ' id='img_det'/>
			</div>
	<div  class='det'>
			<span><h4> ".$ligne['nom_bien']."</h4></span>
			<span><h4>type :".$ligne['type']."</h4></span>
			<span><h4>Adresse :".$ligne['adresse']." ".$ligne['departement']." ".$ligne['region']."</h4></span>
			<span><h4>date de publication :".$ligne['date_pub']."</h4></span>
			<span><h4>Prix : ".$ligne['prix']."/".$ligne['cycle']."</h4></span>
			<span><h4>Locataire : ".$_GET['client']."</h4></span>
			<span ><h3>Description :</h3>".$ligne['description']." </span>
</div>	
	</div>
		<div class='img_petit'>


		";

		foreach ($e[0] as $key => $value) {
				echo "
				 <img src='$value ' id='id$key' class='img_det1' />
					<script>
					document.getElementById('id$key').addEventListener('mouseover',function () {
					document.getElementById('img_det').src=document.getElementById('id$key').src
					})
					</script>";
					}
	}
		

		?>
		</div>
<br/><br/><br/><br/><br/><br/><br/><br/>
	
</body>

</html>
<?php
	  include 'footer.php';?>