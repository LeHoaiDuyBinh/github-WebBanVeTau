//Scroll chuột hiển thị button
var backToTopButton = document.querySelector("#back-to-top-btn");

window.addEventListener("scroll", function() {
  if (window.pageYOffset > 0) {
    backToTopButton.style.display = "block";
  } else {
    backToTopButton.style.display = "none";
  }
});

backToTopButton.addEventListener("click", function() {
  window.scrollTo(0, 0);
});