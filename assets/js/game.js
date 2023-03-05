document.addEventListener("DOMContentLoaded", function () {

    let money = 0,
    clickUpCost = 10,
    clickLevel = 1,
    autoUpCost = 25,
    autoLevel = 0,
    multUpCost = 50,
    multiplierLevel = 1,
    moneyBtn,
    moneyDisp,
    clickStats,
    clickUpgrade,
    autoStats,
    autoUpgrade,
    moneyPerSecond,
    autoMultUpgrade,
    autoMultStats;
    // Récupérer le score
    let user = localStorage.getItem("user");

    // maj locale du gain par seconde
    let mps = setInterval(function() {
        money = money + (autoLevel * multiplierLevel)
        moneyDisp.innerHTML = "$" + money;
        localStorage.setItem("money", money);
        }, 1000);
    
    moneyBtn = document.getElementById("moneyButton"),
    moneyDisp = document.getElementById("moneyDisplay"),
    clickStats = document.getElementById("clickUpgradeStats"),
    clickUpgrade = document.getElementById("upgrdClick"),
    autoStats = document.getElementById("autoUpgradeStats"),
    autoUpgrade = document.getElementById("upgrdAuto"),
    moneyPerSecond = document.getElementById("moneyPerSec"),
    autoMultUpgrade = document.getElementById("upgrdAutoAmt"),
    autoMultStats = document.getElementById("autoAmountUpgradeStats");


    // maj du gain par clic
    moneyBtn.onclick = function() {
        money = money + (clickLevel * 1); // Montant de base du click : 1$
        moneyDisp.innerHTML = "$" + money;
    }
    // click 
    clickUpgrade.onclick = function() {
        if (money >= clickUpCost) {
        clickLevel++;
        money = money - clickUpCost;
        clickUpCost = Math.ceil(clickUpCost / 5) + clickUpCost;
        moneyDisp.innerHTML = "$" + money;
        clickStats.innerHTML = "Coût : $ " + clickUpCost + "<br> Niveau " + clickLevel;

        clickStats.innerHTML = "Coût : $" + clickUpCost + "<br> Niveau " + clickLevel + "<br> Gain : $" + (clickLevel * 1) + " par clic"; // Montant gagné du click, en fonction du niveau
        localStorage.setItem("money", money);
        localStorage.setItem("clickLevel", clickLevel);
        localStorage.setItem("clickUpCost", clickUpCost);
        localStorage.setItem("clickStats", clickStats);

        fetchScoreData();
        user.save(money, clickLevel, clickUpCost, autoLevel, autoUpCost, multiplierLevel, multUpCost);
        }
    }
    
    autoUpgrade.onclick = function() {
        if (money >= autoUpCost) {
        autoLevel++;
        money = money - autoUpCost;
        autoUpCost = Math.ceil(autoUpCost / 5) + autoUpCost;
        moneyDisp.innerHTML = "$" + money;
        autoStats.innerHTML = "Coût : $" + autoUpCost + "<br> Niveau " + autoLevel;
        moneyPerSecond.innerHTML = "Tu gagnes $" + (autoLevel * multiplierLevel) + " par seconde";
        }
        localStorage.setItem("money", money);
        localStorage.setItem("autoLevel", autoLevel);
        localStorage.setItem("autoUpCost", autoUpCost);
        localStorage.setItem("autoStats", autoStats);

        fetchScoreData();
        user.save(money, clickLevel, clickUpCost, autoLevel, autoUpCost, multiplierLevel, multUpCost);
    }

    autoMultUpgrade.onclick = function() {
        if (money >= multUpCost) {
        multiplierLevel++;
        money = money - multUpCost;
        multUpCost = Math.ceil(multUpCost / 2) + multUpCost;
        moneyDisp.innerHTML = "$" + money;
        autoMultStats.innerHTML = "Coût : $" + multUpCost + "<br> Multiplieur x" + multiplierLevel;
        moneyPerSecond.innerHTML = "Tu gagnes $" + (autoLevel * multiplierLevel) + " par seconde";
        }
        localStorage.setItem("money", money);
        localStorage.setItem("multiplierLevel", multiplierLevel);
        localStorage.setItem("multUpCost", multUpCost);
        localStorage.setItem("autoMultStats", autoMultStats);
        
        fetchScoreData();
        user.save(money, clickLevel, clickUpCost, autoLevel, autoUpCost, multiplierLevel, multUpCost);
    }

    // Fonction pour récupérer les données du localStorage
    function getLocalStorage() {
        if (localStorage.getItem("money")) {
            money = parseInt(localStorage.getItem("money"));
            moneyDisp.innerHTML = "$" + money;
        }
        if (localStorage.getItem("clickUpCost")) {
            clickUpCost = parseInt(localStorage.getItem("clickUpCost"));
            clickStats.innerHTML = "Coût : $" + clickUpCost + "<br> Niveau " + clickLevel;
        }
        if (localStorage.getItem("clickLevel")) {
            clickLevel = parseInt(localStorage.getItem("clickLevel"));
            clickStats.innerHTML = "Coût : $" + clickUpCost + "<br> Niveau " + clickLevel;
        }
        if (localStorage.getItem("autoUpCost")) {
            autoUpCost = parseInt(localStorage.getItem("autoUpCost"));
            autoStats.innerHTML = "Coût : $" + autoUpCost + "<br> Niveau " + autoLevel;
        }
        if (localStorage.getItem("autoLevel")) {
            autoLevel = parseInt(localStorage.getItem("autoLevel"));
            autoStats.innerHTML = "Coût : $" + autoUpCost + "<br> Niveau " + autoLevel;
        }
        if (localStorage.getItem("multUpCost")) {
            multUpCost = parseInt(localStorage.getItem("multUpCost"));
            autoMultStats.innerHTML = "Coût : $" + multUpCost + "<br> Multiplieur x" + multiplierLevel;
        }
        if (localStorage.getItem("multiplierLevel")) {
            multiplierLevel = parseInt(localStorage.getItem("multiplierLevel"));
            autoMultStats.innerHTML = "Coût : $" + multUpCost + "<br> Multiplieur x" + multiplierLevel;
        }
    }
    // Récupérer les scores du serveur
    function fetchScoreData() {
        fetch('assets/php/get_score.php')
            .then(response => response.json())
            .then(scoreData => {
                // Update le score
                const scoreDisplay = document.getElementById('score-display');
                scoreDisplay.innerText = `Score: ${scoreData.score}`;
        
                // Affiche le popup
                const scorePopup = document.getElementById('score-popup');
                if (scorePopup.style.display !== 'block') {
                scorePopup.style.display = 'block';
                }
            })
            .catch(error => {
                console.error(error);
            });
    }
    
    // Sauvegarder le score dans la bdd
    function saveScore() {
        const formData = new FormData();
        formData.append('money', money);
        formData.append('clickLevel', clickLevel);
        formData.append('clickUpCost', clickUpCost);
        formData.append('autoLevel', autoLevel);
        formData.append('autoUpCost', autoUpCost);
        formData.append('multiplierLevel', multiplierLevel);
        formData.append('multUpCost', multUpCost);

        fetch('assets/php/save_score.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.error(error);
        });
    }
    // Récupérer le score du localStorage
    getLocalStorage();
    saveScore();

    document.getElementById('showScoreBtn').addEventListener('click', function() {
        fetchScoreData()
        // Récupérer le score et maj le popup
        getScore(); 
        document.getElementById('scorePopup').textContent = "Votre dernier score : " + scoreData;
        // Afficher le popup
        document.getElementById('scorePopup').style.display = "block";
    });

});