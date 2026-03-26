# ImmoReserv

![Status](https://img.shields.io/badge/status-terminé-brightgreen)
![Laravel](https://img.shields.io/badge/Laravel-11-red)
![Livewire](https://img.shields.io/badge/Livewire-3-blue)
![Filament](https://img.shields.io/badge/Filament-3-teal)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3-06B6D4)
![PHP Version](https://img.shields.io/badge/PHP-8.2-blue)

Application de réservation immobilière réalisée dans le cadre d'un test technique.

---

## C'est quoi le projet ?

ImmoReserv est une appli web de gestion de réservations immobilières. Les utilisateurs peuvent parcourir des biens, réserver des dates avec un **calcul de prix en temps réel**, et gérer leurs réservations depuis un tableau de bord. Il y a aussi un **panneau admin complet** pour gérer biens et réservations.

C'était ma première vraie plongée dans **Livewire** et **Filament**, deux technos que je ne connaissais pas avant ce projet.

---

## Fonctionnalités

### Côté utilisateur
- Inscription / connexion (Laravel Breeze)
- Tableau de bord personnel avec métriques
- Liste et détail des biens disponibles
- Formulaire de réservation avec calcul automatique du prix total selon les dates
- Gestion de ses réservations (confirmation, annulation)
- Détection des conflits de dates pour éviter les doubles réservations

### Panneau admin (Filament)
- CRUD complet sur les biens
- CRUD complet sur les réservations
- Filtres et recherche avancée
- Interface responsive, traduite en français

---

## Stack technique

| Technologie | Utilité |
|---|---|
| Laravel 11 | Framework principal |
| Livewire 3 | Composants dynamiques sans JS — ma grande découverte |
| Filament 3 | Panneau admin prêt à l'emploi |
| Laravel Breeze | Auth rapide et personnalisable |
| TailwindCSS 3 | Design responsive |
| MySQL 8.0 | Base de données |

---

## Lancer le projet en local

### 1. Cloner le dépôt

```bash
git clone https://github.com/merveillekadymaitovo-stack/laravel-real-estate-booking.git
cd laravel-real-estate-booking
```

### 2. Installer les dépendances

```bash
composer install
npm install
```

### 3. Configurer l'environnement

```bash
cp .env.example .env
php artisan key:generate
```

Puis renseigner les infos de connexion dans `.env` :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_test
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Migrations + seeders

```bash
php artisan migrate --seed
```

### 5. Compiler les assets

```bash
npm run build
```

### 6. Démarrer

```bash
php artisan serve
```

L'appli est accessible sur [http://127.0.0.1:8000](http://127.0.0.1:8000)

### 7. Créer un compte admin

```bash
php artisan make:filament-user
```

Panel accessible sur `/admin`

---

## Structure de la base de données

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

Statuts des réservations : `pending` (jaune) · `confirmed` (vert) · `cancelled` (rouge)

---

## Captures d'écran

### Page d'accueil — liste des propriétés
<img width="1889" height="938" alt="image" src="https://github.com/user-attachments/assets/c100ef4c-d9ab-4fe5-83ea-3993258461f0" />
<img width="1917" height="970" alt="image" src="https://github.com/user-attachments/assets/d56a6fae-22bc-4a0c-b79a-fcc1e7e0ee9f" />

### Détail d'une propriété — formulaire de réservation dynamique
<img width="1786" height="923" alt="image" src="https://github.com/user-attachments/assets/85862153-609d-42e3-a417-9be736032fe2" />
<img width="1919" height="949" alt="image" src="https://github.com/user-attachments/assets/78902e7d-26a1-4510-8eac-97b28761509b" />

### Tableau de bord utilisateur
<img width="1915" height="929" alt="image" src="https://github.com/user-attachments/assets/124d064b-311f-4492-9021-9b0f190693bc" />

### Mes réservations
<img width="1910" height="925" alt="image" src="https://github.com/user-attachments/assets/d4def4ce-fe24-407a-9b9c-260ac06606ea" />

### Panneau d'administration Filament
<img width="1892" height="897" alt="image" src="https://github.com/user-attachments/assets/db87e79f-0a44-412c-81c9-96d85052f552" />

---

## Ce que j'ai appris (et galéré)

**Points positifs**

- **Livewire** : `wire:model.live` pour le calcul en temps réel — plus besoin d'écrire de JS pour ça, c'est franchement pratique.
- **Filament** : un panneau admin complet en quelques lignes de config, j'aurais mis des semaines à faire ça à la main.
- **Breeze** : auth clé en main, facile à adapter.
- Les documentations de Livewire et Filament sont très bien faites.

**Ce qui m'a pris du temps**

- **Conflit Livewire v3 / Filament** : j'ai perdu du temps à comprendre quelle version était compatible avec laquelle. Solution : `composer require livewire/livewire:^3.5` + `filament/filament:^3.0`
- **Extensions PHP sur XAMPP** : `ext-intl` et `ext-zip` à activer manuellement dans `php.ini` — pas évident quand on débute.
- **Conflits de dates** : vérifier les chevauchements de réservations sans double-réserver demande de bien réfléchir à la logique Eloquent.
- La traduction des statuts en français dans l'interface utilisateur.

---

## Pistes d'amélioration

- [ ] Système de notation des propriétés
- [ ] Envoi d'e-mails de confirmation
- [ ] Filtrage avancé (prix, localisation, nombre de chambres)
- [ ] Calendrier visuel des disponibilités
- [ ] Paiement en ligne (Stripe)
- [ ] API REST pour applications mobiles
- [ ] Notifications temps réel (Laravel Echo + Pusher)
- [ ] Export des réservations en PDF/Excel

---

## Commandes utiles

| Commande | Description |
|---|---|
| `php artisan serve` | Démarrer le serveur de développement |
| `php artisan migrate:fresh --seed` | Réinitialiser la base de données |
| `php artisan cache:clear` | Vider le cache |
| `php artisan test` | Lancer les tests |
| `npm run dev` | Compiler les assets (développement) |
| `npm run build` | Compiler les assets (production) |

---

## Auteure

**Kady Merveille Maitovo** — [@merveillekadymaitovo-stack](https://github.com/merveillekadymaitovo-stack)
