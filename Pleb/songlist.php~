<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="styles/style.css" type="text/css" rel=stylesheet>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> <!-- jquery -->
	<script src="scripts/adminScripts.js"></script> <!-- Admin scriptit -->
	<script>
	//päivittää videolistat 10000ms välein
	$(document).ready(function(){
      refreshTable();
    });

	function refreshTable(){
	$('#queue').load('includes/getQueue.php', function(){
		setTimeout(refreshTable, 10000);
	$('#played').load('includes/getPlayed.php');
	});
}
	</script>
</head>

<body>
<?php include_once("includes/nav.php"); ?>
<main>
        <section class="queue" id="queue">
        </section>
        <section class="queue" id="played">
        </section>
    </main>
<?php include_once("includes/footer.php"); ?>
</body>