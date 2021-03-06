<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="styles/style.css" type="text/css" rel=stylesheet>
</head>

<body>
<?php include_once("includes/nav.html"); ?>
<main class="blog">
            <article class="dokumentti">
                <h1 class="dokumenttiotsikko">Harjoitustyö: Pleblist</h1>
				<h2>Kurssi: TTMS0900
				<h3>Tekijät: Joni Laukka, Jaakko Pöyhönen - 6.12.2016
                <hr></hr>
				<p>Lähdekoodit: Linkki tähän<br>
				Zip-paketti: Linkki tähän
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
				Palvelin liittää kaikkiin sivuihin headerin, navin ja footerin includes/ -kansiosta.
				<h4>footer.php toiminta</h4>
					<ul class=dokumentti>
						<li>Tulostaa palvelimen ajan.</li>
					</ul>
				<h4>nav.php toiminta</h4>
					<ul class=dokumentti>
						<li>Tulostaa kuvan sekä navigointilinkit sivulle.</li>
					</ul>
				<h3>blog.php</h3>
				Palvelin liittää sivuun includes/blogAdmin.php:n adminin lomakkeita varten
				<h4>blogAdmin.php toiminta</h4>
				<ul class=dokumentti>
					<li>Painettaessa "add"-nappia uuden merkinnän lomakkeesta, palvelin lisää databases/blog.json -tietokantaan uuden merkinnän tiedot (otsikko, päivä, viesti, lähettäjä, mahdollinen kuva).</li>
						<ul class=dokumentti>
						<li>palvelin tarkistaa onko lomakkeen kaikki kohdat täytetty, jos ei ole niin palvelin ilmoittaa "tyhjiä".</li>
						<li>palvelin muuttaa otsikon ja viestin rakennetta php:n htmlspecialchars-funktiolla.</li>
						<li>palvelin hyväksyy kuvan muodoksi vain jpg ja png.</li>
						</ul>
					<li>Painettaessa "X"-nappia merkinnästä, palvelin tekee databases/blog.json -tietokannasta uuden tietokannan, johon lisätään kaikki muut vanhat merkinnät, mutta ei poistettavaa merkintää.</li>
							<ul class=dokumentti>
							<li>jos poistettavalla merkinnällä on kuva, poistetaan kuvatiedosto blog-imgs/ -kansiosta.</li>
							</ul>
					<li>Palvelin tulostaa databases/blog.json -json tietokannasta blogimerkinnät, ensimmäinen merkintä ylimmäisenä.</li>
						<ul class=dokumentti>
						<li>"X"-nappiin vaihdetaan arvoksi blogimerkinnän indeksinumero.</li>
						<li>jos merkinnällä on kuva, kuva lisätään nimen perusteella blog-imgs/ -kansiosta</li>
						</ul>
				</ul>
				<h3>songlist.php</h3>
				Sivu lataa includes/getQueue.php:stä ja includes/getPlayed.php:stä soittolistat.
				<h4>getQueue.php toiminta</h4>
				<ul class=dokumentti>
					<li>Palvelin tulostaa taulun tietokannan tiedoista, joissa tila on 'jono'.</li>
				</ul>
				<h4>getPlayed.php toiminta</h4>
				<ul class=dokumentti>
					<li>Palvelin tulostaa taulun tietokannan tiedoista, joissa tila on 'soitettu'.</li>
				</ul><br>
				Painettaessa "X"-nappia videosta, sivu lähettää palvelimen includes/removeVideo.php:lle videon id:n.
				<h4>removeVideo.php toiminta</h4>
				<ul class=dokumentti>
					<li>palvelin vaihtaa databases/testdb.db -tietokannasta annetun id:n tilaksi 'poistettu'.</li>
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
				<p>
				Arvosana: 4<br>
				Onnistumiset: Työ sisältää suunnitellut ominaisuudet ja toimii kuten pitääkin.<br>
				Puutteet: -
				</p>
				
				<h3>Jaakko Pöyhönen</h3>
				<p>Jaakon arvio</p>
            </article>
    </main>
<?php include_once("includes/footer.php"); ?>
</body>

<?php
function printTable(){
	//tietokannasta tiedot
}
?>