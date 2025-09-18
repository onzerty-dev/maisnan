<?php
require 'config.php';

$email = $_POST['email'] ?? '';
$nom = $_POST['nom'] ?? '';
$prenom = $_POST['prenom'] ?? '';
$mdp = $_POST['mdp'] ?? '';
$confirm_mdp = $_POST['confirm_mdp'] ?? '';

if ($mdp !== $confirm_mdp) {
    die("Les mots de passe ne correspondent pas.");
}

$hash = password_hash($mdp, PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO utilisateurs (email, nom, prenom, mot_de_passe) VALUES (?, ?, ?, ?)");
$success = $stmt->execute([$email, $nom, $prenom, $hash]);

if ($success) {
    echo "Inscription réussie ! <a href='index.html'>Se connecter</a>";
} else {
    echo "Erreur lors de l'inscription.";
}
?>
