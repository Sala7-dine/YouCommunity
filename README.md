<p align="center">
  <a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Plateforme de Gestion d'Événements Communautaires 🎉

Bienvenue dans notre projet de plateforme web de gestion d'événements communautaires locaux! Ce projet utilise **Laravel 11** pour permettre aux utilisateurs de découvrir, créer et gérer des événements communautaires à proximité.

## 🎯 Objectif du Projet

Créer une plateforme permettant aux utilisateurs de :
- Découvrir des événements locaux
- Créer et gérer des événements
- S'inscrire (RSVP) et interagir avec d'autres participants
- Filtrer les événements par géolocalisation, catégorie, et date

## 🏗 Technologies et Outils

- **Framework** : Laravel 11 (dernière version stable)
- **Base de données** : MySQL / PostgreSQL
- **Frontend** : Blade + Tailwind CSS (via Laravel Breeze/Jetstream)
- **Authentification** : Laravel Breeze / Jetstream / UI
- **Outils de développement** :
  - `php artisan make:model -mcr` (Modèles, Migrations, Controllers, Requests)
  - `php artisan make:seeder` & `php artisan make:factory` (Données de test)
  - `php artisan tinker` (REPL pour tester les requêtes)
  - Eloquent ORM pour manipuler les données

## 📌 Structure du Projet

### 1️⃣ Gestion des Utilisateurs (users)

| Fonctionnalité              | Description                                   |
|-----------------------------|-----------------------------------------------|
| **Inscription / Connexion**  | Permet aux utilisateurs de s'inscrire et de se connecter. |
| **Gestion de Profil**        | Modifications des informations personnelles. |
| **Rôles et Permissions** (bonus) | Gestion des rôles (admin, utilisateur). |

Modèle `User` :

- id (PK)
- name
- email (unique)
- password
- role (admin, user)
- timestamps

### 2️⃣ Gestion des Événements (events)

| Fonctionnalité                      | Description                                                   |
|-------------------------------------|---------------------------------------------------------------|
| **Création et Gestion d'Événements**| Les utilisateurs peuvent créer et gérer leurs événements.     |
| **Filtrage par Proximité, Date et Catégorie** | Tri des événements selon la localisation et les critères. |
| **Limite de Participants**          | Limite le nombre de participants à un événement.               |

Modèle `Event` :

- id (PK)
- titre
- description
- lieu (adresse + géolocalisation)
- date_heure
- catégorie (sport, musique, éducation…)
- user_id (FK → users)
- max_participants
- timestamps

### 3️⃣ Gestion des RSVP (rsvps)

| Fonctionnalité                    | Description                              |
|-----------------------------------|------------------------------------------|
| **RSVP aux événements**           | Les utilisateurs peuvent s'inscrire ou se désinscrire des événements. |
| **Notifications**                 | Envoi de notifications sur les mises à jour des événements. |

Modèle `RSVP` :

- id (PK)
- user_id (FK → users)
- event_id (FK → events)
- timestamps

### 4️⃣ Gestion des Commentaires (comments)

| Fonctionnalité                   | Description                                      |
|----------------------------------|--------------------------------------------------|
| **Ajouter un Commentaire**       | Permet aux utilisateurs de commenter les événements. |
| **Supprimer ses commentaires**   | Chaque utilisateur peut supprimer ses propres commentaires. |

Modèle `Comment` :

- id (PK)
- contenu
- user_id (FK → users)
- event_id (FK → events)
- timestamps

## 💻 Installation

### Prérequis

Avant de commencer, assurez-vous d'avoir installé :

- PHP >= 8.1
- Composer
- Laravel 11
