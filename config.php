<?php
/**
 * Fichier de configuration de la base de données
 * À placer sur ton serveur (WAMP, MAMP, ou hébergement web)
 */

$host = 'localhost';
$dbname = 'axionpro';
$username = 'root'; // Par défaut sur XAMPP/WAMP
$password = '';     // Vide par défaut sur XAMPP/WAMP

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>