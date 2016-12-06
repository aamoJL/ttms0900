<?php
session_start();
/*
index.php
Vaihtaa videoLog.db tietokantaan tilan ja videon.
Palauttaa seuraavan videon ID:n			
											!muokkaa error viestit!
											!vaihda oikea tietokanta!
*/
if($_SESSION["user_name"] == "admin") {
	if(isset($_POST['next'])){
		try{
			$db = new SQLite3('/var/Databases/videoLog.db'); //tietokanta

			if($_POST['next'] == 'skip'){
				//jos seuraava video on jonon ensimmäinen:
				$videoDb = new SQLite3('/var/Databases/testdb.db'); //videotietokanta
				$results = $videoDb->prepare("SELECT YTid FROM Video WHERE tila='jono' LIMIT 1;"); //hakee ensimmäisen jonossa olevan videon
				$result = $results->execute(); //soitetuthaku

				$aika = date("Y-m-d H:i:s");
				$newvideo = $result->fetchArray();

				if($newvideo[0] != ""){
					$results = $db->prepare('UPDATE log SET date=:date, status=:status, videoid=:videoId WHERE id=1'); //tietokantahaun alustus
					$results->bindValue(':date',$aika);
					$results->bindValue(':status','playing');
					$results->bindValue(':videoId',$newvideo[0]);
					$result = $results->execute();
					removeNew($newvideo[0]);
					echo $newvideo[0];
				}
				else{
					$results = $db->prepare('UPDATE log SET date=:date, status=:status, videoid=:videoId WHERE id=1'); //tietokantahaun alustus
					$results->bindValue(':date',$aika);
					$results->bindValue(':status','paused');
					$results->bindValue(':videoId', "");
					$result = $results->execute();
					echo "";
				}
			}
			else if($_POST['next'] == 'play'){
				//jos seuraavan videon id annettu:
				if(isset($_POST['videoid'])){
					$aika = date("Y-m-d H:i:s");
					$results = $db->prepare('UPDATE log SET date=:date, status=:status, videoid=:videoId WHERE id=1'); //tietokantahaun alustus
					$results->bindValue(':date',$aika);
					$results->bindValue(':status','playing');
					$results->bindValue(':videoId', $_POST['videoid']);
					$result = $results->execute();
					removeNew($_POST['videoid']);
					echo $_POST['videoid'];
				}
			}
			/* else if($_POST['next'] == 'pause'){
				//jos pausetetaan
					$aika = date("Y-m-d H:i:s");
					$results = $db->prepare('UPDATE log SET date=:date, status=:status, videoid=:videoId WHERE id=1'); //tietokantahaun alustus
					$results->bindValue(':date',$aika);
					$results->bindValue(':status','paused');
					$results->bindValue(':videoId', '');
					$result = $results->execute();
					echo 'paused';
			} */
		}
		catch(Exception $e){
			echo "db error";
		}
	}
}
else{
	echo "error";
}
//vaihtaa uuden videon tilaksi 'soitettu'
function removeNew($videoid){
	$videoDb = new SQLite3('/var/Databases/testdb.db'); //videotietokanta
	$updateSql = $videoDb->prepare("UPDATE Video SET tila='soitettu',soitettu=:soitettu WHERE YTid=:id");
	$updateSql->bindValue(':id',$videoid);
	$updateSql->bindValue(':soitettu',date("Y-m-d H:i:s"));
	$update = $updateSql->execute();
}
?>
