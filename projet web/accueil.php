<!DOCTYPE html>
<?php 
	session_start();
	// if ($_SESSION['access']!=="client") {
		
	// 	header('Location:authentification.php');
	// }
 ?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>page d'accueil</title>
	<style type="text/css">
		
		.img_bien{
			width: 14vh;
			height: 14vh;
			border-radius: 13px;
			margin-top: 4vh;
/*			border: solid;*/
		}
		/*#biens{

			border:6px steelblue solid;
			width: 74%;
/*			border: solid;*/
			/*margin-left:25%;
			margin-top: 100px;
			min-height: 400px;*/
/*		}
		#bien{
			border-top:1px  steelblue solid;
			box-shadow: 0px 1px 10px 0px steelblue;
			padding:auto;
			margin-bottom: 6px ;*/
/*			width:100% ;*/
/*			min-height: 200px	;*/
/*			display: flex;*/
/*			padding: 15px;*/
/*			margin-left: 6%;*/
/*		}*/
		
		/*.img_bien{
			width: 15%;
			height: 100px;
			border-radius: 13px;
			margin-top: 50px;
/*			border: solid;*/
/*		}
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
		#accueil{
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
			color: darkgray;
		}
		.formm{
			margin-left: -30vh;
			width: 35%;
			margin-top: -1vh;
		}
		.leftt{

		}
	</style>
</head>
<body>

	<?php include'header.php'; include 'nav.php';?>


		<section id="biens">
	<?php 

		// code de recherche
		if (isset($_POST['recherche'])) {
			reach1(htmlspecialchars($_POST['text_reach']),$_POST['arrive'],$_POST['sortie']);
			
		}elseif(isset($_GET['reserver'])){

		// code affichage du biens a reserver
		$recup=bd_connect()->query("SELECT *FROM biens INNER JOIN users ON biens.email=users.email WHERE id_biens = ".$_GET['reserver']." ");
		
		while($ligne=$recup->fetch()){
			$e=array(explode(",",$ligne['photos']));
			echo "

			<article id='bien'>
				<img src=".$e[0][0]." class='img_bien'>
				<div id='l'>
				<span class='nom'>Publié par : ".$ligne['Prenom']." ".$ligne['nom']."</span><br/>
				<a href='detail.php?id=".$ligne['id_biens']."' class='titre'>".$ligne['nom_bien']."</a>
				<br/>
				<span class='prix'>Prix : ".$ligne['prix']." FCFA par mois</span><br/>
				<span class='type'>Type : ".$ligne['type']."</span><br/>
				<span class='adresse'>Region : ".$ligne['region']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Departement :".$ligne['departement']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </span>
				<span class='adresse'>Adresse : ".$ligne['adresse']."</span><br/>
				<span class='date'>Publier le : ".$ligne['date_pub']."</span><br/>
				<span class='descr'>Description: ".$ligne['description']."</span><br/>
				<form class='formm' method='post' action='traitement.php'>
				<h4>saisissez la periode du contrat:</h4>
				<label>date d'arrivee : </label> 
				<input type='date' name='arrive'><br/><br/>
				<label>date de sortie : </label> 
				<input type='date' name='sortie'><br/><br/>
				<input type='number' name='id' style='display:none' value=".$ligne['id_biens'].">
				<input type='submit' class='btn_opt2' value='Reserver' class='leftt' name='reserver2'' ></form>
				<a class='btn_opt1' target='blank' href='traitement.php?Favoris=".$ligne['id_biens']."'>Ajouter au favoris</a>
				<a class='btn_opt3' href='detail.php?id=".$ligne['id_biens']."'>Detail</a>
				<br/><br/>
				</div><br/>
				
			</article>";
		}

	}else{

		// code affichage de tous les biens
		$recup=bd_connect()->query("SELECT *FROM biens INNER JOIN users ON biens.email=users.email ORDER BY date_pub DESC ");
		while($ligne=$recup->fetch()){
			$e=array(explode(",",$ligne['photos']));
			echo "

			<article id='bien'>
				<img src=".$e[0][0]." class='img_bien'>
				<div id='l'>
				<span class='nom'>Publié par : ".$ligne['Prenom']." ".$ligne['nom']."</span><br/>
				<a href='detail.php?id=".$ligne['id_biens']."' class='titre'>".$ligne['nom_bien']."</a>
				<br/>
				<span class='prix'>Prix : ".$ligne['prix']." FCFA par mois</span><br/>
				<span class='type'>Type : ".$ligne['type']."</span><br/>
				<span class='adresse'>Region : ".$ligne['region']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Departement :".$ligne['departement']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </span>
				<span class='adresse'>Adresse : ".$ligne['adresse']."</span><br/>
				<span class='date'>Publier le : ".$ligne['date_pub']."</span><br/>
				<span class='descr'>Description: ".$ligne['description']."</span><br/>
				<a class='btn_opt1' target='blank' href='traitement.php?Favoris=".$ligne['id_biens']."'>Ajouter au favoris</a>
				<a class='btn_opt2' target='blank' href='accueil.php?reserver=".$ligne['id_biens']."'>Reserver</a>
				<a class='btn_opt3' href='detail.php?id=".$ligne['id_biens']."'>Detail</a>
				<br/><br/>
				</div><br/>
				
			</article>";
		}
	}

	 ?>

		</section>

</body>
		<?php 
	  			include 'footer.php';
	  		  ?>
</html>