<!DOCTYPE html>
<html>
<head>
	<?php
	 session_start();
	?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>connexion</title>
	<style type="text/css">
		*{
			font-family:monospace;
		}
		#divform{
/*			border:solid;*/
			height: 500px;
			display: flex;
			justify-content: center;
			flex-direction: column;
			align-items: center;
			margin-top: 100px;
		}
		#form-connexion{
/*			border: solid;*/
			width: 30%;
			margin-top: -40px;
			min-height:260px;
			background-color: white;
			display: flex;
			justify-content: center;
			align-items: center	;
/*			padding-left: 80px;*/
			flex-direction: column;
			box-shadow: 0px  1px 11px 1px steelblue;
		}
		.c{
			margin-top: -10px;
			display: flex;
			align-items: center;
			background-color: steelblue;
			width: 30%;
			justify-content: center;
			font-size: 120%;
			color: white;
			letter-spacing: 1px;
			height: 50px;
			top:0px;
			font-weight: bold;
		}
		.ad{
			font-weight: bold;
			background-color: white;
			letter-spacing: 1px;
			font-family: monospace;
		}
		.case{
			border: none;
			border-bottom:2px steelblue solid ;
			width: 70%;
			height: 30px;
			text-align: center;
			outline: none;
		}
		.send{
			background-color: steelblue;
			border: 1px steelblue solid;
			color: white;
			font-weight: bolder;
			cursor: pointer;
			letter-spacing: 1px;
			width: 70%;
			height: 30px;
			text-align: center;
		}
		.a1{
			font-size: 90%;
			margin-left: -120px;
			background-color: white;
			color: blue;
		}
		.a2{
			font-size: 90%;
			background-color: white;
			color: blue;
			margin-left: 200px;
			margin-top: -15px;
		}
	</style>
</head>
<body>
	<?php include "header.php"; ?>
						<!-- Formulaire de connexion -->
	<div id="divform">
		<p class="c">Connexion</p><br/>
		<form method="post" action="traitement.php" id="form-connexion">
		<?php echo @$_SESSION['inscription'];
					@$_SESSION['inscription']="";
					?>
		
			<br/>
			<label for="email" class="ad">Adresse email</label>
			<br/>
			<input placeholder="Adresse Email" type="email" class="case" name="email" required>
			<br/>
			<br/>
			<label for="mdp" class="ad" >Mot de passe</label>
			<br/>	
			<input type="password" name="mdp" placeholder="Mot de Passe" class="case" required>
			<br/>
			<br/>
			<br/>
			<input type="submit" class="send" name="connexion" value="Connexion">
			<br/>
			<a href="" class="a1">mot de passe oublier? </a>
			<a href="inscription.php" class="a2"> S'inscrire? </a>	
			<br/>
			
		</form>
		
	</div>
<?php
	  include 'footer.php';
	  ?>
</body>
</html>
