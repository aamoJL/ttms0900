<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="styles/style.css" type="text/css" rel=stylesheet>
    <script src="scripts/indexScript.js"></script>
	<script src="scripts/YTPlayerScript.js"></script>
</head>

<body>
<?php include_once("includes/nav.html"); ?>
<main>
	<section>
		<div class="wrapper">
			<div id="player"></div>
		</div>
		<article id=playerButtons>
			<button class="playerButton" id="play" onclick="playVideo()">Play</button><button class="playerButton" id="mute" onclick="muteVideo()">Mute</button><input id="volume" type=range min="0" max="100" value=100 oninput="changeVolume()">
		</article>
		<article>
			<h1>Lisää kappale</h1>
            <input type="text" name="song" placeholder="Syötä linkki..."><button>>></button>
		</article>
	</section>




</main>
<?php include_once("includes/footer.php"); ?>
</body>

<?php
function printTable(){
	//tietokannasta tiedot
}
?>