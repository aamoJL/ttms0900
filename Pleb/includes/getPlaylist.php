<?php
session_start();
/*
Tulostaa soittolistan			!muokkaa error viestit!
											!vaihda oikea tietokanta!
*/

try{
$db = new SQLite3('/var/Databases/testdb.db');

$results = $db->prepare("SELECT * FROM Video WHERE tila='jono';");
$result = $results->execute(); //tietokantahaku

echo "<table>";

if($_SESSION["user_name"] == "admin") {
	//soittolistataulukon tulostus
	while($row = $result->fetchArray()) {
		echo	"<tr><td><img class='thumbnail' src='https://i.ytimg.com/vi/".$row[3]."/mqdefault.jpg' onclick=adminChangeVideo('".$row[3]."')><td>
					<ul>
						<li><strong>".$row[1]."</strong></li>
						<li>".$row[2]."</li>
		           			<li><button onclick=removeVideo('".$row[0]."')>X</button><i>".$row[4]."</i></li>
					</ul>
				</td>
				</tr>";
	}
}
	else{
//soittolistataulukon tulostus
	while($row = $result->fetchArray()) {
		echo	"<tr><td><img class='thumbnail' src='https://i.ytimg.com/vi/".$row[3]."/mqdefault.jpg'><td>
					<ul>
						<li><strong>".$row[1]."</strong></li>
						<li>".$row[2]."</li>
		           			<li><i>".$row[4]."</i></li>
					</ul>
				</td>
				</tr>";
}
}

echo "</table>";

}
catch(Exception $e){
	echo "database error";
}

?>
