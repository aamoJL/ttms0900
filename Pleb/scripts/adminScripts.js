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
	var url = "includes/removeVideo.php";

	var params = "Id="+id;
	//params = params+"Session="+$_SESSION;
	
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

// blog.php - Lähettää uuden blogimerkinnän tiedot addBlogpost.php:lle
function addPost(){
	var http = new XMLHttpRequest();
	var url = "includes/addBlogpost.php";
	var message = encodeURIComponent(document.getElementById("postText").value);
	var title = encodeURIComponent(document.getElementById("postTitle").value);
	
	if(message == "" || title == ""){
		alert("tyhjia kohtia!");
		return;
	}
	
	var params = "viesti="+message+"&otsikko="+title;
	http.open("POST", url, true);
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) {
			//alert(http.responseText);
			location.reload();
		}
	}
	http.send(params);
	
	document.getElementById("postText").innerHTML = "";
	document.getElementById("postTitle").innerHTML = "";
}

// blog.php - lähettää poistettavan blogimerkinnän indexin removeBlogpost.php:lle
function removePost(index){
	var http = new XMLHttpRequest();
	var url = "includes/removeBlogpost.php";
	
	var params = "index="+index;
	
	http.open("POST", url, true);

	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) {
			//alert(http.responseText);
			location.reload();
		}
	}
	http.send(params);

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
