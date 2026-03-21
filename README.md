#  Laravel Real Estate Booking
Projet réalisé dans le cadre d’un test technique pour un stage en développement web.
Il s’agit d’une application web de réservation immobilière développée avec Laravel, qui m’a permis de mettre en pratique mes compétences en développement web.

##  Objectif du projet

L’objectif de cette application est de permettre à un utilisateur de :

- consulter une liste de biens immobiliers  
- voir le détail d’un bien  
- réserver un bien en sélectionnant des dates  
- associer chaque réservation à un utilisateur connecté  

Ce projet m’a permis de comprendre le fonctionnement global d’une application Laravel, de la gestion de la base de données jusqu’à l’interface utilisateur.

---

##  Technologies utilisées

- Laravel (framework PHP)
- Laravel Breeze (authentification)
- Livewire (composants dynamiques)
- Blade (moteur de templates)
- TailwindCSS (mise en forme)
- MySQL (base de données)

---

##  Choix techniques

- Utilisation de **Laravel Breeze** pour mettre en place rapidement un système d’authentification complet  
- Utilisation de **Livewire** pour créer un formulaire de réservation dynamique sans JavaScript complexe  
- Utilisation de **Eloquent ORM** pour gérer les relations entre utilisateurs, propriétés et réservations  
- Structuration du projet selon l’architecture MVC de Laravel  

---

##  Installation du projet

### 1. Cloner le projet

```bash
git clone https://github.com/merveillekadymaitovo-stack/laravel-real-estate-booking.git
cd laravel-real-estate-booking
2. Installer les dépendances
composer install
npm install
3. Configurer l’environnement
cp .env.example .env
php artisan key:generate

 Modifier le fichier .env pour configurer la base de données (MySQL)

4. Lancer les migrations
php artisan migrate
5. Démarrer le projet
php artisan serve
npm run dev

 Accéder à l’application :
http://127.0.0.1:8000
```
## Fonctionnalités principales
Authentification utilisateur (inscription / connexion)
Affichage des propriétés
Page détail d’un bien
Réservation d’un bien avec choix des dates
Enregistrement des réservations en base de données
Message de confirmation après réservation
 Ce que j’ai appris

## À travers ce projet, j’ai pu apprendre :

la création de routes et contrôleurs avec Laravel
la gestion des modèles et des relations avec Eloquent
l’utilisation des migrations pour structurer la base de données
la mise en place d’une authentification avec Breeze
la création de composants dynamiques avec Livewire
l’organisation d’un projet web complet
## Améliorations possibles
Gestion des conflits de réservation (dates déjà réservées)
Ajout d’une page “Mes réservations” pour chaque utilisateur
Amélioration de l’interface utilisateur avec TailwindCSS
Mise en place d’un panneau d’administration avec Filament


<img width="1294" height="774" alt="image" src="https://github.com/user-attachments/assets/938096b0-ffc2-4cf6-854e-3a59981b9e91" />

## Auteur

Kady Merveille Maitovo
