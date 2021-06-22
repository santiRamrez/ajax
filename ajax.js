const btn = document.querySelector("#submit");

function loadText() {
  //create XHR Object
  let xhr = new XMLHttpRequest();
  //OPEN -> type, url, async
  xhr.open("GET", "sample.txt", true);

  xhr.onload = function () {
    if (this.status == 200) {
      console.log(this.responseText);
    }
  };

  xhr.send();
}

btn.addEventListener("click", loadText);
