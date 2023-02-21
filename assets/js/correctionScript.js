let users = [
    ["Atif", "Zourgani", "DevDu33!", "atif@gmail.com"],
    ["Romain", "Cardot", "Twitch69666", "romain@gmail.com"],
    ["Fabrice", "Ho A Chuck", "GatchaPlayer24", "fabrice@gmail.com"],
    ["Matthys", "Schaffner", "Carbo24", "matthys@gmail.com"],
    ["Sébastien", "Thomas", "SebLaFrite24", "sébastien@gmail.com"],
    ["Jérôme", "Geoffroy", "LesIlluminatisNousRegardent", "jérôme@gmail.com"],
]

// let user = [
//     "tata", "totote", "totote@gmail.com", "fhes", "super-admin"
// ];



let showUser = document.getElementById("showUsers");

function showUsers () {
    // console.log(trElement);
    // for ( let i = 0 ; i < user.length ; i++) {  
    //     let tdElement =document.createElement("td");
    //     trElement.appendChild(tdElement);
    //     let tdContent = document.createTextNode(user[i]);
    //     tdElement.appendChild(text)
    //     // console.log("tdElement");
    // }

    //ICI "k" est le nombre de tour de boucle, c'est une itération
    //e correspond aux éléments du tableau tableau dans ce cas précis
    //Donc =>
    users.forEach((e, k) => {
        //La variable va créer un "tr" à chaque itération du forEach
        let trElement = document.createElement("tr");
        //Second boucle, qui va parcourir chaque tr crée avant
        for ( i = 0; i < e.length; i++) {
            //Création d'une variable qui va créer un "td", colomne du tableau
            let tdElement = document.createElement("td");
            //le "td" deviendra à chaque fois un enfant de la "tr"
            trElement.appendChild(tdElement);
            // le td crée juste au dessus gagnera le texte qui lui est associé ; k rentre dans la ligne, le i récupère les valeurs de la première ligne
            let tdContent = document.createTextNode(users[k][i]);
            //le texte du "td" crée juste au dessus, deviendra l'élément enfant du "td" de base
            tdElement.appendChild(tdContent);
        }
        //les lignes "tr" qui ont été crée deviennent alors l'enfant de tableUsers qui est une table
        document.getElementById("tableUsers").appendChild(trElement);
    })
}
showUsers();

// => Création de lignes "tr" et de colomnes "td". 
// => "td" deviennent des enfants de "tr" dans l'architecture
// => "tr" deviennent des enfants de table dans l'architecture 
// ====> l'architecture est faite au complet <====

// => la première boucle est là pour créer les "tr"
// => Et à chaque fois une nouvelle boucle se lance pour récupérer les donners du tableau
// => "k", qui sert ici d'indicateur de lignes dans la boucle, et "i" qui sert à récupérer les valeurs de la ligne "k" déclarée juste avant
// => C'est le createTextNode(users[k][i]) déclaré dans la var "tdContent" qui récupère le texte, donc
// => Injection du texte dans chaque colomne crée par le "i" sur les lignes "k"
// => Quand la récupération complète d'une ligne "k" est faite, ça passe à la suivante, etc etc