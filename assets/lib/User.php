<?php
// Path: assets\lib\User.php
require_once 'DbConnect.php';

class User
{
    private $id;
    public $login;
    private $password;
    private $bdd;

    public function __construct(DbConnect $db)
    {
        $this->bdd = $db->getBdd();

        if (isset($_SESSION['user'])) {
            $this->id = $_SESSION['user']['id'];
            $this->login = $_SESSION['user']['login'];
            $this->password = $_SESSION['user']['password'];
        }
    }

    // Récupérer la connexion à la base de données
    public function getBdd() {
        return $this->bdd;
    }

    // Enregistrer un nouvel utilisateur
    public function register($login, $password)
    {   
        // special characters
        $login = htmlspecialchars($login);
        $password = htmlspecialchars($password);
        // hash password
        $password = password_hash($password, PASSWORD_DEFAULT);
                
        $register = "INSERT INTO utilisateurs (login, password) VALUES
        (:login, :password)";
        // préparation de la requête             
        $insert = $this->bdd->prepare($register);
        // exécution de la requête avec liaison des paramètres
        $insert->execute(array(
            ':login' => $login,
            ':password' => $password,
        ));
        echo "Inscription réussie !";
    }

    // Connexion
    public function connect($login, $password) 
    {
        // Récupérer le login
        $request = "SELECT * FROM utilisateurs WHERE login = :login";
        // préparation de la requête
        $select = $this->bdd->prepare($request);

        // special characters
        $login = trim(htmlspecialchars($login));
        $password = trim(htmlspecialchars($password));

        // exécution de la requête avec liaison des paramètres
        $select->execute(array(
            ':login' => $login,
        ));
        // récupération des résultats
        $result = $select->fetch(PDO::FETCH_ASSOC);
        // verification password 
        if (password_verify($password, $result['password'])) {
            $_SESSION['user']= [
                'id' => $result['id'],
                'login' => $result['login'],
                'password' => $result['password']
            ]; 
            echo "Connexion réussie !";     
        }
        else {
            echo "mot de passe incorrect !";
        }
        
    }

    // Vérifier si l'utilisateur est connecté
    public function isConnected()
    {
        if($this->id != null && $this->login != null && $this->password != null) {
            return true;
        }
        else {
            return false;
        }
    }

    // Déconnexion
    public function disconnect()
    {  
        if($this->isConnected()) 
            {
            // fermeture de la connexion
            echo "déconnexion réussie";
            session_destroy();
            }
            else {
                echo "Vous n'êtes pas connecté(e) !";
            }
    }

    // Supprimer le compte
    public function delete()
    {   
        if($this->isConnected()) 
        {   // requête de suppression
            $delete = "DELETE FROM utilisateurs WHERE id = :id ";
            // préparation de la requête
            $delete = $this->bdd->prepare($delete);
            // exécution de la requête avec liaison des paramètres
            $delete->execute(array(
                ':id' => $this->id
            ));
            // récupération des résultats
            $result = $delete->fetchAll();
            // vérification de la suppression
            if ($result == TRUE) {
                echo "Utilisateur supprimé !"; 
                session_destroy();
            }
            else{
                echo "Erreur lors de la suppression de l'utilisateur !";
            }
        }
        else {
            echo "Vous devez être connecté pour supprimer votre compte !";
        }
        // fermeture de la connexion
        $this->bdd = null; 
    }

    // Récupérer toutes les infos du user
    public function getAllInfos()
    {
        if($this->isConnected()) 
        {   ?>
            <table border="1" style="border-collapse: collapse;">
                <thead>
                    <tr>
                        <th>id</td>
                        <th>login</td>
                        <th>password</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th><?php echo $this->id; ?></td>
                        <td><?php echo $this->login; ?></td>
                        <td><?php echo $this->password; ?></td>
                    </tr>
                </tbody>
            </table>

            <?php
            /* echo "login : " . $this->login . "<br>";
            echo "password : " . $this->password . "<br>"; */
        }
        else {
            echo "Vous devez être connecté(e) pour voir vos informations !";
        
        }

    }

