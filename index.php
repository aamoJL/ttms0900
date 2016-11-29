<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="styles/style.css" type="text/css" rel=stylesheet>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> <!-- jquery -->
	<script src="scripts/indexScript.js"></script> <!-- index.php soittolistan scriptit -->
	<script src="scripts/YTPlayerScript.js"></script> <!-- index.php YouTube-soittimen scriptit -->
	<script src="scripts/adminScripts.js"></script> <!-- adminin käyttämät scriptit -->
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
				<button class="playerButton" id="play" onclick="playVideo()">Play</button><button class="playerButton" id="skip" onclick="adminChangeVideo('skip')">Skip</button><button class="playerButton" id="mute" onclick="muteVideo()">Mute</button><input id="volume" type=range min="0" max="100" value=100 oninput="changeVolume(this.value)">
			</article>
		<!-- Uuden kappaleen lisäyslomake -->
			<article>
				<h1>Lisää kappale</h1>
				<input type="text" id="videoUrl" name="videoUrl" placeholder="https://www.youtube.com/watch?v=1yhTaFQJukx" onInput="getData(this.value)"><button onclick="addVideo()">>></button>
				<span id="message"></span>
				<br><p>Title: <span id=videoTitle name=videoTitle></span></p>
				<p>Channel: <span id=channelTitle name=channelTitle></span></p>
			</article>
	</section>
	<!-- soittolista -->
		<aside id="playlist"></aside>
	<button id="playlistButton" onclick="closeList()">Close</button> <!-- soittolistan nappi -->
</main>
<?php include_once("includes/footer.php"); ?> <!-- footer -->
</body>