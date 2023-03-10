var and = document.getElementById("decidean");
var adr = document.getElementById("appdetails");
var ndr = document.getElementById("newsdetails");
var ad = document.getElementById("appuploaddiv");
var nd = document.getElementById("newsuploaddiv");
var appradio = document.getElementById("app");
var ags = document.getElementById("appdropdown");
var gameradio = document.getElementById("game");
var ggs = document.getElementById("gamedropdown");

function div1show() {
  adr.addEventListener("click", (e) => {
    if (e.target.checked == true) {
      and.style.visibility = "hidden";
      ad.style.visibility = 'visible';
      nd.style.visibility = 'hidden';
    }
  })
}
div1show();

function div2show() {
  ndr.addEventListener("click", (e) => {
    if (e.target.checked == true) {
      and.style.visibility = "hidden";
      nd.style.visibility = "visible";
      ad.style.visibility = "hidden";
    }
  })
}
div2show();

function appgenreshow() {
  appradio.addEventListener("click", (e) => {
    if (e.target.checked == true) {
      ags.style.visibility = 'visible'
      ggs.style.visibility = 'hidden'
    } else {
      ags.style.visibility = 'hidden'
    }
  })

}
appgenreshow();

function gamegenreshow() {
  gameradio.addEventListener("click", (e) => {
    if (e.target.checked == true) {
      ggs.style.visibility = 'visible'
      ags.style.visibility = 'hidden'
    } else {
      ggs.style.visibility = 'hidden'
    }
  })
}
gamegenreshow();