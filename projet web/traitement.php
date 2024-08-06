<?php
function bd_connect(){
	return new PDO('mysql:host=localhost;dbname=agence_immobiliere;charset=utf8','root','');
}
session_start();
//  Inscription d'un nouveau user
	 require 'user.class.php';
	if (isset($_POST['enregistrer'])) {
		 $user= new user($_POST['email'],$_POST['mdp']);
		 if ($user->verify_user() == false) {
		 	$user->insert_donnees_restants( $_POST['nom'],$_POST['prenom'],$_POST['numero'],$_POST['date_naiss'],$_POST['lieu_naiss'],$_POST['status'],$_FILES['img']);
		 	$user->traiterPhoto();
		 	$user->insert_user();
		 	
		 	$_SESSION['inscription']="<h3 style='text-align: center;color: green'>inscription reussi</h3><br/>";
		 	header('Location:authentification.php');
		 }else{
		 	
		 	$_SESSION['inscription']="Echec de l'inscription Adresse (".$_POST['email'].") email existe deja";
		 	header('Location:inscription.php');
		 }
		
	}

	// Connexion pour un user
	if (isset($_POST['connexion'])) {
		$user1= new user($_POST['email'],$_POST['mdp']);
		if($user1->connect()==true){
			if ($user1->getType()=="client") {	
				if ($user1->verifcompte()=="act") {
					$_SESSION['access']="client";
					$_SESSION['email']=$_POST['email'];
					$_SESSION['connection']="start";
					header('Location:accueil.php');
				}else{
					$_SESSION['inscription']="<h3 style='text-align: center;color: red'>votre compte a ete desactiver par l'administrateur</h3><br/>";
					header('Location:authentification.php');
				}
			}else{
				$_SESSION['email']=$_POST['email'];
					$_SESSION['connection']="start";
				$_SESSION["access"]="commerciaux";
			header('Location:mesbien.php');
			}
			
		}else{
			;
		 	$_SESSION['inscription']="<h3 style='text-align: center;color: red'>Echec de la connexion verifier votre email ou votre mot de passe</h3><br/>";
		 	header('Location:authentification.php');
		}
	}
	// code ajout biens
	if (isset($_POST['publier'])) {
		$photos=$_FILES['photos'];
		$id=time();
		$id=$id-1688630624;
		$source=$photos['tmp_name'];
		$destination=$photos['name'];
		foreach($photos['tmp_name'] as $i=>$row){
			move_uploaded_file($source[$i],$destination[$i]="img/commercial/".$_SESSION['email'].".N".$i."ID=".$id.".png");
		}
		$insert=bd_connect()->prepare('INSERT INTO `biens`(`id_biens`,`nom_bien`,`prix`,`cycle`,`adresse`,`region`,`departement`,`description`,`date_pub`,`email`,`type`,`photos`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)');
			$insert->execute(array($id,$_POST['nom'],$_POST['prix'],$_POST['cycle'],$_POST['adresse'],$_POST['region'],$_POST['departement'],$_POST['description'],$dd=date('Y/m/d'),$_SESSION['email'],$_POST['type'],implode(" , ",$destination)));
		$_SESSION['ajout']="Bien ajouter avec succe";
		header('Location:ajoutprop.php');
	} 
// code modification Bien
if (isset($_POST['mod'])) {
	if (!empty($_POST['nom'])) {
		
		update_bien($_POST['id'],"nom_bien",$_POST['nom']);
	}
	if (!empty($_POST['type'])) {
		
		update_bien($_POST['id'],"type",$_POST['type']);
	}
	if (!empty($_POST['prix'])) {
		
		update_bien($_POST['id'],"prix",$_POST['prix']);
	}
	if (!empty($_POST['adresse'])) {
		
		update_bien($_POST['id'],"adresse",$_POST['adresse']);
	}
	if (!empty($_POST['description'])) {
		
		update_bien($_POST['id'],"description",$_POST['description']);
	}
	if (!empty($_FILES['photos'])) {
			$a=getDonneesBien_id($_POST['id']);
		$e=explode(",", $a['photos']);
		foreach ($e as $key => $value) {
			unlink("FCPATH".$value);
			echo "$value <br/>";
		}
		$photos=$_FILES['photos'];
		$id=time();
		$source=$photos['tmp_name'];
		$destination=$photos['name'];
		foreach($photos['tmp_name'] as $i=>$row){
			move_uploaded_file($source[$i],$destination[$i]="img/commercial/".$_SESSION['email'].".N".$i."-ID=".$id.".png");
		}
		$insert=bd_connect()->prepare('UPDATE biens SET photos=? where id_biens=? ');
		$insert->execute(array(implode(",",$destination),$_POST['id']));
		}
		
}

