document.body.setAttribute("class", "noscroll");
document.getElementById("preloader-overlay").style.display = "block";
document.getElementById("spinner").style.display = "block";


window.onload = function() {
    document.getElementById("header").style.visibility = "visible";
    document.getElementById("header").style.opacity = "1";
    document.getElementById("spinner").style.opacity = "0";
    document.getElementById("preloader-overlay").style.opacity = "0";
  document.getElementById("spinner").style.display = "none";
  document.getElementById("preloader-overlay").style.display = "none";

  document.body.className = document.body.className.replace(/\bnoscroll\b/,'');
}