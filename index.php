<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="styles/style.css" type="text/css" rel=stylesheet>
	<script src="scripts/indexScript.js"></script> <!-- index.php soittolistan nappiscriptit -->
	<script src="scripts/YTPlayerScript.js"></script> <!-- index.php YouTube-soittimen scriptit -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> <!-- jquery -->
</head>

<body>
<?php include_once("includes/nav.html"); ?> <!-- header ja navigointilinkit -->
<main>
	<section>
		<!-- YouTube-soittimen div -->
			<div class="wrapper">
				<div id="player"></div>
			</div>
		<!-- YouTube-soittimen napit -->
			<article id=playerButtons>
				<button class="playerButton" id="play" onclick="playVideo()">Play</button><button class="playerButton" id="skip" onclick="skipVideo()">Skip</button><button class="playerButton" id="mute" onclick="muteVideo()">Mute</button><input id="volume" type=range min="0" max="100" value=100 oninput="changeVolume(this.value)">
			</article>
		<!-- Uuden kappaleen lisäyslomake -->
			<article>
				<h1>Lisää kappale</h1>
				<input type="text" id="videoUrl" name="videoUrl" placeholder="https://www.youtube.com/watch?v=1yhTaFQJukx" onInput="getData(this.value)"><button onclick="addVideo()">>></button>
				<br><p>Title: <span id=videoTitle name=videoTitle></span></p>
				<p>Channel: <span id=channelTitle name=channelTitle></span></p>
			</article>
	</section>
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
//soittolistan tulostusfunktio						!vaihda oikea tietokanta!
function printTable(){
	$db = new SQLite3('databases/testdb.db');
	
	$results = $db->prepare('SELECT * FROM Video');
	$result = $results->execute(); //tietokantahaku
	
	//soittolistataulukon tulostus
	while($row = $result->fetchArray()) {
		echo	"<tr><td><img class='thumbnail' src='https://i.ytimg.com/vi/".$row[3]."/mqdefault.jpg' onclick=changeVideo('".$row[3]."')></td>
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