    // sauvegarder la partie
    public function save($money, $clickUpCost, $clickLevel, $autoUpCost, $autoLevel, $multUpCost, $multiplierLevel)
    {           
        // htmlspecialchars pour les paramètres
        $money = htmlspecialchars($money);
        $clickUpCost = htmlspecialchars($clickUpCost);
        $clickLevel = htmlspecialchars($clickLevel);
        $autoUpCost = htmlspecialchars($autoUpCost);
        $autoLevel = htmlspecialchars($autoLevel);
        $multUpCost = htmlspecialchars($multUpCost);
        $multiplierLevel = htmlspecialchars($multiplierLevel);

        $requete = "UPDATE scores SET money = :money, clickUpCost = :clickUpCost, clickLevel = :clickLevel, autoUpCost = :autoUpCost, autoLevel = :autoLevel, multUpCost = :multUpCost, multiplierLevel = :multiplierLevel WHERE user_id = :id";
        
        // préparation de la requête
        $update = $this->bdd->prepare($requete);

        // exécution de la requête avec liaison des paramètres
        $update->execute(array(
            ':money' => $money,
            ':clickUpCost' => $clickUpCost,
            ':clickLevel' => $clickLevel,
            ':autoUpCost' => $autoUpCost,
            ':autoLevel' => $autoLevel,
            ':multUpCost' => $multUpCost,
            ':multiplierLevel' => $multiplierLevel,
            ':id' => $this->id,
        ));
        
        // fermer la connexion
        $this->bdd = null;

        echo "Sauvegarde réussie"; // sauvegarde réussie
    }

        // récupérer les données de score
        public function getScore() {
            /* $requete = "SELECT * FROM scores WHERE user_id = :id"; */
            $requete = "SELECT money, clickUpCost, clickLevel, autoUpCost, autoLevel, multUpCost, multiplierLevel FROM scores WHERE user_id = :id";
            $select = $this->bdd->prepare($requete);
            $select->execute(array(
                ':id' => $this->id,
            ));
            $result = $select->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        // Récupérer le login
        public function getLogin()
        {
            if($this->isConnected()) 
            {
                echo "Bienvenue " . $this->login;
            }
            else {
                echo "Vous devez être connecté(e) pour voir vos informations !";
            }
        }

        public function getId()
        {
            return $this->id;
        }

        // Utilisateur déjà existant?
        public function isUserExist($login)
        {
            // requête pour vérifier que le login choisi n'est pas déjà utilisé
            $requete = "SELECT * FROM utilisateurs where login = :login";

            // préparation de la requête
            $select = $this->bdd->prepare($requete);

            // htmlspecialchars pour les paramètres
            $login = htmlspecialchars($login);

            // exécution de la requête avec liaison des paramètres
            $select->execute(array(':login' => $login));

            // récupération du tableau
            $fetch_all = $select->fetchAll();

            if (count($fetch_all) === 0) { // login disponible
                $reponse = "dispo";
                echo $reponse; // login disponible
            } else {
                $reponse = "indispo";
                echo $reponse; // login indisponible
            }
        }

        // Changer le login
        public function changeLogin($login, $password)
        {
            $request = "SELECT * FROM utilisateurs WHERE login = :login";
            // préparation de la requête
            $select = $this->bdd->prepare($request);

            // special characters
            $login = trim(htmlspecialchars($login));
            $password = trim(htmlspecialchars($password));

            // exécution de la requête avec liaison des paramètres
            $select->execute(array(
                ':login' => $this->login,
            ));
            // récupération des résultats
            $result = $select->fetch(PDO::FETCH_ASSOC);
            // verif password
            if (password_verify($password, $result['password'])) {
                $update = "UPDATE utilisateurs SET login=:login WHERE id = :id";
                // préparation de la requête
                $update = $this->bdd->prepare($update);
                // exécution de la requête avec liaison des paramètres
                $update->execute(array(
                    ':login' => $login,
                    ':id' => $result['id']
                    // ':login' => $this->['id']
                ));

                $_SESSION['user']= [
                    'id' => $result['id'],
                    'login' => $login,
                    'password' => $result['password']
                ]; 
                echo "Login changé !";     
            }
            else {
                echo "mot de passe incorrect !";
            }
            
        }
        
        // Changer le mot de passe
        public function changePassword($oldPassword, $newPassword)
        {
            $request = "SELECT * FROM utilisateurs WHERE id = :id";
            // préparation de la requête
            $select = $this->bdd->prepare($request);
            
            // special characters
            $newPassword = trim(htmlspecialchars($newPassword));
            $id = trim(htmlspecialchars($this->id));
            
            $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            
            $select->execute(array(
                ':id' => $this->id,
            ));
            // récupération des résultats
            $result = $select->fetch(PDO::FETCH_ASSOC);
            // verif password
            if (password_verify($oldPassword, $result['password'])) {
                $update = "UPDATE utilisateurs SET password=:password WHERE id = :id";
                // préparation de la requête
                $update = $this->bdd->prepare($update);
                // exécution de la requête avec liaison des paramètres
                $update->execute(array(
                    ':id' => $id,
                    ':password' => $newPassword
                ));
                echo 'Mot de passe changé !';
            }
            else {
                echo "mot de passe incorrect !";
            }
        }           
        
    } // fin de la classe