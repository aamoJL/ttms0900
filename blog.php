<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="styles/style.css" type="text/css" rel=stylesheet>
    <script src="scripts/adminScripts.js"></script> <!-- adminin scriptit -->
</head>

<?php
include_once("includes/blogAdmin.php");
?>

<body>
<?php include_once("includes/nav.html"); ?>
<main class="blog">
        <button name="new" onclick="newPost()">Uusi</button>
        <section id=newBlogPost class="postList">
            <article id="newPost">
				<form enctype="multipart/form-data" method=post action=<?php echo $_SERVER['PHP_SELF']; ?>>
				<input name=otsikko type=text id="postTitle" placeholder=Otsikko></input><br>
                <textarea name=viesti id="postText" rows="5" cols="50" placeholder="Teksti tähän..."></textarea><br>
                <input name="kuva" type="file"><br>
				<button name="add">Add</button>
				</form>
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
					$action = $_SERVER['PHP_SELF'];
					
					foreach($posts as $post){
						echo "<form action=".$action." method=post>
							<article class='post'>
							<p class='date'>".$post['paivays']."</p>";
							if($post['kuva'] != ""){
								echo "<img class=imgBlog src='blog-imgs/".$post['kuva']."' alt=''></img>";
							}
							echo "<h1 class='blogHeader'>".$post['otsikko']."</h1>
							<p>".$post['viesti']."</p>
							<hr>
							<p class='footer'>".$post['lahettaja']."</p>
							<button name='remove' value='".$index."'>X</buttton>
							</article>
							</form>";
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