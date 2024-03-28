<!-- confirmation.php -->
<?php
    
    include_once __DIR__ ."/controller/head.inc.php";
    
?>

    <body>
        <header>
            <h1>
            <span class="material-symbols-outlined">
                sprint
            </span> Confirmation
            </h1>
        </header>
        <main>
            <section  class="message-primary">
          
            <?php
        // Démarrer la session
        session_start();
        // Récupérer le prénom depuis l'URL
        $prenom = $_GET['prenom'] ?? '';

        // Afficher le prénom dans le contenu HTML
        if (!empty($prenom)) {
            echo "<p class=\"message-type\">Merci, $prenom, de vous être inscrit. Votre formulaire a été soumis avec succès.</p>";

            // Récupérer les données du membre depuis la session
            $newUser = $_SESSION['membre'] ?? null;

            // Afficher les données du membre
            if ($newUser) {
                echo "<h2>Vous êtes le nouveau membre :</h2>
                <ul>
                    <li>Nom : " . $newUser['nom'] . "</li>
                    <li>Prénom : " . $newUser['prenom'] . "</li>
                    <li>Date de naissance : " . $newUser['dateNaissance'] . "</li>
                    <li>Ville : " . $newUser['ville'] . "</li>
                    <li>Email : " . $newUser['email'] . "</li>
                    <li>
                    <figure>  
                        <img src='" . $newUser['photo'] . "' alt='Photo du membre'>
                        <figcaption>
                            <p>Votre photo : </p>
                        </figcaption>
                    </figure>
                    </li>
               </ul>";
            }
        } 
        else 
        {
            echo "<p>Merci de vous être inscrit. Votre formulaire a été soumis avec succès.</p>";
        }

        // Détruire la session après utilisation
        session_destroy();
    ?>

          
            
            <!-- profile -->

            </section>
        </main>
   
    
</body>
</html>
