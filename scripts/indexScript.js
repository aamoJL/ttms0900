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

// Päivittää soittolistan 5000ms välein
$(document).ready(function(){
      refreshTable();
    });

function refreshTable(){
	$('#playlist').load('includes/getPlaylist.php', function(){
	   setTimeout(refreshTable, 5000);
	});
}
