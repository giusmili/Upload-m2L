<?php

class Inscription {
    private $bdd;

    public function __construct() {
        # Connexion à la base de données (à adapter avec vos paramètres)
        $host = 'localhost';
        $dbname = 'm2l';
        $user = 'root';
        $pass = '';
        try {
            $this->bdd = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }
    
       
    }

    public function inscrireMembre($nom, $prenom, $dateNaissance, $ville, $email, $photo) {
        // Vérifier si tous les champs sont remplis
        if (empty($nom) || empty($prenom) || empty($dateNaissance) || empty($ville) || empty($email) || empty($photo)) {
            die("Tous les champs doivent être remplis");
        }

        // Valider les données et sécuriser le code
        $nom = $this->dataValidate($nom);
        $prenom = $this->dataValidate($prenom);
        $dateNaissance = $this->dataValidate($dateNaissance);


        $ville = $this->dataValidate($ville);
        $email = $this->dataValidate($email);

        // Enregistrement dans la base de données
       $bdd = $this->bdd->prepare('INSERT INTO membres (nom, prenom, date_naissance, ville, email, photo) VALUES (?, ?, ?, ?, ?, ?)');
       $bdd->execute([$nom, $prenom, $dateNaissance, $ville, $email, $photo]);
        

        print "Inscription réussie!";
    }

    private function dataValidate($data) {
        # Supprimer les espaces excessifs et échapper les caractères spéciaux pour les requêtes SQL : voir la démo
        $data = trim($data);
        /* $data = $this->bdd->quote($data); */
        return $data;
    }
    
    
}


?>
