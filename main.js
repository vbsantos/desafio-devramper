// Changes page after setted time
const changePage = (newPage, time) => {
  setTimeout(() => {
    location.replace(newPage);
  }, time);
};

// Fade Out Text
const fadeOut = () => {
  const text = document.getElementById("text");
  text.id = "fadeout";
};

// After 1.9s goes to the app directory
changePage("./app", 1900);

// Start fadeout effect
fadeOut();
