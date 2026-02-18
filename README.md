# 🟦 AxionPro | Système de Ticketing & Gestion RH

> **Plateforme d'Audit et d'Accompagnement RH**
> Un projet fullstack moderne combinant une interface utilisateur (UI) haut de gamme et un système de gestion de tickets sécurisé pour les agents.

---

## 📂 Organisation Technique
Le projet est structuré pour séparer la logique de présentation de la gestion des données :
- **`index.html`** : Interface Single Page Application (SPA) utilisant Tailwind CSS et JavaScript pour une navigation fluide sans rechargement.
- **`api.php`** : Contrôleur central gérant l'authentification des agents, la création et la suppression de tickets.
- **`config.php`** : Configuration de la connexion à la base de données via PDO pour assurer la sécurité des transactions.
- **`get_tickets.php`** : Service dédié à la récupération asynchrone des données pour le dashboard admin.

---

## 🛠️ Stack Technique
- **Front-end :** HTML5, Tailwind CSS, FontAwesome, Animate.css.
- **Back-end :** PHP 8.x avec gestion de sessions sécurisées.
- **Base de données :** MySQL / MariaDB avec requêtes préparées (Protection SQLi).
- **Communication :** Fetch API et format d'échange JSON.

---

## ⚙️ Installation (Admin/Ops)
1. **Base de données :** Créer une base nommée `axionpro` et importer le schéma SQL.
2. **Configuration :** Éditer `config.php` pour renseigner vos accès MySQL.
3. **Sécurité :** L'accès au dashboard nécessite une authentification via `api.php`.

---

## ⚖️ Licence

Ce projet est sous licence **MIT**.

**En résumé :**
- ✅ Utilisation commerciale autorisée.
- ✅ Modification et distribution autorisées.
- ✅ Utilisation privée autorisée.
- ⚠️ La seule condition est d'inclure le nom de l'auteur original et la notice de licence dans toute copie du logiciel.

---

## 👤 Auteur
**[Ton Nom / Pseudo]**
*Développeur & Admin Système*
> "Concevoir pour l'utilisateur, sécuriser pour l'infrastructure."
