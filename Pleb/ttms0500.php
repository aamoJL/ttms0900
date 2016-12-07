<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="styles/style.css" type="text/css" rel=stylesheet>
</head>

<body>
<?php include_once("includes/nav.php"); ?>
<main class="blog">
            <article class="dokumentti">
                <h1 class="dokumenttiotsikko">Harjoitustyö: Pleblist</h1>
				<h2>Kurssi: TTMS0500
				<h3>Tekijät: Joni Laukka, Jaakko Pöyhönen - 6.12.2016
                <hr></hr>
				<p>Lähdekoodit: <a href="http://185.14.185.175/ttms0900/Pleb/syntax.php" class=dokumentti>pleb</a> <a href="http://185.14.185.175/ttms0900/Pleb/includes/syntax.php" class=dokumentti>includes</a>
					<a href="http://185.14.185.175/ttms0900/react/syntax.php" class=dokumentti>chatconf</a><br>
				<a href="http://185.14.185.175/ttms0900/pleb.zip" class=dokumentti>Zip-paketti</a>
				</p>
                <hr>
                <h2>Tehtävän kuvaus</h2>
				<p>Linkki GitHub-suunnitelmaan?<br>
					<ul class=dokumentti>
					<li>Adminin johdolla toimiva automaattinen videosoittolista, johon voi lisätä kuka vain uusia videoita</li>
					<li>kaikille sama soittolista, kaikilla soi adminin video.</li>
					<li>Admin voi poistaa ja vaihtaa videoita</li>
					<li>Sivustolla myös blogi, jossa posteja kehityksestä</li>
					<li>Kirjautuminen admineille</li>
					</ul>
				</p>
				<hr>
				<h2>Toteutus</h3>
                <p>
					<h3>Pleblist (index.php):</h3>
					Header, footer ja nav ladataan includes/ -kansiosta php:llä.
					<h4>YTPlayerScript.js toiminta:</h4>
					<ul class=dokumentti>
						<li>Skripti luo sivulle varattuun paikkaan (div id=player) YouTube-soittimen ja lataa videon, kun sivusto ladataan.</li>
						<li>Kun soitin on valmis, skripti päivittää soitettavan videon tietokannasta (käyttäen indexScript.js refreshVideo-funktiota) sekä asettaa sivuston äänisäätimen arvon käyttäjän YouTube-soittimen ääniarvoon.</li>
						<li>Painettaessa sivun Mute-nappia, skripti vaihtaa soittimen äänenvoimaakuuden pois tai päälle riippuen edellisestä tilasta.</li>
						<li>Painettaessa sivun Play-nappia, skripti pysäyttää tai jatkaa videota, riippuen edellisestä tilasta.</li>
						<li>Vaihdettaessa sivun äänisäätimen arvoa, skripti vaihtaa soittimen ääniarvoa.</li>
						<li>Liitettäessä YouTube-linkin tai YouTube-videon ID:n Lisää kappale -lomakkeeseen, skripti hakee (getData(videoUrl), ajax) kyseisen videon tiedot käytttäen YouTube-apia. Jos linkin tiedot löytyvät, skripti tulostaa videon nimen ja kanavan lomakkeeseen.</li>
						<ul class=dokumentti>
							<li>skripti leikkaa annetusta linkistä videon id:n (11 merkkiä alkaen "="-merkistä).</li>
						</ul>
						<li>Painettaessa ">>"-nappia Lisää kappale -lomakkeesta, skripti lähettää (addVideo(), ajax) includes/addVideo.php:lle tiedot lomakkeelta (nimi,kanava,id).</li>
						<ul class=dokumentti>
							<li>skripti leikkaa annetusta linkistä videon id:n (11 merkkiä alkaen "="-merkistä).</li>
							<li>jos jokin kohta on tyhjä, skripti tulostaa ">>"-napin viereen "error".</li>
							<li>jos skripti vastaanottaa addVideo.php:ltä "listalla", tulostetaan viesti "video on jo listalla".</li>
						</ul>
					</ul>
					<h4>indexScript.js toiminta</h4>
					<ul class=dokumentti>
						<li>Painettaessa sivun soittolistan Close tai Open -nappeja, skripti avaa tai sulkee soittolistan.</li>
						<li>Skriptin refreshVideo()-funktio lähettää includes/getVideo.php:lle (ajax) pyynnön.</li>
							<ul class=dokumentti>
								<li>-jos getVideo.php palauttaa 'paused', soitin pysäytetään.</li>
								<li>-jos getVideo.php palauttaa eri videon kuin soivan videon ID:n, soittimen video vaihdetaan palautettuun videoon.</li>
								<li>-skripti pitää muistissa soittimen tilaa video-muuttujassa.</li>
								<li>-skripti toistetaan 10 sekunin välein.</li>
							</ul>
						<li>Skriptin refreshTable()-funktio (JQuery) lataa sivun soittolistan includes/getPlaylist.php:stä, kun sivu on valmis.</li>
							<ul class=dokumentti>
							<li>-Soittolistaa päivitetään 5 sekunin välein.</li>
							</ul>
					</ul>
					<h4>adminScripts.js toiminta:</h4>
					<ul class=dokumentti>
						<ul class=dokumentti>
							<li>skriptit tarkoitettu vain ylläpitäjille.</li>
						</ul>
						<li>Painettaessa soittolistan "X"-nappia videosta, skriptin removeVideo(id)-funktio (ajax) lähettää includes/removeVideo.php:lle poistettavan videon ID:n.</li>
						<li>Painettaessa soittolistan videon kuvasta tai soittimen Skip-napista, skriptin adminChangeVideo(id)-funktio (ajax) lähettää includes/changeVideo.php:lle soitettavan videon ID:n.</li>
							<ul class=dokumentti>
							<li>Skip-nappi vaihtaa soitettavaksi jonon ensimmäisen videon.</li>
							</ul>
					</ul>
					<h3>songlist.php</h3>
					<ul class=dokumentti>
						<li>Header, footer ja nav ladataan includes/ -kansiosta php:llä.</li>
						<li>Sivun skripti (JQuery) lataa kaksi videolistaa sivulle, kun sivu on valmis.</li>
							<ul class=dokumentti>
								<li>Jono-lista ladataan includes/getQueue.php:stä.</li>
								<li>soitetut-lista ladataan includes/getPlayed.php:stä.</li>
								<li>listat päivitetään 10 sekunin välein.</li>
							</ul>
						<li>"X"-napin painaminen videosta sama kuin index.php:ssä.</li>
					</ul>
					<h3>blog.php</h3>
					<ul class=dokumentti>
						<li>Header, footer ja nav ladataan includes/ -kansiosta php:llä.</li>
						<li>Painettaessa "X"-nappia, lähetetään sivuun liitettyyn includes/blogAdmin.php:hen poistettavan merkinnän indeksinumero.</li>
						</ul>
					<h4>adminScripts.js toiminta:</h4>
						<ul class=dokumentti>
						<li>Painettaessa "Uusi"-nappia skripti avaa lomakkeen uudelle blogimerkinnälle.</li>
							<ul class=dokumentti>
								<li>painettaessa lomakkeen "add"-nappia, lomakkeen tiedot (otsikko,viesti,mahdollinen kuva) lähetetään sivuun liitettyyn includes/blogAdmin.php:hen.</li>
							</ul>
						</ul>
		  			<h3>loginconf.php</h3>
					<ul class=dokumentti>
						<li>Nav.php lataa loginconf.php:n.</li>
						<li>Sisäänkirjautuminen adminille. Login form samassa tiedostossa.</li>
						</ul>
		    			<h4>navscripts.js toiminta:</h4>
						<ul class=dokumentti>
						<li>Login -painiketta painaessa avaa login formin.</li>
						<li>Sisään kirjauduttua muuntaa Login -painikkeen Logout -painikkeeksi.</li>
					    </ul>
		  			<h3>react-chat.js</h3>
					<ul class=dokumentti>
						<li>Luo chatin chat tabiin.</li>
						</ul>
				</p>
				<hr>
                <h2>Ajan käyttö</h2>
				<p>
				<ul class=dokumentti>
					<li>15% UI</li>
					<li>50% palvelin</li>
					<li>35% client</li>
				</ul>
				</p>
				<hr>
				<h2>Itsearviot</h2>
				<h3>Joni Laukka</h3>
				<p>TTMS0500 Jonin päiväkirja: http://student.labranet.jamk.fi/~H9031/ttms0500/paivakirja-ttms0500<br>
				Arvosana: 3<br>
Onnistumiset: Työ sisältää kaikki suunnitellut ominaisuudet ja toimii suunnitelman mukaisesti.<br>
Puutteet: Näkymien muuttaminen käyttäjävalinnoilla vähäistä.
				</p>
				
				<h3>Jaakko Pöyhönen</h3>
				<p>Arvosana: 1.5<br>
					Onnistumiset: Kirjautumis lomake. Adminin napit on normaalilta käyttäjältä piilossa.<br>
					Puutteet: Chat on melkein suoraan tuntiesimerkistä.</p>
            </article>
    </main>
<?php include_once("includes/footer.php"); ?>
</body>
