const btn = document.querySelector("#submit");
const elPtag = document.querySelector(".paragraph");
let output = "";
/*
function loadUser() {
  let xhr = new XMLHttpRequest();
  let objects;

  xhr.open("GET", "user.json", true);

  xhr.onload = function () {
    if (this.status == 200) {
      objects = JSON.parse(this.responseText);
      output = `<h2>${objects.name}</h2>
      <ul>
        <li>Id: ${objects.id}</li>
        <li>Email: ${objects.email}</li>
      </ul>
      `;
      elPtag.innerHTML = output;
    } else if (this.status == 404) {
      elPtag.textContent = "Error 404, no lo lograste mi loco!";
    }
  };

  xhr.send();
}
*/

function loadUsers() {
  let xhr = new XMLHttpRequest();
  let data = " ";
  xhr.open("GET", "users.json", true);

  xhr.onload = function () {
    if (this.status == 200) {
      data = JSON.parse(this.responseText);
      for (var i in data) {
        output += `
          <h2>${data[i].name}</h2>
            <ul>
              <li>Id: ${data[i].id}</li>
              <li>Email: ${data[i].email}</li>
            </ul><br>
        `;
      }
      elPtag.innerHTML = output;
    } else if (this.status == 404) {
      elPtag.textContent = "No lo lograste bebe";
    }
  };
  xhr.send();
}

btn.addEventListener("click", loadUsers);
