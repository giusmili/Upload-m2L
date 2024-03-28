<?php

        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';
        $dateNaissance = $_POST['date_naissance'] ?? '';
        $ville = $_POST['ville'] ?? '';
        $email = $_POST['email'] ?? '';

        // Gérer le téléchargement de la photo
        $photo = $_FILES['photo'] ?? '';
        $photoName = $photo['name'] ?? '';
        $photoTmpName = $photo['tmp_name'] ?? '';
        $photoDestination = 'uploads/' . $photoName;
        
