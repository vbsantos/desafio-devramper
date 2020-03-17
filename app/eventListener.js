const getUrl = () => {
  const url = window.location.href;
  console.log("getUrl:" + url);
  return url;
};

const getUrlSufix = url => {
  const urlSeparated = url.split("?");
  const sufix = urlSeparated[1];
  return sufix ? sufix[sufix.length - 1] : "";
};

const changeUrl = (url, letter) => {
  const sufix = "?key=" + letter;
  const urlSeparated = url.split("?");
  const nextUrl = urlSeparated[0] + sufix;
  console.log("URL parts: " + urlSeparated);
  console.log("changeUrl from: " + url + "\nto: " + nextUrl);
  window.location.href = nextUrl;
};

const setPageDetails = (keyName, fromEvent) => {
  if (keyName !== "") {
    const letter = document.getElementById("letter1");
    const letterTitle = document.getElementById("letter2");
    letter.innerHTML = keyName.toUpperCase();
    letterTitle.innerHTML = "Diamante feito até a letra:";
    if (fromEvent) changeUrl(getUrl(), keyName);
  }
};

document.addEventListener("keydown", event => {
  const keyName = event.key;
  const keyValue = event.which;
  console.log("inputValue:", keyValue, "\nkeyName:", keyName);
  const onlyletters = keyValue >= 65 && keyValue <= 90;
  if (onlyletters) {
    setPageDetails(keyName, true);
  }
});

setPageDetails(getUrlSufix(getUrl()), false);
