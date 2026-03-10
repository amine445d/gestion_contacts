# Contact Management System - Laravel CRUD

## Description

Ce projet est une application web développée avec **Laravel** qui permet de gérer une liste de contacts.
L'application implémente les opérations **CRUD (Create, Read, Update, Delete)** et utilise une architecture propre basée sur **Controller, Service et Repository** pour séparer les responsabilités.

Ce projet a été réalisé pour apprendre les bonnes pratiques de développement avec **Laravel**.

---

## Fonctionnalités

* Ajouter un nouveau contact
* Afficher la liste des contacts
* Modifier les informations d'un contact
* Supprimer un contact
* Validation des données utilisateur

---

## Technologies utilisées

* **PHP**
* **Laravel**
* **MySQL**
* **Blade Template**
* **HTML / CSS**

---

## Architecture du projet

Le projet utilise l'architecture suivante :

Controller → Service → Repository → Model → Database

### Controller

Gère les requêtes HTTP et communique avec le Service.

### Service

Contient la logique métier de l'application.

### Repository

Gère l'accès à la base de données.

### Model

Représente la table de la base de données.

---

## Structure du projet

```
app
 ├── Http
 │   └── Controllers
 │       └── ContactController.php
 │
 ├── Services
 │   └── ContactService.php
 │
 ├── Repositories
 │   └── ContactRepository.php
 │
 └── Models
     └── Contact.php

resources
 └── views
     └── contacts
         ├── index.blade.php
         ├── create.blade.php
         └── edit.blade.php

routes
 └── web.php
```

---

## Base de données

La table **contacts** contient les champs suivants :

| Champ      | Type      |
| ---------- | --------- |
| id         | integer   |
| nom        | string    |
| email      | string    |
| telephone  | string    |
| created_at | timestamp |
| updated_at | timestamp |

---

## Routes principales

| Méthode | Route               | Description                            |
| ------- | ------------------- | -------------------------------------- |
| GET     | /contacts           | afficher la liste des contacts         |
| GET     | /contacts/create    | afficher le formulaire d'ajout         |
| POST    | /contacts           | ajouter un contact                     |
| GET     | /contacts/{id}/edit | afficher le formulaire de modification |
| PUT     | /contacts/{id}      | mettre à jour un contact               |
| DELETE  | /contacts/{id}      | supprimer un contact                   |

---

## Installation

### 1. Cloner le projet

```
git clone https://github.com/username/contact-management-laravel.git
```

### 2. Aller dans le dossier du projet

```
cd contact-management-laravel
```

### 3. Installer les dépendances

```
composer install
```

### 4. Configurer la base de données

Modifier le fichier **.env**

```
DB_DATABASE=contacts_db
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Exécuter les migrations

```
php artisan migrate
```

### 6. Lancer le serveur

```
php artisan serve
```

Puis ouvrir :

```
http://127.0.0.1:8000
```

---

## Aperçu de l'application

* Page liste des contacts
* Page ajouter un contact
* Page modifier un contact

---

## Objectif pédagogique

Ce projet permet de comprendre :

* le fonctionnement d'une **CRUD avec Laravel**
* l'utilisation du **Repository Pattern**
* l'utilisation du **Service Layer**
* l'injection de dépendances dans Laravel

---

## Auteur

Projet réalisé par **Amine Hamdi** dans le cadre de l'apprentissage de **Laravel et des bonnes pratiques de développement web**.
