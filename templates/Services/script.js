
document.addEventListener("DOMContentLoaded", function() {
  const button1 = document.getElementById("button1");
  const button2 = document.getElementById("button2");
  const section1 = document.getElementById("section1");
  const section2 = document.getElementById("section2");

  button1.addEventListener("click", function() {
    section1.scrollIntoView({ behavior: "smooth" });
  });

  button2.addEventListener("click", function() {
    section2.scrollIntoView({ behavior: "smooth" });
  });
});