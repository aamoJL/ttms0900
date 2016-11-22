<?php

/*
Vaihtaa videon tilaksi 'poistettu'.			!muokkaa error viestit!
							!vaihda oikea tietokanta!
*/


//					!Lisää if(admin) tähän!


if(isset($_POST['Id'])){
	try{
	$db = new SQLite3('../databases/testdb.db'); //tietokanta

	$updateSql = $db->prepare("UPDATE Video SET tila='poistettu' WHERE id=:id"); //tietokantahaun alustus
	$updateSql->bindValue(':id',$_POST['Id']);
	
	$update = $updateSql->execute();
	echo "Poistettu";
	}
	catch(Exception $e){
		echo "db remove error";
	}
}
else{
	echo "error: ei ID:tä";
}
?>