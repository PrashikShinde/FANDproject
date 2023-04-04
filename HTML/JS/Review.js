var ap = document.getElementById("Application");
var ns = document.getElementById("News");
var art = document.getElementById("appreviewtable");
var nrt = document.getElementById("newsreviewtable");
var sfr = document.getElementById("sfr");
function ant() {
    ap.addEventListener("click", (e) => {
        if (e.target.checked == true) {
            sfr.style.visibility = "hidden";
            art.style.visibility = 'visible';
            nrt.style.visibility = 'hidden';
            art.style.marginTop = '-7%';
        }
    })
}
function nnt() {
    ns.addEventListener("click", (e2) => {
        if (e2.target.checked == true) {
            sfr.style.visibility = "hidden";
            art.style.visibility = 'hidden';
            nrt.style.visibility = 'visible';
        }
    })
}
ant();
nnt();