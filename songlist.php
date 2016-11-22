<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="styles/style.css" type="text/css" rel=stylesheet>
	<script src="scripts/adminScripts.js"></script> <!-- Admin scriptit -->
</head>

<body>
<?php include_once("includes/nav.html"); ?>
<main>
        <section class="queue">
                <?php printTableQueue(); ?>
        </section>
        <section class="queue">
            <?php printTablePlayed(); ?>
        </section>
    </main>
<?php include_once("includes/footer.php"); ?>
</body>

<?php

//jono-listan tulostus
function printTableQueue(){
	try{
	$db = new SQLite3('databases/testdb.db');
	
	$results = $db->prepare("SELECT nimi,kanava,YTid,lisaaja,lisatty,id FROM Video WHERE tila='jono';");
	$result = $results->execute(); //jonohaku
	
	$countSql = $db->prepare("SELECT count(*) FROM Video WHERE tila='jono';");
	$countResult = $countSql->execute(); //jonomäärähaku
	
	$count = $countResult->fetchArray();
	
	echo "<h1 class='listHeader'>Jono (".$count[0].")</h1>
	<table class='listTable'>";
	
	while($row = $result->fetchArray()) {
		echo	"<tr><td><img class='thumbnailSongList' src='https://i.ytimg.com/vi/".$row[2]."/mqdefault.jpg')><td>
				<ul>
					<li><a class='videoLink' target='_blank' href='https://www.youtube.com/watch?v=".$row[2]."'>".$row[0]."</a></li>
					<li>".$row[1]."</li>
					<li><button onclick=removeVideo('".$row[5]."')>X</button><i>".$row[4]." - ".$row[3]."</i></li>
				</ul>
				</td>
				</tr>";
	}
	echo "</table>";
	}
	catch(Exception $e){
		echo "database error";
	}
}

//soitetut-listan tulostus
function printTablePlayed(){
	try{
	$db = new SQLite3('databases/testdb.db');
	
	$results = $db->prepare("SELECT nimi,kanava,YTid,lisaaja,soitettu FROM Video WHERE tila='soitettu';");
	$result = $results->execute(); //soitetuthaku
	
	$countSql = $db->prepare("SELECT count(*) FROM Video WHERE tila='soitettu';");
	$countResult = $countSql->execute(); //soitetutmäärähaku
	
	$count = $countResult->fetchArray();
	
	echo "<h1 class='listHeader'>Soitetut (".$count[0].")</h1>
	<table class='listTable'>";
	
	while($row = $result->fetchArray()) {
		echo	"<tr><td><img class='thumbnailSongList' src='https://i.ytimg.com/vi/".$row[2]."/mqdefault.jpg')><td>
				<ul>
					<li><a class='videoLink' target='_blank' href='https://www.youtube.com/watch?v=".$row[2]."'>".$row[0]."</a></li>
					<li>".$row[1]."</li>
					<li><i>".$row[4]." - ".$row[3]."</i></li>
				</ul>
				</td>
				</tr>";
	}
	echo "</table>";
	}
	catch(Exception $e){
		echo "database error";
	}
}
?>