/*
Adminin käytössä olevat scriptit
*/


// blog.php - Avaa lomakkeen uudelle blogiviestille
function newPost() {
    if(document.getElementById("newPost").style.display == "block"){
        document.getElementById("newPost").style.display = "none";
    }
    else {document.getElementById("newPost").style.display = "block";}
}

// index.php, songlist.php - Lähettää poistettavan videon tietokanta-ID:n removeVideo.php:lle
function removeVideo(id){
	var http = new XMLHttpRequest();
	var url = "removeVideo.php";
	
	var params = "Id="+id;
	
	http.open("POST", url, true);

	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) {
			alert(http.responseText);
		}
	}
	http.send(params);
}
		
