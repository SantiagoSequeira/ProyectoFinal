function answer(id) {
  var x = document.getElementById(id);
  if (x.style.display == "none") {
    x.style.display = "flex";
  } else {
    x.style.display = "none";
  }
}
function show() {
  var x = document.getElementById("menu");
  var y = document.getElementById("hamb");
  if (x.style.display === "none") {
    x.style.display = "flex";
  } else {
    x.style.display = "none";
  }
}
