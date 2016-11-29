<?php

/*
Lisää videon tiedot tietokantaan			!muokkaa error viestit!
											!vaihda oikea tietokanta!
*/


if(isset($_POST['videoTitle']) && isset($_POST['channelTitle']) && isset($_POST['videoId']) && isset($_POST['addedBy'])){
	try{
	$db = new SQLite3('../databases/testdb.db'); //tietokanta

	//jos video on jo jonossa:
	$videos = $db->prepare("SELECT YTid FROM Video WHERE YTid=:videoid AND tila='jono' LIMIT 1;");
	$videos->bindValue(':videoid',$_POST['videoId']);
	$video = $videos->execute(); //soitetuthaku
	$video = $video->fetchArray();
	if($video[0] != ""){
		exit("listalla");
	}
	
	
	
	$results = $db->prepare('INSERT INTO Video (nimi,kanava,YTid,lisaaja,lisatty) VALUES (:videoTitle, :channelTitle, :videoId, :addedBy, :Date)'); //... WHERE id = :id' //tietokantahaun alustus
	$results->bindValue(':videoTitle',$_POST['videoTitle']);
	$results->bindValue(':channelTitle',$_POST['channelTitle']);
	$results->bindValue(':videoId',$_POST['videoId']);
	$results->bindValue(':addedBy',$_POST['addedBy']);
	$results->bindValue(':Date', date("Y-m-d H:i:s"));
	$result = $results->execute(); //lisää
	echo "Lisätty";
	}
	catch(Exception $e){
		echo "db error";
	}
}
else{
	echo "error";
}
?>