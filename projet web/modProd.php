	<?php 
	session_start();
	if ($_SESSION["access"]!=="commerciaux") {
		header('Location:authentification.php');
		exit();
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ajouter un bien</title>
	<style type="text/css">
		.c{
			margin-top: -10px;
			display: flex;
			align-items: center;
			background-color: steelblue;
			width: 60%;
			justify-content: center;
			font-size: 120%;
			color: white;
			letter-spacing: 1px;
			height: 60px;
			top:0px;
			font-weight: bold;
			margin:auto;
		}
		#divform{
			min-height: 460px;
			margin-top: 100px;
			display: flex;
			justify-content: center;
			flex-direction: column;
			align-items: center;
		}
		#form-connexion{

			width: 60%;
			margin-top: -40px;
			min-height:300px;
			background-color: white;
			padding-top: 15px;
			box-shadow: 0px  1px 11px 1px steelblue;
		}
		.case{
			border: none;
			border-bottom:2px steelblue solid ;
			width: 30%;
			height: 20px;
			text-align: center;
			outline: none;
		}
		.ad{
			margin-left: 130px;
			background-color: white;
		}
		.send{
			background-color: steelblue;
			border: 1px steelblue solid;
			color: white;
			font-weight: bolder;
			cursor: pointer;
			letter-spacing: 1px;
			width: 100%;
			height: 30px;
			text-align: center;
		}
	</style>
</head>

<body>
<?php include 'headerCommercial.php';
?>
	
	<div id="divform">
		<p class="c">Modification du Bien</p>
		<br/><br/>
			<form  id="form-connexion" method="post" action="traitement.php" enctype="multipart/form-data">
			<?php
				$ligne=getDonneesBien_id($_GET['id']);
			?>
			<label class="ad" >Nom du biens : </label>
			<input type="text" style="margin-left:100px;" name="nom" placeholder="Nom du bien..." class="case" value="<?php echo $ligne['nom_bien'] ;?>" required autocomplete="none"><br/><br/>
			<label class="ad" >Type : </label>
			<select name="type" style="margin-left:160px" class="case">
				<option value="<?php echo $ligne['type'];?>">Selectionner le type</option>
				<option value="Appartement">appartement</option>
				<option value="villa">villa</option>
			</select>
			<br/><br/>
			<label class="ad" for="nom">Prix : </label>
			<input type="number" style="margin-left:165px;" name="prix" placeholder="Prix..." class="case" required autocomplete="none" value="<?php echo $ligne['prix'] ;?>"><br/><br/>
			<label class="ad" >Adresse : </label>
			<input type="text" style="margin-left:140px;" name="adresse" placeholder="adresse..." class="case" required autocomplete="none" value="<?php echo $ligne['adresse'] ;?>"><br/><br/>
			<label class="ad" style="margin-top:-50px;">description : </label><br/>
			<textarea  style="margin-left:335px;height: 100px;" name="description" placeholder="description..." class="case"  autocomplete="none"></textarea><br/><br/>
			<label class="ad">Photos</label>
			<input type="file" style="margin-left:155px;" multiple class="case" name="photos[]">
			<br/><br/><br/>
			<input type="submit" class="send" value="Publier" name="mod" id="btn" >
			<input type="number" name="id" value="<?php echo $_GET['id'];?>" style="display:none;" >
		</form>

	</div>
</body>
</html>