// code ajout Favoris
	if (isset($_GET['Favoris'])) {
		if ($_SESSION['access']=="client") {
			if (verif_id($_GET['Favoris'],"favoris")==false) {
				favoris($_GET['Favoris'],$_SESSION['email']);
				echo "<script>window.close()</script>";
			}else{
				echo  "<script>window.close()</script>";
			}
		}else{
		 	$_SESSION['inscription']="<h4 style='text-align: center;color:red;'>connectez-vous d'abord, si vous n'avez de compte appuyer sur s'inscrire en bas </h4><br/>";
			header('Location:authentification.php');
		}
	}
// code Reservation

	if (isset($_GET['Reserve'])) {
		if ($_SESSION['access']=="client") {
			if (verif_id($_GET['Reserve'],"reservations")==false) {
				reserver($_GET['Reserve'],$_SESSION['email'],$_GET['deb'],$_GET['fin']);
				echo "<script>window.close()</script>";
			}elseif(retourne_etat($_GET['Reserve'],"attente")==true OR retourne_etat($_GET['Reserve'],"accepté")==true ){
				echo  "<script>window.close()</script>";
			}else{	
				reserver($_GET['Reserve'],$_SESSION['email']);
				echo  "<script>window.close()</script>";
			}
		}else{
		 	$_SESSION['inscription']="<h4 style='text-align: center;color:red;'>connectez-vous d'abord, si vous n'avez de compte appuyer sur s'inscrire en bas </h4><br/>";
			header('Location:authentification.php');
		}
	}
	if (isset($_POST['reserver2'])) {
		if ($_SESSION['access']=="client") {
			if (verif_id($_POST['id'],"reservations")==false) {
				reserver($_POST['id'],$_SESSION['email'],$_POST['arrive'],$_POST['sortie']);
				echo "<script>window.close()</script>";
			}elseif(retourne_etat($_POST['id'],"attente")==true OR retourne_etat($_POST['id'],"accepté")==true ){
				echo  "<script>window.close()</script>";
			}else{	
				reserver($_POST['id'],$_SESSION['email']);
				echo  "<script>window.close()</script>";
			}
		}else{
		 	$_SESSION['inscription']="<h4 style='text-align: center;color:red;'>connectez-vous d'abord, si vous n'avez de compte appuyer sur s'inscrire en bas </h4><br/>";
			header('Location:authentification.php');
		}
	}
// annulation de reservation
	
	if (isset($_GET['annul_reserve'])) {
		suprimer("reservations","id_reservation",$_GET['annul_reserve']);
		header('Location:reservation.php');
	}
// supression de favoris
	if (isset($_GET['enlever_favoris'])) {
		suprimer("favoris","id_biens",$_GET['enlever_favoris']);
		header('Location:favoris.php');
	}
	
// louer 
	if (isset($_GET['accepter'])) {
		louer("accepté",$_GET['accepter']);
		header('Location:commande.php');
	}
	 
// non louer 
	if (isset($_GET['rejeter'])) {
		louer("rejeté",$_GET['rejeter']);
		insert_histo($_GET['rejeter'],$_GET['bien'],$_GET['email_client'],date('Y-m-d'),"NULL","non louer");
		header('Location:commande.php');
	}
// fin de contrat
	if (isset($_GET['fin_contrat'])) {
		louer("fin contrat",$_GET['fin_contrat']);
		 insert_histo($_GET['fin_contrat'],$_GET['bien'],$_GET['email_client'],$_GET['debut'],date('Y-m-d'),"louer");
		header('Location:Location.php');
	}
	 ?>