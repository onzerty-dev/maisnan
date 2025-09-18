<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.html');
    exit;
}

$prenom = htmlspecialchars($_SESSION['user']['prenom']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Bienvenue</title>
  <style>
    body {
      background-color: #000;
      color: #0ff;
      font-family: 'Orbitron', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      flex-direction: column;
      text-align: center;
    }

    h1 {
      font-size: 36px;
      text-shadow: 0 0 10px #0ff;
    }

    a {
      margin-top: 20px;
      color: #1e90ff;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <h1>Bienvenue, <?= $prenom ?> 👋</h1>
  <a href="deconnexion.php">Se déconnecter</a>
</body>
</html>
