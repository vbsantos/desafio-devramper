// Adds page event that reloads the page when a key (A-Z) is pressed
document.addEventListener("keydown", event => {
  const keyName = event.key;
  const keyValue = event.which;
  const isLetter = keyValue >= 65 && keyValue <= 90;
  if (isLetter) {
    changeUrl(keyName);
  }
});

// Change page info
const setPageInfo = keyName => {
  const keyPressed = keyName !== "";
  if (keyPressed) {
    const letter = document.getElementById("letter1");
    const letterTitle = document.getElementById("letter2");
    const letterTip = document.getElementById("letter3");
    letter.innerHTML = keyName.toUpperCase();
    letterTitle.innerHTML = "Diamante feito até a letra:";
    letterTip.innerHTML = "Tente outra letra!";
    changeUrl(keyName);
  }
};

// Get URL and Data passed through URL (HTTP GET METHOD)
const getUrlSeparated = () => {
  const url = window.location.href;
  return url.split("?");
};

// Get only the data passed through URL
const getUrlData = () => {
  const data = getUrlSeparated()[1];
  return data ? data[data.length - 1] : "";
};

// Set a new URL based on the key pressed
const changeUrl = letter => {
  const currentUrl = getUrlSeparated();
  const newLetter = "key=" + letter;
  const sameLetter = currentUrl[1] === newLetter;
  if (!sameLetter) {
    const nextUrl = currentUrl[0] + "?" + newLetter;
    window.location.href = nextUrl;
  }
};

// Run this function each time page renders
setPageInfo(getUrlData());
