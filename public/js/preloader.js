// disable scrolling
document.body.setAttribute("class", "noscroll");
// display the preloader white overlay and spinner
document.getElementById("preloader-overlay").style.display = "block";
document.getElementById("spinner").style.display = "block";

window.onload = function () {
  // make header visible; on default, it is hidden
  document.getElementById("header").style.visibility = "visible";
  document.getElementById("header").style.opacity = "1";
  // hide the spinner and overlay
  document.getElementById("spinner").style.opacity = "0";
  document.getElementById("preloader-overlay").style.opacity = "0";
  document.getElementById("spinner").style.display = "none";
  document.getElementById("preloader-overlay").style.display = "none";
  // enable scrolling again
  document.body.className = document.body.className.replace(/\bnoscroll\b/, '');
}