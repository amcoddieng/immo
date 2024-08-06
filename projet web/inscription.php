<!DOCTYPE html>
<html>
<head>
	<?php session_start();?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>inscription</title>
	<style type="text/css">
		*{
			font-family:monospace;
		}
		#divform{
/*			border:solid;*/
			min-height: 500px;
			display: flex;
			justify-content: center;
			flex-direction: column;
			align-items: center;
			margin-top: 100px;
		}
		#form-connexion{
/*			border: 0.1px steelblue solid;*/
/*			flex-direction: column;*/
			width: 60%;
			margin-top: -40px;
			min-height:400px;
/*			align-content: center;*/
			background-color: white;
/*			padding-left: 60px;*/
/*			display: flex;*/
/*			justify-content:space-evenly;*/
/*			align-items: center	;*/
			padding-top: 15px;
			box-shadow: 0px  1px 11px 1px steelblue;
		}
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
		}
		.ad{
			height: 30px;
			font-weight: bold;
			background-color: white;
			letter-spacing: 1px;
			font-family: monospace;
			margin-left: 30px;
		}
		.case{
			border: none;
			border-bottom:2px steelblue solid ;
			width: 30%;
			height: 20px;
			text-align: center;
			outline: none;
		}
		input[type=radio]{
			color: steelblue;
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

				
	<script type="text/javascript">
		function dd() {	
		if (document.getElementById('mdp1').value == document.getElementById('mdp2').value) {
			document.getElementById('btn').disabled=false;
			document.getElementById('error1').textContent=''
			document.getElementById('error1').display='none'
		}else{
			document.getElementById('btn').disabled=true;
			document.getElementById('error1').textContent='Mot de passe incorrect'
			document.getElementById('error1').display='visible'
		}
	}
		setInterval(dd,10)
	</script>



<body>
	<?php include "header.php";?>
						<!-- Formulaire de connexion -->
	<div id="divform">
		<p class="c">Inscription</p>
		<br/>
		<form method="post" action="traitement.php" id="form-connexion" enctype="multipart/form-data">
			<?php
			 	echo "<h3 style='text-align: center;color: red'>".@$_SESSION['inscription']."</h3><br/>";$_SESSION['inscription']=""; ?>
			<label class="ad" for="nom">Nom : </label>
			<input type="text" style="margin-left:249px;" name="nom" placeholder="Nom..." class="case" required autocomplete="none"><br/><br/>
			<label class="ad" for="nom">Prenom : </label>
			<input type="text" style="margin-left:225px;" name="prenom" placeholder="Prenom..." class="case" required autocomplete="none">
			<br/><br/>
			<label class="ad" >Email : </label>
			<input type="email" style="margin-left:233px;" name="email" class="case" placeholder="Adresse email..." required autocomplete="none"><br/><br/>
			<label class="ad" >Numero : </label>
			<input type="tel" style="margin-left:225px;" name="numero" class="case" placeholder="Numero..." required autocomplete="none">
			<br/><br/>
			<label class="ad" >Date de naissance : </label>
			<input type="date" style="margin-left:135px;" name="date_naiss" class="case" required autocomplete="none"><br/><br/>
			<label class="ad" >Lieu de naissance : </label>
			<input type="text" style="margin-left:135px;" name="lieu_naiss" class="case" placeholder="Lieu de naissance" required autocomplete="none">
			<br/><br/>
			<label class="ad" >Status : </label>
			<label class="ad"  style="margin-left:225px;">Client</label>
			<input type="radio" style="margin-left:9px;" name="status[]" value="client" checked>
			<label class="ad"  style="margin-left:10px;">Commerciaux</label>
			<input type="radio" style="margin-left:15px;" name="status[]" value="commerciaux" >
			<br/><br/>
			<label class="ad">creer un mot de passe : </label>
			<input type="password" style="margin-left:100px;" name="" class="case" id="mdp1" placeholder="Mot de passe" required autocomplete="none"><br/><br/>
			<label class="ad">retapez votre mot de passe : </label>
			<input type="password" style="margin-left:60px;" name="mdp" class="case" id="mdp2" placeholder="Retaper le mot de passe" required autocomplete="none"><br/><br/>
			<label style="margin-left:30px;" class="ad" >ajouter un photo profil</label>
			<input type="file" name="img"  class="photo" style="margin-left:102px;">
			<br/><br/><p id="error1"></p><br/>
			<input type="submit" class="send" value="S'inscrire" name="enregistrer" id="btn"  disabled>
			
		</form>
	</div>
<?php
	include 'footer.php';
?>
</body>
</html>

