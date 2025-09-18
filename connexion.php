<?php
session_start();
require 'config.php';

$nom = $_POST['nom'] ?? '';
$mdp = $_POST['mdp'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE nom = ?");
$stmt->execute([$nom]);
$user = $stmt->fetch();

if ($user && password_verify($mdp, $user['mot_de_passe'])) {
    $_SESSION['user'] = [
        'id' => $user['id'],
        'nom' => $user['nom'],
        'prenom' => $user['prenom']
    ];
    header('Location: bienvenue.php');
    exit;
} else {
    echo "Nom ou mot de passe incorrect. <a href='index.html'>Retour</a>";
}
?>
