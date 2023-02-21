//Afficher users/utilisateurs sur une autre page de connexion
//Un bouton pour modifier les users (modifier le tableau quoi)

let users = [
    ["Atif", "Zourgani", "DevDu33!", "atif@gmail.com"],
    ["Romain", "Cardot", "Twitch69666", "romain@gmail.com"],
    ["Fabrice", "Ho A Chuck", "GatchaPlayer24", "fabrice@gmail.com"],
    ["Matthys", "Schaffner", "Carbo24", "matthys@gmail.com"],
    ["Sébastien", "Thomas", "SebLaFrite24", "sébastien@gmail.com"],
    ["Jérôme", "Geoffroy", "LesIlluminatisNousRegardent", "jérôme@gmail.com"],
]

// let supprTriche = document.querySelector("#supprTricheLastElement");
// supprTriche.addEventListener("click", clickSupprLast)
// function clickSupprLast() {
//     let dltLast = users.pop();
//     iciJeTriche.innerHTML = users.join("")  + dltLast ;
//     console.log(users)
// }

let btnTriche = document.querySelector("#btnTriche");
btnTriche.addEventListener("click", megaTriche)
let iciJeTriche = document.querySelector("#iciJeTriche");
function megaTriche () { 
    for (let user of users) {
       document.querySelector("#iciJeTriche").innerHTML += user + "<br>";
    }
    iciJeTriche.classList.toggle("displayNone");
}


let users2 = [
    {Prénoms: "Atif", Noms: "Zourgani", Mail: "atif@gmail.com", Boutons: "De"},
    {Prénoms: "Romain", Noms: "Cardot", Mail: "romain@gmail.com"},
    {Prénoms: "Fabrice", Noms: "HoAChuck", Mail: "fabrice@gmail.com"},
    {Prénoms: "Matthys", Noms: "Schaffner", Mail: "matthys@gmail.com"},
    {Prénoms: "Sébastien", Noms: "Thomas", Mail: "sébastien@gmail.com"},
];

function tableauAdminTtl(table, data) {
    let tabTitre = table.createTHead();
    let row = tabTitre.insertRow();
    for (let key of data) {
        let th = document.createElement("th");
        let text = document.createTextNode(key);
        th.appendChild(text);
        row.appendChild(th);
    }
}
function tableauAdmin(table, data) {
    for (let element of data) {
      let row = table.insertRow();
      for (key in element) {
        let cell = row.insertCell();
        let text = document.createTextNode(element[key]);
        cell.appendChild(text);
      }
    }
}
let table = document.querySelector("table");
let data = Object.keys(users2[0]);
tableauAdminTtl(table, data);
tableauAdmin(table, users2);

let supprTriche = document.querySelector("#supprTricheLastElement");
supprTriche.addEventListener("click", ()=> {
    let dltLast = users.pop();
    users.join("")  + dltLast ;
    console.log(users)
})  

// let deleterow = document.querySelector("#tabAd");
// deleterow.addEventListener()
// function deleterow() {
//     var table = document.getElementById(tabAd);
//     var rowCount = table.rows.length;
//     table.deleteRow(rowCount -1);
// }