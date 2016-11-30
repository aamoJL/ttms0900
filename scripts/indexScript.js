/*
index.php soittolistan scriptit
*/


// Sulkee listan
function closeList() {
	document.getElementById("playlist").style.width = "0px";
	document.getElementById("playlist").style.overflow = "hidden";
	document.getElementById("playlistButton").innerHTML = "Open";
	document.getElementById("playlistButton").onclick = openList; //vaihtaa onclick-eventin
}
                
// Avaa listan
function openList() {
    document.getElementById("playlist").style.width = "auto";
    document.getElementById("playlist").style.overflow = "auto";
    document.getElementById("playlistButton").onclick = closeList;
    document.getElementById("playlistButton").innerHTML = "Close";
}

var video = "";

// Päivittää soittolistan 5000ms välein
$(document).ready(function(){
      refreshTable();
});

function refreshTable(){
	$('#playlist').load('includes/getPlaylist.php', function(){
	   setTimeout(refreshTable, 5000);
	});
}


//hakee tiedon soitettavasta videosta
function refreshVideo(){
	var http = new XMLHttpRequest();
	var url = "includes/getVideo.php";
	
	http.open("POST", url, true);

	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	http.onreadystatechange = function() {
		if(http.readyState == 4 && http.status == 200) {
			var playing = http.responseText;
			//console.log(playing);
			if(playing == video && playing != 'paused'){
				if(player.getPlayerState() != 1){
					//player.playVideo();
				}
			}
			else if(playing == 'paused'){
				video = paused;
				pauseVideo();
			}
			else{
				video = playing;
				changeVideo(video);
			}
		}
	}
	http.send();
	setTimeout(refreshVideo, 10000);
}
