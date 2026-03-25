# ImmoReserv

Application de gestion de réservations immobilières réalisée dans le cadre d'un test technique. Le projet utilise Laravel 11 avec Breeze pour l'authentification, Livewire pour les composants dynamiques, Filament pour le panneau d'administration et TailwindCSS pour le style.

---

## Technologies utilisées

- Laravel 11
- Laravel Breeze (authentification)
- Livewire 3 (formulaire de réservation dynamique)
- Filament 3 (interface d'administration)
- TailwindCSS
- MySQL

---

## Installation

Cloner le projet et se placer dedans :

```bash
git clone https://github.com/merveillekadymaitovo-stack/laravel-real-estate-booking.git
cd laravel-real-estate-booking
```

Installer les dépendances :

```bash
composer install
npm install
```

Copier le fichier d'environnement et générer la clé :

```bash
cp .env.example .env
php artisan key:generate
```

Configurer la base de données dans le fichier `.env` :

```env
DB_DATABASE=laravel_test
DB_USERNAME=root
DB_PASSWORD=votre_mot_de_passe
```

Lancer les migrations :

```bash
php artisan migrate
```

Compiler les assets et démarrer le serveur :

```bash
npm run dev
php artisan serve
```

L'application tourne sur http://127.0.0.1:8000

---

## Créer un compte admin

Pour accéder au panneau Filament sur `/admin` :

```bash
php artisan make:filament-user
```

---

## Ce qui a été réalisé

- Authentification complète avec Breeze (connexion, inscription, déconnexion)
- Tableau de bord avec les métriques principales (nombre de propriétés, réservations, revenus)
- Liste des propriétés avec photos et prix par nuit
- Formulaire de réservation en Livewire avec calcul automatique du total selon les dates
- Page mes réservations avec possibilité de confirmer ou annuler
- Panneau d'administration Filament avec gestion des propriétés et des réservations

---

## Structure de la base de données

Trois tables principales :

- `users` : les utilisateurs créés via Breeze
- `properties` : les biens immobiliers (nom, description, prix par nuit, image)
- `bookings` : les réservations liées à un utilisateur et une propriété (dates, statut)

---

## Améliorations possibles

- Gestion des conflits de dates côté serveur avec messages d'erreur plus détaillés
- Système de notation des propriétés par les utilisateurs
- Envoi d'emails de confirmation après réservation
- Filtrage des propriétés par prix ou localisation

---

## Remarques

C'était la première fois que je travaillais avec Livewire et Filament. J'ai pris le temps de lire la documentation pour comprendre le fonctionnement des composants Livewire et la façon dont Filament génère les ressources automatiquement à partir des modèles Eloquent.

---

## Auteur

Kady Merveille Maitovo
