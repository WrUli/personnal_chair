// Mini game : 2char, push start = les deux ont un numéro entre 1 et 6 et on cherche qui à gagner
// const minBtn = document.getElementById("minBtn");
// const showChrono = document.getElementById("showChrono");
// let nombre = 3;

// minBtn.addEventListener("click", chrono);
// function chrono() {
//   showChrono.innerHTML = nombre;
//   nombre = nombre - 1;
//   if (nombre >= 0){
//     setTimeout(chrono, 1000)
//   } else {
//     showChrono.innerHTML = "FIGHT!";
//     calcBattle()
//   }
// }

// let scoreA = 0;
// let scoreB = 0;
// function calcBattle(){
//     let a = Math.floor(Math.random() * 10);
//     let b = Math.floor(Math.random() * 10);
//     console.log(a)
//     console.log(b)
//     if (a < b) {
//      //Alors... 
//         scoreB++ 
//         document.querySelector("#scoreBoxTwo").innerHTML = scoreB
//         console.log("C'est " + b + " qui a gagné ! ")
//         document.getElementById("txtBoxTwo").innerHTML = b + " . Je vais te briser les os."
//         document.getElementById("txtBoxOne").innerHTML = a + " ... oh nooon... "
//         //Sinon...
//     } else if (a == b){
//         //Alors...
//         console.log(a + " est égal à " + b)
//         document.getElementById("txtBoxTwo").innerHTML = "Oh noon..."
//         document.getElementById("txtBoxOne").innerHTML = "Aie aie ouille"
//     }else {
//         scoreA++ 
//         document.querySelector("#scoreBoxOne").innerHTML = scoreA
//         console.log(a + " est le grand gagnant ")
//         document.getElementById("txtBoxTwo").innerHTML = b + " ..."
//         document.getElementById("txtBoxOne").innerHTML = a + " tiens tiens tiens... "
//     }

//     if (scoreB + scoreA >= 5) {
//     document.getElementById("txtScore").innerHTML = "Le score est de " + scoreA + " à " + scoreB + ", plus qu'à relancer une nouvelle petite partie !";
//     }
// }

// const btnRefr = document.getElementById("btnRefresh");
// btnRefr.addEventListener("click", refreshAll);
// function refreshAll (){
//     nombre = 3;
//     scoreA = 0;
//     scoreB = 0;
//     document.querySelector("#scoreBoxOne").innerHTML = "";
//     document.querySelector("#scoreBoxTwo").innerHTML = "";
//     document.getElementById("txtBoxOne").innerHTML = "";
//     document.getElementById("txtBoxTwo").innerHTML = "";
//     showChrono.innerHTML = "";
//     document.getElementById("txtScore").innerHTML = "";

// }

// déclaration "itération" qui vaut X 
// let i = 3;
// // pour... la variable j qui commence à 0 -> si j inférieur à i -> j gagne +1
// for (let j = 0; j <= i; j++){
//     // alors -> woaw dans le console log le nb de fois de la boucle=
//     console.log("woaw");
// }

const showItem = document.querySelector(".showItem");
//Faire un console log de bmw
let cars = [
    "fiat", 
    "renaut", 
    "bmw", 
    "mercedes"
    ];
let i;
for(i = 0; i < cars.length; i++){
    console.log(cars[i]);
}

let btns = document.querySelectorAll(".btnFiat");
let modals = document.querySelectorAll(".modal");
let cut = document.querySelector(".articleContainer");

for (let i = 0; i < btns.length; i++) {
    modals[i].classList.add("displayNone")
    btns[i].addEventListener("click", () => {
        modals[i].classList.toggle("displayNone")
    });    
}


const firstname = sessionStorage.getItem("firstname01");
const lastname = sessionStorage.getItem("lastname01");
const logInName = document.querySelector("#logInName");
document.querySelector("#logInName").innerHTML="Bienvenue " + firstname + " " + lastname;

































// document.addEventListener("Click", () =>{ 
//         modals[0, 1, 2, 3, 4].classList.remove("displayNone")
//     })
 





//Créer une seconde page "login" avec un formulaire de co
//En JS récupérer les datas et vérifier si ça match avec l'un des users
//Si ça match : rediriger (methode qu'il va falloir trouver) plus haut avec message de bienvenue
//Sinon renvoyer message d'erreur sur la page login
//Utilisation des values
//Utilisation des injections dans les variables










// for (let ligne of users) {
//     console.log(ligne)
// }


// let chiffre1 = prompt("Entrez votre chiffre")
// const notes = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ,10]

// for = itérer un certain nombre de fois 
// for in = itérer sur les clés d'un objets ou tableau
// for of = parcourir les éléments etc

// if (chiffre1>10 || chiffre1<0) {
//     console.log("Votre chiffre n'est pas inférieur à 10")
// } else {
//     for (let i = chiffre1; i>= 0; i--){
//         console.log(i)}
// }



// let guess = 8
// let chiffre
// while (chiffre !== guess) {
//     chiffre = prompt("Votre chiffre")*1
//     if (chiffre !== guess) {
//         console.log("Dommage c'est pas ça")
//     }
// }
// console.log("Bien ouej l'ami")



// let ligne = 9; //nombre de lignes au total

// for (let nbBase = 1; nbBase <= ligne; nbBase++) {
//     for (let nbIncr = 1; nbIncr <= nbBase; nbIncr++) {
//         console.log(nbIncr)
//     }
// }