<html>

<head>

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<link rel="icon" type="image/png" href="logo.png" />
		

		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/presentcity.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	</head>
<body>
trytryr
<h1><?php

if(isset($_POST['seconnecter'])) { // si le bouton "Connexion" est appuyé
    // on vérifie que le champ "Pseudo" n'est pas vide
    // empty vérifie à la fois si le champ est vide et si le champ existe belle et bien (is set)
    if(empty($_POST['seconnecter_email'])) {
        echo "Le champ email est vide.";
    } else {
        // on vérifie maintenant si le champ "Mot de passe" n'est pas vide"
        if(empty($_POST['seconnecter_password'])) {
            echo "Le champ Mot de passe est vide.";
        } else {
            // les champs sont bien posté et pas vide, on sécurise les données entrées par le membre:
            $Pseudo = htmlentities($_POST['seconnecter_email'], ENT_QUOTES, "ISO-8859-1"); // le htmlentities() passera les guillemets en entités HTML, ce qui empêchera les injections SQL
            $MotDePasse = htmlentities($_POST['seconnecter_password'], ENT_QUOTES, "ISO-8859-1");
            //on se connecte à la base de données:
            $mysqli = mysqli_connect("localhost", "root", "", "presentcity");
            //on vérifie que la connexion s'effectue correctement:
            if(!$mysqli){
                echo "Erreur de connexion à la base de données.";
            } else {
                // on fait maintenant la requête dans la base de données pour rechercher si ces données existe et correspondent:
                $Requete = mysqli_query($mysqli,"SELECT * FROM membres WHERE email = '".$Pseudo."' AND motdepasse = '".$MotDePasse."'");
                // si il y a un résultat, mysqli_num_rows() nous donnera alors 1
                // si mysqli_num_rows() retourne 0 c'est qu'il a trouvé aucun résultat
                if(mysqli_num_rows($Requete) == 0) {
                    echo "Le pseudo ou le mot de passe est incorrect, le compte n'a pas été trouvé";
                } else {
                    // on ouvre la session avec $_SESSION:
					
                    $_SESSION['seconnecter_email'] = $Pseudo; // la session peut être appelée différemment et son contenu aussi peut être autre chose que le pseudo
					$_SESSION['connect'] = 1;
                    echo "Vous êtes à présent connecté !";
						?>
						<script> location.replace("index.php"); </script>;
						<?php
						
					}
					
                }
            }
        }
    
}
?></h1>
</body>
</html>