//Créer une seconde page "login" avec un formulaire de co
//En JS récupérer les datas et vérifier si ça match avec l'un des users
//Si ça match : rediriger (methode qu'il va falloir trouver) plus haut avec message de bienvenue
//Sinon renvoyer message d'erreur sur la page login
//Utilisation des values
//Utilisation des injections dans les variables

//Afficher users/utilisateurs sur une autre page de connexion
//Un bouton pour modifier les users (modifier le tableau quoi)


let users = [
    ["Atif", "Zourgani", "DevDu33!", "atif@gmail.com"],
    ["Romain", "Cardot", "Twitch69666", "romain@gmail.com"],
    ["Fabrice", "Ho A Chuck", "GatchaPlayer24", "Fabrice@gmail.com"],
    ["Matthys", "Schaffner", "Carbo24", "Matthys@gmail.com"],
    ["Sébastien", "Thomas", "SebLaFrite24", "Sébastien@gmail.com"],
    ["Jérôme", "Geoffroy", "LesIlluminatisNousRegardent", "Jérôme@gmail.com"],
]
console.log(users)
sessionStorage.setItem("userAdmin", users);
//1ère étape : Faire en sorte que l'input mail tombe bien sur la bonne row du tableau
let email = document.querySelector("#emailInput");
let pass = document.querySelector("#passInput");
let btnLogIn = document.querySelector("#btnLogIn");
//2nd étape : Faire en sorte de renvoyer un message d'erreur si jamais on se trompe dans nos valeurs
let wrongOrNotLogIn = document.querySelector("#wrongOrNotLogIn");
//3ème étape : Renvoyer un message savoir si c'est bien log in ou pas
let welcomeOrNotWelcome = document.querySelector("#welcomeOrNotWelcome");
// Vérif de l'email & MDP au mouseover pour commencer


// btnLogIn.addEventListener("click", validationEmail);
// function validationEmail() {
//     const validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
//         if (email.value.match(validRegex)) {
//             return true; 
//         } else {
//             alert("Email non valide");
//             return false;
//         }
// }
//8 lettres dans le password, avec au moins 1 symbole, 1 chiffre et une maj + 1 min 
// btnLogIn.addEventListener("click", validationPassword);
// function validationPassword(){
//     const validPassword = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
//     if (pass.value.match(validPassword)) {
//         return true;
//     } else {
//         alert("Password non valide");
//         return false;
//     }
// }
 
btnLogIn.addEventListener("click", verifMailAndPass);
function verifMailAndPass(){
    for (let i=0; i<users.length; i++){
        if (email.value==users[i][3]){
            console.log("mail-good");
            if (pass.value==users[i][2]){
                let firstname = users[i][0];
                let lastname = users [i][1];
                sessionStorage.setItem("firstname01", firstname);
                sessionStorage.setItem("lastname01", lastname);
                window.location.href = "index.html"
            
            }else {
            console.log("E-mail ou mot de passe invalide");
            alert('totoè')
            wrongOrNotLogIn.classList.toggle("displayNone");
        }
        }
    }
}
  
// function changingPage() {
//     window.location.href = "index.html"
//     setTimeout()
// }
// .index.html?username=`$(users[i][0])`


