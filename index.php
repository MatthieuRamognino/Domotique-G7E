<?php 
    session_start();
    require("Modele/BDD.php");
    require("Vue/commun.php");
   
        if(isset($_GET['cible'])) { // on regarde la page où il veut aller
            if($_GET['cible'] == 'Accueil_connecte')
            {
                include("Vue/Accueil_connecte.php");

            } else if ($_GET['cible'] == "monDomicile"){
                if(isset($_GET['dom']) AND $_GET['dom']=='ajouterCapteur'){
                    require("Modele/BDD.php");
                    include('Modele/Action.php');
                    AjouteCapteur($bdd);
                }
                include("Vue/monDomicile.php");
            } else if ($_GET['cible'] == "Contact"){
                include("Vue/Contact.php");

            } else if ($_GET['cible'] == "monProfil"){
                include("Modele/utilisateurs.php");
                $reponse = domicile($bdd);
                
                include("Vue/monProfil.php");

           } else if ($_GET['cible'] == "deconnexion"){
                // Détruit toutes les variables de session
                $_SESSION = array();
                if (isset($_COOKIE[session_name()])) {
                    setcookie(session_name(), '', time()-42000, '/');
                }
                session_destroy();
                include("Vue/Accueil_non_connecte.php");
            }else {
                include("Controleur/connexion.php");
            }

        } else { // affichage par défaut
                include("Vue/Accueil_non_connecte.php");
        }
    
