#  Laravel Real Estate Booking

Application de réservation immobilière développée avec Laravel.

##  Objectif

Ce projet permet de :
- Parcourir  des biens immobiliers
- Réserver un bien
- Gérer des réservations

##  Technologies utilisées

- Laravel
- Breeze (authentification)
- Blade
- TailwindCSS
- MySQL

##  Installation

git clone https://github.com/merveillekadymaitovo-stack/laravel-real-estate-booking.git
cd laravel-real-estate-booking

composer install
npm install

cp .env.example .env
php artisan key:generate

php artisan migrate
php artisan serve
npm run dev

##  Fonctionnalités

- Authentification
- Liste des propriétés
- Détail d’un bien

##  Auteur

Kady Merveille Maitovo
