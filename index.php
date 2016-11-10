<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="styles/style.css" type="text/css" rel=stylesheet>
	<script src="scripts/indexScript.js"></script> <!-- index.php soittolistan nappiscriptit -->
	<script src="scripts/YTPlayerScript.js"></script> <!-- index.php YouTube-soittimen scriptit -->
</head>

<body>
<?php include_once("includes/nav.html"); ?> <!-- header ja navigointilinkit -->
<main>
	<!-- sivun vasen puoli -->
	<section>
		<!-- YouTube-soittimen div -->
			<div class="wrapper">
				<div id="player"></div>
			</div>
		<!-- YouTube-soittimen napit -->
			<article id=playerButtons>
				<button class="playerButton" id="play" onclick="playVideo()">Play</button><button class="playerButton" id="mute" onclick="muteVideo()">Mute</button><input id="volume" type=range min="0" max="100" value=100 oninput="changeVolume()">
			</article>
		<!-- Uuden kappaleen lisäyslomake -->
			<article>
				<h1>Lisää kappale</h1>
				<input type="text" name="song" placeholder="Syötä linkki..."><button>>></button>
			</article>
	</section>
	<!-- sivun oikea puoli -->
	<!-- soittolista -->
		<aside id="playlist">
			<table>
				<?php printTable(); ?>
			</table>
		</aside>
	<button id="playlistButton" onclick="closeList()">Close</button> <!-- soittolistan nappi -->
</main>
<?php include_once("includes/footer.php"); ?> <!-- footer -->
</body>

<?php
//soittolistan tulostusfunktio
function printTable(){
	$db = new SQLite3('databases/testdb.db'); //tietokanta
	
	$results = $db->prepare('SELECT * FROM Video'); //... WHERE id = :id' //tietokantahaun alustus
	//$results->bindValue(':id',$id);
	$result = $results->execute(); //tietokantahaku
	
	//soittolistataulukon tulostus
	while($row = $result->fetchArray()) {
		echo	"<tr><td><img class='thumbnail' src='imgs/kotori.png'></td>
				<td>
					<ul class='test'>
						<li><strong>".$row[1]."</strong></li>
						<li>".$row[2]."</li>
						<li><i>".$row[4]."</i></li>
					</ul>
				</td>
				</tr>";
	}
}
?>