// fonction pour changer le style du bouton burger
function burgerSwitch(nav) {
    if (nav.className == "open") {
        nav.className = "close";
    } else {
        nav.className = "open";
    }
    
}

// Chargement du DOM

document.addEventListener("DOMContentLoaded", function () {
    
    let title = document.title;
    // Fonction pour highlighter l'onglet actif
    function onglet() {
        if (title == "Accueil") {
            let li = document.querySelector("#accueil");
            li.style.backgroundColor = "#ccc";
        } else if (title == "Game") {
            let li = document.querySelector("#game");
            li.style.backgroundColor = "#ccc";
        } else if (title == "Profil") {
            console.log(title);
            let li = document.querySelector("#profil");
            li.style.backgroundColor = "#ccc";
        } else if (title == "Connexion") {
            let li = document.querySelector("#connexion");
            li.style.backgroundColor = "#ccc";
        } else if (title == "Inscription") {
            let li = document.querySelector("#inscription");
            li.style.backgroundColor = "#ccc";
        } 
    }
    onglet();

});