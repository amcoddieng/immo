<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		form{
			width: 40vh;
			min-height: 83vh;
/*			border:  solid;*/
			position: fixed;
			border-radius: 0px;
			margin-top: 6vh;
/*			display: inline-block;*/
/*			display: flex;*/
/*			flex-direction: column;*/
/*			justify-content: center;*/
			padding-top:6vh;
			text-align: center;
			font-size: 2vh;
		}
		.text_reach{
			border: none;
			border-bottom:2px steelblue solid ;
			width: 90%;
			font-size: 2vh;
			background-color: white;
			height: 3vh;
			text-align: center;
			outline: none;
		}
		.recherche{
			font-size: 2vh;
			background-color: steelblue;
			border: 1px steelblue solid;
			color: white;
			font-weight: bolder;
			cursor: pointer;
			letter-spacing: 1px;
			width: 100%;
			height: 4vh;
			text-align: center;
		}
	</style>
</head>
<body>
<form method="post" action="accueil.php">
	<h3>Recherche...</h3>
	<input type="text" name="text_reach" placeholder="app,villa,adresse..." class="text_reach"><br/><br/>
	<label>date d'arrivee : </label> 
	<input type="date" name="arrive"><br/><br/>
	<label>date de sortie : </label> 
	<input type="date" name="sortie"><br/><br/>
	<label>si vous ne savez pas quand vous sorter cocher "indefine"</label>
	<input type="checkbox" name="indefinie" value="indefinie">	
	<input type="submit" name="recherche" value="Recherche" class="recherche">
</form>
</body>
</html>