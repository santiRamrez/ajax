const btn = document.querySelector("#submit");
const elPtag = document.querySelector(".paragraph");
let output = "";

function loadUsers() {
  let xhr = new XMLHttpRequest();
  let data = " ";
  xhr.open("GET", "https://restcountries.eu/rest/v2/all", true);

  xhr.onload = function () {
    if (this.status == 200) {
      data = JSON.parse(this.responseText);
      for (var i in data) {
        if (data[i].name[0] == "V") {
          output += `
            <h2>${data[i].name}</h2>
            <p>${data[i].capital}</p><br>
          `;
        }
      }
      elPtag.innerHTML = output;
    } else if (this.status == 404) {
      elPtag.textContent = "No lo lograste bebe";
    }
  };
  xhr.send();
}

btn.addEventListener("click", loadUsers);
