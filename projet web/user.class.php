<?php

// classes des utilisateurs
	class user{
		private $nom;
		private $prenom;
		private $email;
		private $numero;
		private $date_naiss;
		private $lieu_naiss;
		private $status;
		private $mdp;
		private $photo;
		// constructeur d'inscription
		public function __construct($c,$h){	
			$this->email=$c;		
			$this->mdp=$h;
		}
		// Remplissage des donnees restants
		public function insert_donnees_restants($a,$b,$d,$e,$f,$g,$i)
		{
			$this->nom=$a;
			$this->prenom=$b;
			$this->numero=$d;
			$this->date_naiss=$e;
			$this->lieu_naiss=$f;
			$this->status=$g;
			$this->photo=$i;
		}
		// fonction pour connexion d'un user
		public function connect(){
			$verify_user=bd_connect()->prepare('SELECT *FROM users WHERE email=? AND mot_de_passe=?');
			$verify_user->execute(array($this->email,$this->mdp));
			if ($verify_user->rowCount()>0) {
				return true ;
			}else{
				return false;
			}
		}
		// fonction qui verifie l'existance du user
		public function verify_user(){
			$verify_user=bd_connect()->prepare('SELECT *FROM users WHERE email=?');
			$verify_user->execute(array($this->email));
			if ($verify_user->rowCount()>0) {
				return true ;
			}else{
				return false;
			}
		}
		// fonction qui ajoute le user dans la base de donnnee
		public function insert_user()
		{
			$insert=bd_connect()->prepare('INSERT INTO `users`(`Prenom`,`nom`,`date de naissance`,`lieu de naissance`,`numero`,`email`,`status`,`mot_de_passe`,`profil`) VALUES(?,?,?,?,?,?,?,?,?)');
			$insert->execute(array($this->prenom,$this->nom,$this->date_naiss,$this->lieu_naiss,$this->numero,$this->email,implode("",$this->status),$this->mdp,$this->photo));
		}
		// verifier si le compte est activer ou desactiver
			public function verifcompte(){
					$rcup=bd_connect()->query("SELECT *FROM users WHERE email='$this->email'");
					$l=$rcup->fetch();
					return $l['etat'];
				}
		// code pour obtenir le type de user
		public function getType(){
					$rcup=bd_connect()->query("SELECT *FROM users WHERE email='$this->email'");
					
					$l=$rcup->fetch();
					return $l['status'];
				}
		public function traiterPhoto(){
			$file=$this->photo;
			$source=$file['tmp_name'];
			$destn=$file['name'];
			move_uploaded_file($source,$destn="img/profil/$this->email.png");
			$this->photo=$destn;

		}
	}

	// fonction pour recuperer tout les donnees de profil
		function getDonnees($mail){
			$profil=bd_connect()->query("SELECT *FROM users WHERE email='$mail' ");
			
			return $profil->fetch();
		}
	// Creation ID pour un bien 
	function creerId(){
	do{
		$repeat=0;
		$nvid=random_int(1000, 1000000);
		$verifId=bd_connect()->prepare('SELECT *FROM biens WHERE id_biens=?');
		$verifId->execute(array($nvid));
		if ($verifId->rowCount()==0){
			$id=$nvid;
		}else{
			$repeat=1;
		}
	}while ($repeat==1);

}
	// Fonction pour recuperer les donnees d'un Bien
	function getDonneesBien_id($i){
			$bien=bd_connect()->query("SELECT *FROM biens WHERE id_biens='$i' ");
			
			return $bien->fetch();
		}

	function getDonneesBien_email($i){
			$bien=bd_connect()->query("SELECT *FROM biens WHERE email='$i' ORDER BY date_pub DESC ");
			return $bien;
		}
	// fonction pour suprimer un bien 
		function sup($i)
		{
		$supp=bd_connect()->prepare('DELETE FROM biens WHERE id_biens=?');
		$supp->execute(array($i));
		}
	// fontion update bien
		function update_bien($a,$b,$c){
			$bien_update=bd_connect()->prepare("UPDATE biens SET ".$b."=? WHERE id_biens=?");
			$bien_update->execute(array($c,$a));
		}
	// verification ID
		function verif_id($id,$tab)
		{
			$verif_Id=bd_connect()->prepare("SELECT *FROM ".$tab." WHERE id_biens=?");
			$verif_Id->execute(array($id));
			if ($verif_Id->rowCount()>0){
			return true;
			}
		}
	// fontion Reservation
		function reserver($a,$b,$c,$d){
			$reserver=bd_connect()->prepare('INSERT INTO reservations (`id_biens`,`email_client`,`debut_de_contrat`,`fin_contrat`) VALUES(?,?,?,?)');
			$reserver->execute(array($a,$b,$c,$d));
		}
	// fonction Favoris
		function favoris($a,$b){
			$favoris=bd_connect()->prepare('INSERT INTO favoris (`id_biens`,`email_client`) VALUES(?,?)');
			$favoris->execute(array($a,$b));
		}
		function recup_user($email)
		{
			$rep=bd_connect()->query('SELECT *FROM users WHERE email=?');
			$rep->execute(array($email));
			if ($rep->rowCount()>0){
			return $rep->fetch();
			}
		}
	// fonction suprime
		function suprimer($a,$b,$c){
			$sup=bd_connect()->prepare("DELETE FROM ".$a." WHERE ".$b."=?");
			$sup->execute(array($c));
		}
	// fonction louer 
		function louer($a,$b,)
		{

			$lou=bd_connect()->prepare("UPDATE reservations SET etat = ? ,debut_de_contrat = ? WHERE id_reservation = ?");
			$lou->execute(array($a,date('Y-m-d'),$b));                                                           
			
		}
	// fonction disponibilite
		
	// fonction retourne quelque chose dans une table
		function retourne_etat($a,$b){
			$return=bd_connect()->prepare("SELECT * FROM reservations WHERE id_biens= ? AND etat = ? ");
			$return->execute(array($a,$b));
			if ($return->rowCount()>0) {
				return true;
			}else{
				return false;
			}
		}
	// fonction fin de contrat
		function insert_histo($a,$b,$c,$d,$e,$f)
		{
			$insert_histo=bd_connect()->prepare('INSERT INTO historique (`id_reservation`,`id_biens`,`email_client`,`debut_du_contrat`,`fin_de_contrat`,`etat`) VALUES(?,?,?,?,?,?)');
			$insert_histo->execute(array($a,$b,$c,$d,$e,$f));
		}
	//  fonction desact ou act
		function desact($a,$b){
			$desact=bd_connect()->prepare("UPDATE users SET etat = ?  WHERE email = ?");
			$desact->execute(array($a,$b));   		
		}
	// fonction qui recherche la disponibilite pour une periode donner de tout les appart et villa
		function reach1($a,$b,$c){
			$biens=bd_connect()->query('SELECT * FROM biens WHERE adresse LIKE "%'.$a.'%" OR nom_bien LIKE "%'.$a.'%"  OR departement LIKE "%'.$a.'%" OR region LIKE "%'.$a.'%" OR type LIKE "%'.$a.'%"  ');
			if($biens->rowCount()>0){
						$etat="dispo";
				while ($bien=$biens->fetch()) {
					$rtrn=bd_connect()->prepare("SELECT * FROM reservations WHERE id_biens = ? AND etat = ? ");
					$rtrn->execute(array($bien['id_biens'],"accepté"));	
					if ($rtrn->rowCount()>0) {
						while ($res=$rtrn->fetch()) {
							if ($res['fin_contrat']===NULL) {
								if ($c!==true) {
									if (strtotime($b)<strtotime($res['debut_de_contrat']) AND strtotime($c)<strtotime($res['debut_de_contrat'])) {
									$etat='dispo';
									}else{
										echo $etat="non dispo";
									}
								}
								
							}else{
								if ($c!==false) {
										if (strtotime($b)<strtotime($res['debut_de_contrat']) AND strtotime($c)<strtotime($res['debut_de_contrat'])) {
											$etat='dispo';
										}elseif(strtotime($b)>strtotime($res['fin_contrat']) AND strtotime($c)>strtotime($res['fin_contrat'])){
											$etat="dispo";
										}else{
										$etat="non dispo";
									}
								}else{
									if (strtotime($b)>strtotime($res['fin_contrat'])) {
										$etat="dispo";
									}else{
										$etat="non dispo";
									}
								}
							}
						}
					}
							if ($etat=="dispo") {
								// code affichage du biens dispo
									$rcup=bd_connect()->prepare('SELECT *FROM biens INNER JOIN users ON biens.email=users.email WHERE id_biens = ? ');
									$rcup->execute(array($bien['id_biens']));
									while($ligne=$rcup->fetch()){
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
											<span class='dispo'>Disponible entre :".$b." et ".$c." </span><br/>
											<span class='date'>Publier le : ".$ligne['date_pub']."</span><br/>
											<span class='descr'>Description: ".$ligne['description']."</span><br/>
											<a class='btn_opt1' target='blank' href='traitement.php?Favoris=".$ligne['id_biens']."'>Ajouter au favoris</a>
											<a class='btn_opt2' target='blank' href='traitement.php?Reserve=".$ligne['id_biens']."&deb=".$b."&fin=".$c."'>Reserver</a>
											<a class='btn_opt3' href='detail.php?id=".$ligne['id_biens']."'>Detail</a>
											<br/>
											</div>
											
										</article>";
									}
							}	
			}
				}
			}
	// fonction qui recherche la disponibilite pour une periode donner d'un appart ou villa
		function dispo2($b,$c,$d){
			$return=bd_connect()->prepare("SELECT * FROM reservations INNER JOIN biens ON reservations.id_biens=biens.id_biens WHERE etat = ? AND biens.type = ? ");
			$return->execute(array('accepté',$d));
			$etat="non dispo";
			while($ret=$return->fetch()){
				$deb=strtotime($ret['debut_de_contrat']);
				$fin=strtotime($ret['fin_contrat']);

				if ($ret['fin_contrat']===NULL) {
					if ($c!==NULL) {
						if ( $deb>$b AND $c>$deb) {
						echo $etat="dispo";
						}else{
							echo"no dispo";
						}
					}else{
						echo "non dipo";
					}
				}else{

					if ( $deb>$b AND  $deb>$c) {
						echo $etat="dispo";
					}elseif( $fin<$b AND  $fin<$c){
						echo $etat="dispo";
					}else{
						echo "no dispo";
					}
				}
			}
				return $etat;
		}

	?>