/*
Adminin käytössä olevat scriptit
*/

// index.php, songlist.php - Lähettää poistettavan videon tietokanta-ID:n removeVideo.php:lle
function removeVideo(id){
	var http = new XMLHttpRequest();
	var url = "includes/removeVideo.php";
	
	var params = "Id="+id;
	
	http.open("POST", url, true);

	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) {
			refreshTable();
			//alert(http.responseText);
		}
	}
	http.send(params);
}

// blog.php - Avaa lomakkeen uudelle blogiviestille
function newPost() {
    if(document.getElementById("newPost").style.display == "block"){
        document.getElementById("newPost").style.display = "none";
    }
    else {document.getElementById("newPost").style.display = "block";}
}




// index.php - Adminin videon vaihto scripti
function adminChangeVideo(id) {
	var http = new XMLHttpRequest();
	var url = "includes/changeVideo.php";
	var next = "play";
	
	if(id == 'skip'){next = 'skip';} //jos skipataan
	//else if(id == 'paused'){next = 'paused';}
	
	var params = "next="+next+"&videoid="+id;
	
	http.open("POST", url, true);

	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) {
			if(http.responseText == ""){
				alert("videon vaihto error");
			}
			else if(http.responseText == "paused"){
				video = 'paused';
			}
			else{
				changeVideo(http.responseText);
				video = http.responseText;
				//alert(http.responseText);
			}
		}
	}
	http.send(params);
}

