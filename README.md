Parfait ! Voici le README complet prêt à être copié :


#  ImmoReserv

![Status](https://img.shields.io/badge/status-completed-brightgreen)
![Laravel](https://img.shields.io/badge/Laravel-11-red)
![Livewire](https://img.shields.io/badge/Livewire-3-blue)
![Filament](https://img.shields.io/badge/Filament-3-teal)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3-06B6D4)
![PHP Version](https://img.shields.io/badge/PHP-8.2-blue)
![Build Status](https://img.shields.io/badge/build-passing-brightgreen)

Application de gestion de réservations immobilières réalisée dans le cadre d'un test technique. Le projet permet aux utilisateurs de consulter des biens, d'effectuer des réservations avec calcul dynamique du prix, et de gérer leurs réservations via un tableau de bord personnel.

---

##  Table des matières

- [Fonctionnalités](#-fonctionnalités)
- [Technologies utilisées](#-technologies-utilisées)
- [Installation](#-installation)
- [Configuration](#-configuration)
- [Utilisation](#-utilisation)
- [Structure de la base de données](#-structure-de-la-base-de-données)
- [Captures d'écran](#-captures-décran)
- [Améliorations possibles](#-améliorations-possibles)
- [Résolution des problèmes](#-résolution-des-problèmes)
- [FAQ](#-faq)
- [Retour d'expérience](#-retour-dexpérience)
- [Auteur](#-auteur)

---

##  Fonctionnalités

###  Côté utilisateur
- Authentification complète (inscription, connexion, déconnexion) avec Laravel Breeze
- Tableau de bord personnel avec métriques clés
- Liste des propriétés disponibles avec photos et prix par nuit
- Détail d'une propriété avec formulaire de réservation dynamique
- Calcul automatique du prix total en temps réel selon les dates sélectionnées
- Page "Mes réservations" avec possibilité de confirmer ou annuler
- Vérification des conflits de dates pour éviter les double-réservations

###  Panneau d'administration (Filament)
- Gestion complète des propriétés (CRUD)
- Gestion complète des réservations (CRUD)
- Filtres et recherche avancée
- Interface intuitive et responsive
- Traduction française de l'interface

---

##  Technologies utilisées

| Technologie | Version | Utilité |
|-------------|---------|---------|
| Laravel | 11 | Framework PHP principal |
| Laravel Breeze | - | Authentification utilisateur |
| Livewire | 3 | Composants dynamiques sans JavaScript |
| Filament | 3 | Panneau d'administration |
| TailwindCSS | 3 | Stylisation et design responsive |
| MySQL | 8.0 | Base de données |
| Alpine.js | - | Interactions JavaScript légères |



##  Installation

### 1. Cloner le projet

```bash
git clone https://github.com/merveillekadymaitovo-stack/laravel-real-estate-booking.git
cd laravel-real-estate-booking
```

### 2. Installer les dépendances PHP

```bash
composer install
```

### 3. Installer les dépendances JavaScript

```bash
npm install
```

### 4. Configurer l'environnement

```bash
cp .env.example .env
php artisan key:generate
```

### 5. Configurer la base de données

Éditez le fichier `.env` avec vos informations de connexion :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_test
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Lancer les migrations et seeders

```bash
php artisan migrate --seed
```

### 7. Compiler les assets

```bash
npm run build
```

### 8. Démarrer le serveur

```bash
php artisan serve
```

L'application est accessible sur : [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

##  Configuration

### Créer un compte administrateur

Pour accéder au panneau d'administration Filament :

```bash
php artisan make:filament-user
```

Puis remplissez les informations demandées :
- **Name** : Admin
- **Email** : admin@example.com
- **Password** : 1234

Accédez ensuite à : [http://127.0.0.1:8000/admin](http://127.0.0.1:8000/admin)

### Commandes utiles

| Commande | Description |
|----------|-------------|
| `php artisan serve` | Démarrer le serveur de développement |
| `php artisan migrate:fresh --seed` | Réinitialiser et repeupler la base de données|
| `php artisan cache:clear` | Vider le cache de l'application |
| `php artisan view:clear` | Vider le cache des vues |
| `php artisan test` | Lancer les tests automatisés |
| `npm run dev` | Compiler les assets en mode développement |
| `npm run build` | Compiler les assets en mode production |

---

## 📖 Utilisation

### Pour les utilisateurs

1. **Inscription / Connexion** : Créez un compte ou connectez-vous
2. **Parcourir les propriétés** : Consultez la liste des biens disponibles
3. **Réserver** : Sur la page d'un bien, sélectionnez vos dates et confirmez la réservation
4. **Gérer mes réservations** : Dans "Mes réservations", confirmez ou annulez vos séjours

### Pour l'administrateur

1. **Accéder à l'admin** : Connectez-vous sur `/admin`
2. **Gérer les propriétés** : Ajoutez, modifiez ou supprimez des biens
3. **Gérer les réservations** : Visualisez et modifiez les statuts des réservations

---

##  Structure de la base de données

### Diagramme des relations

```
┌─────────────┐       ┌─────────────┐       ┌─────────────┐
│   users     │       │  bookings   │       │ properties  │
├─────────────┤       ├─────────────┤       ├─────────────┤
│ id          │──┐    │ id          │    ┌──│ id          │
│ name        │  │    │ user_id     │────┘  │ name        │
│ email       │  └────│ property_id │       │ description │
│ password    │       │ start_date  │       │ price_per_night│
└─────────────┘       │ end_date    │       │ location    │
                      │ total_price │       │ max_guests  │
                      │ status      │       │ image       │
                      └─────────────┘       └─────────────┘
```

### Statuts des réservations

| Statut | Description | Visuel |
|--------|-------------|--------|
| `pending` | En attente de confirmation |  Jaune |
| `confirmed` | Confirmée |  Vert |
| `cancelled` | Annulée |  Rouge |

---

##  Captures d'écran

### Page d'accueil - Liste des propriétés
![Propriétés](screenshots/properties.png)

### Détail d'une propriété - Formulaire de réservation dynamique
![Réservation dynamique](screenshots/booking-form.png)

### Tableau de bord utilisateur
<img width="1915" height="929" alt="image" src="https://github.com/user-attachments/assets/124d064b-311f-4492-9021-9b0f190693bc" />


### Mes réservations
![Mes réservations](screenshots/my-bookings.png)

### Panneau d'administration Filament
![Admin Panel](screenshots/admin-panel.png)

---

##  Améliorations possibles

### Court terme
- [ ] Système de notation des propriétés par les utilisateurs (⭐⭐⭐⭐⭐)
- [ ] Envoi d'emails de confirmation après réservation
- [ ] Filtrage avancé des propriétés (prix, localisation, nombre de chambres)
- [ ] Pagination sur la liste des propriétés

### Long terme
- [ ] Calendrier visuel des disponibilités
- [ ] Paiement en ligne (Stripe)
- [ ] API REST pour applications mobiles
- [ ] Système de favoris
- [ ] Notifications en temps réel (Laravel Echo + Pusher)
- [ ] Export des réservations en PDF/Excel

---

##  Résolution des problèmes courants

### Extension PHP intl manquante

**Erreur :** `ext-intl is missing`

**Solution :**
```bash
# Dans php.ini, décommentez :
extension=intl
```

### Extension PHP zip manquante

**Erreur :** `ext-zip is missing`

**Solution :**
```bash
# Dans php.ini, décommentez :
extension=zip
```

### Problème de permission sur vendor/

**Solution :**
```bash
rm -rf vendor/
composer install
```

### Conflit de version Livewire/Filament

**Solution :**
```bash
composer require livewire/livewire:^3.5
composer require filament/filament:^3.0
```

### Erreur 500 après migration

**Solution :**
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan optimize
```

---

##  FAQ

**Comment réinitialiser complètement l'application ?**

```bash
php artisan migrate:fresh --seed
php artisan cache:clear
php artisan view:clear
```

**Comment créer un nouvel administrateur ?**

```bash
php artisan make:filament-user
```

**Comment modifier les informations d'un utilisateur ?**

Connectez-vous au panneau d'administration Filament, allez dans la section "Users" (si configurée) ou modifiez directement en base de données.

**Les réservations ne s'affichent pas correctement ?**

Vérifiez que les dates sont au bon format et qu'il n'y a pas de conflits. Nettoyez le cache :
```bash
php artisan cache:clear
php artisan view:clear
```

**Comment ajouter des propriétés de test ?**

Utilisez les seeders :
```bash
php artisan db:seed --class=PropertySeeder
```

---

##  Retour d'expérience

C'était ma première expérience avec **Livewire** et **Filament**. Voici mon ressenti :

### Points positifs
- **Livewire** : la simplicité de créer des composants dynamiques sans écrire de JavaScript
- **Filament** : la rapidité de mise en place d'un panneau d'administration complet
- **Laravel Breeze** : l'authentification prête à l'emploi et facilement personnalisable
- **Documentation** : les documentations de Livewire et Filament sont très complètes

### Défis rencontrés
- La gestion des conflits de dates pour les réservations (vérification des chevauchements)
- L'installation de Filament avec les bonnes versions de Livewire (conflit entre v3 et v4)
- La configuration des extensions PHP (intl, zip) sur XAMPP
- La traduction des statuts en français dans l'interface utilisateur

### Ce que j'ai appris
- Utilisation des composants Livewire avec `wire:model.live` pour le calcul en temps réel
- Configuration d'un panneau Filament avec des ressources personnalisées
- Gestion des relations Eloquent pour les réservations
- Validation des dates et vérification des conflits

---

##  Licence

Ce projet est réalisé dans le cadre d'un test technique.

---

##  Auteur

**Kady Merveille Maitovo**

- GitHub : [@merveillekadymaitovo-stack](https://github.com/merveillekadymaitovo-stack)

---

##  Remerciements

- [Laravel](https://laravel.com) - Framework PHP
- [Livewire](https://livewire.laravel.com) - Composants dynamiques
- [Filament](https://filamentphp.com) - Panneau d'administration
- [TailwindCSS](https://tailwindcss.com) - Framework CSS

---

##  Langues

- [Français](README.md)
- [English](README.en.md) (à venir)

---

##  Statistiques du projet

![Code Size](https://img.shields.io/github/languages/code-size/merveillekadymaitovo-stack/laravel-real-estate-booking)
![Repo Size](https://img.shields.io/github/repo-size/merveillekadymaitovo-stack/laravel-real-estate-booking)
![Last Commit](https://img.shields.io/github/last-commit/merveillekadymaitovo-stack/laravel-real-estate-booking)
```

