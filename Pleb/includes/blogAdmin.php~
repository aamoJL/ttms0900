<?php
session_start();
/*
blog.php - merkintöjen poisto ja lisäys
*/
//blog.php - Lisää merkinnän blog.json:iin lomakkeelta
if($_SESSION["user_name"] == "admin") {
	if(isset($_POST['add'])){
		try{
		if(isset($_POST['viesti']) && isset($_POST['otsikko'])){
			if($_POST['viesti'] == "" || $_POST['otsikko'] == ""){
				echo "<script type='text/javascript'>alert('Tyhjiä');</script>";
			}
			else{
				$data = file_get_contents('/var/Databases/blog.json');
				$posts = json_decode($data, true);
				$paivays = date("d.m.Y");
				$imagename = "";
				if($_FILES['kuva']['name'] != ""){
					$imagename = date("Y-m-d--H-i-s");
				}
				$add = array(
					'paivays' => $paivays,
					'otsikko' => htmlspecialchars($_POST['otsikko']),
					'viesti' => htmlspecialchars($_POST['viesti']),
					'lahettaja' => "aamo",
					'kuva' => $imagename
				);
				$posts[] = $add;
				$final_data = json_encode($posts);
				if(file_put_contents('/var/Databases/blog.json', $final_data)){
					try{
					$uploadOk = 1;
					$uploaddir = "blog-imgs/";
					$uploadfile = $uploaddir . $_FILES['kuva']['name'];
					$filetype = pathinfo($uploadfile,PATHINFO_EXTENSION);
					//vain jpg ja png hyvaksytaan
					if($filetype != "jpg" && $filetype != "png"){
					$uploadOk = 0;
					}
					//lahetetaan kuva
					if($uploadOk == 1){
					$temp = explode(".", $_FILES['kuva']['name']);
					$newfilename = $imagename . '.' . end($temp);
					move_uploaded_file($_FILES['kuva']['tmp_name'],'blog-imgs/' . $newfilename);
					}
					echo "<script type='text/javascript'>alert('Lisätty');</script>";
					}
					catch(Exception $e){
						echo "<script type='text/javascript'>alert('kuva error');</script>";
					}
				
				}
			}
		}
		}
		catch(Exception $e){
			echo "<script type='text/javascript'>alert('error');</script>";
		}
	}
}
//blog.php - Poistaa merkinnän indexistä X.
if($_SESSION["user_name"] == "admin") {
	if(isset($_POST['remove'])){
		try{
		$data = file_get_contents('/var/Databases/blog.json');
		$posts = json_decode($data, true);
		$newposts = array();
		$postindex = $_POST['remove']; //index
		foreach($posts as $post){
			if($postindex == 0){
				if($post['kuva'] != ""){
					unlink("blog-imgs/".$post['kuva'].".png");
				}
			}
			else{
				$add = array(
				'paivays' => $post['paivays'],
				'otsikko' => $post['otsikko'],
				'viesti' => $post['viesti'],
				'lahettaja' => $post['lahettaja'],
				'kuva' => $post['kuva']
				);
				$newposts[] = $add;
			}
			$postindex--;
		}
		$final_data = json_encode($newposts);
		if(file_put_contents('/var/Databases/blog.json', $final_data)){
			echo "<script type='text/javascript'>alert('Poistettu');</script>";
		}
		else{
			echo "<script type='text/javascript'>alert('error');</script>";
		}
		}
		catch(Exception $e){
			echo "<script type='text/javascript'>alert('error');</script>";
		}
	}
}
?>
