<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="styles/style.css" type="text/css" rel=stylesheet>
    <script src="scripts/adminScripts.js"></script> <!-- adminin scriptit -->
</head>

<body>
<?php include_once("includes/nav.html"); ?>
<main class="blog">
        <button name="new" onclick="newPost()">Uusi</button>
        <section id=newBlogPost class="postList">
            <article id="newPost">
				<input type=text id="postTitle" placeholder=Otsikko></input><br>
                <textarea id="postText" rows="5" cols="50" placeholder="Teksti tähän..."></textarea><br>
                <button id="add" onclick="addPost()">Add</button>
            </article>
        </section>
        <section class="postList">
				<?php
				//tulostaa jsonista kaikki blogimerkinnät lopusta alkuun
					try{
					$data = file_get_contents('databases/blog.json');
					$posts = json_decode($data, true);
					$posts = array_reverse($posts);
					$index = count($posts) - 1;
					
					foreach($posts as $post){
						echo "<article class='post'>
							<p class='date'>".$post['paivays']."</p>
							<h1 class='blogHeader'>".$post['otsikko']."</h1>
							<p>".$post['viesti']."</p>
							<hr>
							<p class='footer'>".$post['lahettaja']."</p>
							<button onclick='removePost(".$index.")'>X</buttton>
							</article>";
							$index--;
						}
					}
					catch(Exception $e){
						echo "json error";
					}
				?>
        </section>
    </main>
<?php include_once("includes/footer.php"); ?>
</body>

<?php

?>