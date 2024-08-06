<?php

	class bien{
private $id;
private $nom;
private $prix;
private $date;
private $description;
private $email;
private $type;
private $photos;

public function __construct($A,$B,$C,$S,$D,$E,$F,$g){
$nom=$A;
$prix=$B;
$description=$C;
$date=$S;
$email=$D;
$type=$E;
$photos=$F;
$adresse=$g;
}
public function creerId(){
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
public function cal(){
	$date=date('Y/m/d');
}
public function insert_bien()
		{
			$insert=bd_connect()->prepare('INSERT INTO `biens`(`id_biens`,`nom_bien`,`prix`,`adresse`,`description`,`date_pub`,`email`,`type`,`photos`) VALUES(?,?,?,?,?,?,?,?)');
			$insert->execute(array($this->id,$this->nom,$this->prix,$this->adresse,$this->description,$this->date,$this->email,$this->type,$this->photos));
			echo "ajouter";

		    ;
	}

}

	
?>