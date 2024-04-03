<?php
    include_once __DIR__ ."/controller/head.inc.php";
?>

<body>
   
    <main>
        <header>
            <h1>
            <span class="material-symbols-outlined">
                sprint
            </span> Tous les sports
            </h1>
        </header>
        <div class="picture" role="region" aria-labelledby="logo">
            <img src="./asset/logo.svg" alt="logo phone" id="logo">
        </div>
        <fieldset>
            <legend>Valider votre profil</legend>
             <form action="index.php" method="post" enctype="multipart/form-data">
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" required aria-required="true" placeholder="Votre nom">

                <label for="prenom">Prénom:</label>
                <input type="text" id="prenom" name="prenom" required aria-required="true" placeholder="Votre prénom">

                <label for="date_naissance">Date de naissance:</label>
                <input type="date" id="date_naissance" name="date_naissance" required aria-required="true">

                <label for="ville">Ville:</label>
                <input type="text" id="ville" name="ville" required aria-required="true" placeholder="Votre ville">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required aria-required="true" placeholder="Votre mail">
                <label for="photo">
                    <strong>
                    <span class="material-symbols-outlined">
                        download
                    </span>
                        Choisir une image
                    </strong>
                    <input type="file" id="photo" name="photo" accept="image/*" required aria-required="true">
                </label>
                <input type="submit" class="button-outline" value="S'inscrire">
                <p>
                  
                  <?php
                      
                    include_once __DIR__ ."/controller/controller.class.php";
                    include_once __DIR__ ."/controller/config.php";
                        // Déplacer la photo téléchargée vers un dossier (assurez-vous que le dossier "uploads" existe)
                      move_uploaded_file($photoTmpName, $photoDestination);
      
                      // Instancier la classe Inscription
                      $inscription = new Inscription();
      
                      // Appeler la méthode d'inscription
                      $inscription->inscrireMembre($nom, $prenom, $dateNaissance, $ville, $email, $photoDestination);
                      // Stocker les données du membre dans une session
                        session_start();
                        $_SESSION['membre'] = [
                            'nom' => $nom,
                            'prenom' => $prenom,
                            'dateNaissance' => $dateNaissance,
                            'ville' => $ville,
                            'email' => $email,
                            'photo' => $photoDestination,
                        ];
                      // Rediriger l'utilisateur après l'inscription réussie
                    header("Location: confirmation.php?prenom=" . urlencode($prenom));
                    exit();
                      # suite du code
                      // Récupérer les données du formulaire
                      ?>
                      
                </p>
            
        </fieldset>
   
    </footer>
      
            

    </main>
</body>
</html>
