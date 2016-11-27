<?php

/*
Poistaa blogimerkinnän json-tiedostosta blog.json
*/

try{
	if(isset($_POST['index'])){
		$data = file_get_contents('../databases/blog.json');
		$posts = json_decode($data, true);
		$newposts = array();
		$postindex = $_POST['index'];

		foreach($posts as $post){
			if($postindex == 0){
				
			}
			else{
				$add = array(
				'paivays' => $post['paivays'],
				'otsikko' => $post['otsikko'],
				'viesti' => $post['viesti'],
				'lahettaja' => $post['lahettaja']
				);
				$newposts[] = $add;
			}
			$postindex--;
		}
		$final_data = json_encode($newposts);
		if(file_put_contents('../databases/blog.json', $final_data)){
			echo "removed";
		}
		else{
			echo "remove error";
		}
	}
	else{
		echo "ei indexiä";
	}
}
catch(Exception $e){
	echo "database error";
}
?>