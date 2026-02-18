# 🟦 AxionPro | Système de Ticketing & Gestion RH

> **Plateforme d'Audit et d'Accompagnement RH**
> Un projet fullstack moderne combinant une interface utilisateur (UI) haut de gamme et un système de gestion de tickets sécurisé pour les agents.

---

## 🌟 Points Forts du Projet
- **Interface Glassmorphism :** UI moderne conçue avec **Tailwind CSS** et **Animate.css** pour une expérience utilisateur fluide.
- **Système de Ticketing :** Formulaire client dynamique avec traitement asynchrone (Fetch API).
- **Espace Agent Sécurisé :** Dashboard d'administration protégé par authentification pour la gestion des demandes.
- **Architecture Hybride :** Utilisation de PHP pour l'API backend et de JavaScript pour le rendu dynamique (Single Page App approach).

---

## 📁 Structure Technique

### 🎨 Front-End (`index.html`)
- **Framework :** Tailwind CSS pour un design responsive et sombre.
- **Navigation :** Système de "Single Page Application" (SPA) géré par JavaScript (`showPage`).
- **Composants :** FAQ interactive, formulaires de contact, et dashboard de statistiques.

### ⚙️ Back-End & API (`api.php`, `get_tickets.php`)
- **Langage :** PHP 8.x.
- **Sécurité :** Utilisation de **PDO** avec requêtes préparées pour bloquer les injections SQL.
- **Authentification :** Gestion des sessions sécurisées pour l'accès agent (`session_start`).
- **Format de données :** Échanges entièrement en **JSON** pour une communication fluide entre le front et le back.

### 🗄️ Base de Données (`config.php`)
- Connexion centralisée via PDO.
- Gestion des tickets : Stockage du nom client, type de service, message, statut (`en_attente`, `traite`) et timestamps.

---

## 🔧 Installation (Côté Admin/Ops)

1. **Préparation du serveur :**
   - Serveur Apache avec module PHP activé.
   - Base de données MySQL.

2. **Configuration de la Base :**
   - Créer une base nommée `axionpro`.
   - Importer les tables nécessaires (Tickets & Users).

3. **Liaison BDD :**
   Modifier `config.php` avec vos accès locaux ou distants :
   ```php
   $host = 'localhost';
   $dbname = 'axionpro';
   $username = 'votre_user';
   $password = 'votre_mdp';
