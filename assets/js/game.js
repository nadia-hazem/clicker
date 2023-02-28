// Chargement du DOM
document.addEventListener("DOMContentLoaded", function () {

    const shop = document.getElementById("shop");
    let compteur = document.getElementById("compteur");

    // Initialiser le compteur à 0
    let points = 0;
    compteur.innerHTML = points;

    // Récupérer les points depuis le localStorage s'ils existent
    if (localStorage.getItem("points")) {
        points = parseInt(localStorage.getItem("points"));
        compteur.innerHTML = points;
    }

    function incrementPoints(amount) {
        // Incrémente le compteur et les points
        points += amount;
        compteur.innerHTML = points;

        // Mettre à jour les points dans le localStorage
        localStorage.setItem("points", points);
    }

    function handleButtonClick() {
        // Incrémente les points de 1
        incrementPoints(1);
        
        // Mettre à jour l'état du bouton
        button.classList.toggle("active");
    }

    function handleBuyButtonClick(e) {
        if (e.target.classList.contains("buy")) {
            let item = e.target.parentElement;
            let gain = parseInt(item.querySelector(".gain").textContent);
            let cost = parseInt(item.querySelector(".cost").textContent);

            // Vérifier si l'utilisateur a suffisamment de points pour acheter l'article
            if (points >= cost) {
                // Soustraire le coût des points de l'utilisateur
                incrementPoints(-cost);

                // Ajouter le gain à l'incrément par clic
                incrementPoints(gain);

                // Mettre à jour l'affichage de tous les articles de la boutique
                let items = document.querySelectorAll(".shopItem");
                items.forEach(function (item) {
                    let currentGain = parseInt(item.querySelector(".gain").textContent);
                    let currentCost = parseInt(item.querySelector(".cost").textContent);
                    item.querySelector(".gain").textContent = currentGain + gain;
                    item.querySelector(".cost").textContent = currentCost + 1;
                });

                // Mettre à jour l'affichage de l'article acheté
                item.querySelector(".gain").textContent = gain * 2;
                item.querySelector(".cost").textContent = cost + 10;
            } else {
                alert("Vous n'avez pas assez de points pour acheter cet article.");
            }
        }
    }

    // Récupérer les éléments du DOM par leur ID
    let button = document.getElementById("btnClick");
    // Ajouter un écouteur d'événement au clic sur le bouton
    button.addEventListener("click", handleButtonClick);

    // Ajouter un écouteur d'événement à la boutique
    shop.addEventListener("click", handleBuyButtonClick);
});
