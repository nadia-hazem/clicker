// Chargement du DOM
document.addEventListener("DOMContentLoaded", function () {

    /* console.clear() */

    let money = 0,
    clickUpCost = 10,
    clickLevel = 1,
    autoUpCost = 25,
    autoLevel = 0,
    multUpCost = 50,
    multiplierLevel = 1,
    moneyBtn = document.getElementById("moneyButton"),
    moneyDisp = document.getElementById("moneyDisplay"),
    clickStats = document.getElementById("clickUpgradeStats"),
    clickUpgrade = document.getElementById("upgrdClick"),
    autoStats = document.getElementById("autoUpgradeStats"),
    autoUpgrade = document.getElementById("upgrdAuto"),
    moneyPerSecond = document.getElementById("moneyPerSec"),
    autoMultUpgrade = document.getElementById("upgrdAutoAmt"),
    autoMultStats = document.getElementById("autoAmountUpgradeStats");

    let levelRow = document.getElementById("levelRow");
    let level1Img = document.getElementById("level1");
    let level2Img = document.getElementById("level2");
    let level3Img = document.getElementById("level3");
    let level4Img = document.getElementById("level4");
    
    // maj du gain par seconde
    let mps = setInterval(function() {
        money = money + (autoLevel * multiplierLevel)
        moneyDisp.innerHTML = money + "€";
        updateLevelRow();
        localStorage.setItem("money", money);
        }, 1000);
        console.log(mps);

    // maj du gain par clic
    moneyBtn.onclick = function() {
        money = money + (clickLevel * 1); // Montant de base du click : 1€
        moneyDisp.innerHTML = money + "€";
        updateLevelRow();
    }
    
    // click 
    clickUpgrade.onclick = function() {
        if (money >= clickUpCost) {
        clickLevel++;
        money = money - clickUpCost;
        clickUpCost = Math.ceil(clickUpCost / 5) + clickUpCost;
        moneyDisp.innerHTML = money + "€";
        updateLevelRow();
        clickStats.innerHTML = "Coût: " + clickUpCost + "€ <br> Niveau: " + clickLevel;

        clickStats.innerHTML = "Coût: " + clickUpCost + "€ <br> Niveau: " + clickLevel + "<br> Gain: " + (clickLevel * 1) + "€ par clic"; // Montant gagné du click, en fonction du niveau


        localStorage.setItem("money", money);
        localStorage.setItem("clickLevel", clickLevel);
        localStorage.setItem("clickUpCost", clickUpCost);
        }
    }
    
    autoUpgrade.onclick = function() {
        if (money >= autoUpCost) {
        autoLevel++;
        money = money - autoUpCost;
        autoUpCost = Math.ceil(autoUpCost / 5) + autoUpCost;
        moneyDisp.innerHTML = money + "€";
        updateLevelRow();
        autoStats.innerHTML = "Coût: " + autoUpCost + "€ <br> Niveau: " + autoLevel;
        moneyPerSecond.innerHTML = "Tu gagnes " + (autoLevel * multiplierLevel) + " € par seconde";
        }
        localStorage.setItem("money", money);
        localStorage.setItem("autoLevel", autoLevel);
        localStorage.setItem("autoUpCost", autoUpCost);
    }

    autoMultUpgrade.onclick = function() {
        if (money >= multUpCost) {
        multiplierLevel++;
        money = money - multUpCost;
        multUpCost = Math.ceil(multUpCost / 2) + multUpCost;
        moneyDisp.innerHTML = money + "€";
        updateLevelRow();
        autoMultStats.innerHTML = "Coût: " + multUpCost + "€ <br> Multiplieur: x" + multiplierLevel;
        moneyPerSecond.innerHTML = "Tu gagnes " + (autoLevel * multiplierLevel) + " € par seconde";
        }
        localStorage.setItem("money", money);
        localStorage.setItem("multiplierLevel", multiplierLevel);
        localStorage.setItem("multUpCost", multUpCost);
    }

    function updateLevelRow() {
        if (money >= 100) {
            level1Img.src = "level1-complete.png";
        }
        if (money >= 500) {
            level2Img.src = "level2-complete.png";
        }
        if (money >= 1000) {
            level3Img.src = "level3-complete.png";
        }
        if (money >= 5000) {
            level4Img.src = "level4-complete.png";
        }
    }
    
    // Fonction pour récupérer les données du localStorage
    function getLocalStorage() {
        if (localStorage.getItem("money")) {
            money = parseInt(localStorage.getItem("money"));
            moneyDisp.innerHTML = money + "€";
        }
        if (localStorage.getItem("clickUpCost")) {
            clickUpCost = parseInt(localStorage.getItem("clickUpCost"));
            clickStats.innerHTML = "Coût: " + clickUpCost + "€ <br> Niveau: " + clickLevel;
        }
        if (localStorage.getItem("clickLevel")) {
            clickLevel = parseInt(localStorage.getItem("clickLevel"));
            clickStats.innerHTML = "Coût: " + clickUpCost + "€ <br> Niveau: " + clickLevel;
        }
        if (localStorage.getItem("autoUpCost")) {
            autoUpCost = parseInt(localStorage.getItem("autoUpCost"));
            autoStats.innerHTML = "Coût: " + autoUpCost + "€ <br> Niveau: " + autoLevel;
        }
        if (localStorage.getItem("autoLevel")) {
            autoLevel = parseInt(localStorage.getItem("autoLevel"));
            autoStats.innerHTML = "Coût: " + autoUpCost + "€ <br> Niveau: " + autoLevel;
        }
        if (localStorage.getItem("multUpCost")) {
            multUpCost = parseInt(localStorage.getItem("multUpCost"));
            autoMultStats.innerHTML = "Coût: " + multUpCost + "€ <br> Multiplieur: x" + multiplierLevel;
        }
        if (localStorage.getItem("multiplierLevel")) {
            multiplierLevel = parseInt(localStorage.getItem("multiplierLevel"));
            autoMultStats.innerHTML = "Coût: " + multUpCost + "€ <br> Multiplieur: x" + multiplierLevel;
        }
    }
    getLocalStorage();
    
});