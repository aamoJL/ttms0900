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
