<?php

/*
Lisää blogimerkinnän json-tiedostoon blog.json
*/

try{
	if(isset($_POST['viesti']) && isset($_POST['otsikko'])){
		$data = file_get_contents('../databases/blog.json');
		$posts = json_decode($data, true);
		$paivays = date("d.m.Y");
		$add = array(
			'paivays' => $paivays,
			'otsikko' => htmlspecialchars($_POST['otsikko']),
			'viesti' => htmlspecialchars($_POST['viesti']),
			'lahettaja' => "aamo"
		);
		$posts[] = $add;
		$final_data = json_encode($posts);
		if(file_put_contents('../databases/blog.json', $final_data)){
			echo "added";
		}
		else{
			echo "add error";
		}
	}
	else {
		echo "viesti tai otsikko puuttuu";
	}
}
catch(Exception $e){
	echo "database error";
}
?>