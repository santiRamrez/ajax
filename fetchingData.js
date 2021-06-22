const btn = document.querySelector("#submit");
const elPtag = document.querySelector(".paragraph");
let output;

function loadUser() {
  let xhr = new XMLHttpRequest();

  xhr.open("GET", "users.json", true);

  xhr.onload = function () {
    let objects;

    if (this.status == 200) {
      output = JSON.parse(this.responseText);
      let testing = typeof output;
      console.log(testing);
    } else if (this.status == 404) {
      elPtag.textContent = "Error 404, no lo lograste mi loco!";
    }
  };

  xhr.send();
}

btn.addEventListener("click", loadUser);
