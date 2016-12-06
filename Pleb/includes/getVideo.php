<?php
/*
index.php
Palauttaa soitettavan videon ID:n / paused		
											!muokkaa error viestit!
											!vaihda oikea tietokanta!
*/
$db = new SQLite3('/var/Databases/videoLog.db');
$results = $db->prepare("SELECT status,videoid FROM log LIMIT 1;"); //hakee login videon ja tilan
$result = $results->execute();
$video = $result->fetchArray();
if($video[0] != 'playing'){
	echo 'paused';
}
else{
	echo $video[1];
}
?>