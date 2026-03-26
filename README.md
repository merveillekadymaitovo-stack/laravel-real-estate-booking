# ImmoReserv

Application de gestion de réservations immobilières — réalisée dans le cadre d'un test technique.

---

## C'est quoi ?

ImmoReserv c'est une app qui permet de parcourir des biens immobiliers, de réserver des dates avec un calcul de prix en temps réel, et de gérer ses réservations depuis un tableau de bord. Il y a aussi un panneau admin pour tout gérer côté back-office.

J'ai couvert tous les livrables demandés : auth Breeze, gestion propriétés/réservations, interface Blade + Tailwind, composant Livewire dynamique et panneau Filament.

---

## Ce que ça fait

**Côté utilisateur**
- Inscription / connexion / déconnexion (Laravel Breeze)
- Tableau de bord avec quelques métriques
- Liste des propriétés avec photos et prix par nuit
- Formulaire de réservation dynamique — le prix total se recalcule en temps réel quand on change les dates
- Page "Mes réservations" pour confirmer ou annuler
- Vérification des conflits de dates pour éviter les doubles réservations

**Panneau admin (Filament)**
- CRUD complet sur les propriétés et les réservations
- Filtres, recherche, interface traduite en français

---
---

## Captures d'écran

### Page d'authentification
<img width="1503" height="720" alt="Capture d&#39;écran 2026-03-20 222518" src="https://github.com/user-attachments/assets/08bba3f4-b47c-4dd3-a970-af13437e46f3" />
<img width="1787" height="955" alt="image" src="https://github.com/user-attachments/assets/c3d25fc3-15d9-4cac-bbab-0f1664105998" />

### Tableau de bord utilisateur
<img width="1915" height="929" alt="image" src="https://github.com/user-attachments/assets/124d064b-311f-4492-9021-9b0f190693bc" />

### Liste des propriétés
<img width="1889" height="938" alt="image" src="https://github.com/user-attachments/assets/c100ef4c-d9ab-4fe5-83ea-3993258461f0" />
<img width="1917" height="970" alt="image" src="https://github.com/user-attachments/assets/d56a6fae-22bc-4a0c-b79a-fcc1e7e0ee9f" />

### Détail d'une propriété — formulaire de réservation
<img width="1786" height="923" alt="image" src="https://github.com/user-attachments/assets/85862153-609d-42e3-a417-9be736032fe2" />
<img width="1919" height="949" alt="image" src="https://github.com/user-attachments/assets/78902e7d-26a1-4510-8eac-97b28761509b" />

### Mes réservations
<img width="1910" height="925" alt="image" src="https://github.com/user-attachments/assets/d4def4ce-fe24-407a-9b9c-260ac06606ea" />

### Panneau d'administration Filament
<img width="1892" height="897" alt="image" src="https://github.com/user-attachments/assets/db87e79f-0a44-412c-81c9-96d85052f552" />
## Stack

Laravel 11 · Breeze · Livewire 3 · Filament 3 · TailwindCSS · Alpine.js · MySQL 8.0

---

## Installation

```bash
git clone https://github.com/merveillekadymaitovo-stack/laravel-real-estate-booking.git
cd laravel-real-estate-booking

composer install
npm install

cp .env.example .env
php artisan key:generate
```

Dans `.env`, configurer la base de données :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_test
DB_USERNAME=root
DB_PASSWORD=
```

```bash
php artisan migrate --seed
npm run build
php artisan serve
```

→ [http://127.0.0.1:8000](http://127.0.0.1:8000)

Pour le panneau admin :
```bash
php artisan make:filament-user
```
Accessible sur `/admin`

---

## Base de données

Deux tables principales :

```
users ──── bookings ──── properties
           (start_date)   (price_per_night)
           (end_date)     (location)
           (total_price)  (max_guests)
           (status)       (image)
```

Statuts : `pending` · `confirmed` · `cancelled`

> J'ai ajouté quelques colonnes par rapport au sujet de base (`total_price`, `status`, `location`, `max_guests`, `image`) pour que l'expérience soit un peu plus complète.

---

## Le composant Livewire

C'est la partie que j'ai trouvée la plus intéressante. Le composant `BookingManager` utilise `wire:model.live` sur les champs de dates pour recalculer le prix en temps réel, sans écrire une ligne de JS. Les boutons de confirmation/annulation passent par `wire:click`, et la vérification des chevauchements se fait côté serveur avant toute insertion.

---

## Ce que j'ai galéré (pour être honnête)

- **Conflit Livewire v3 / Filament** : j'ai passé du temps à comprendre quelle version était compatible avec laquelle. Solution finale : `livewire/livewire:^3.5` + `filament/filament:^3.0`
- **Extensions PHP sur XAMPP** : `ext-intl` et `ext-zip` à activer à la main dans `php.ini`, j'ai cherché un moment pourquoi ça plantait
- **Les conflits de dates** : la logique de vérification des chevauchements demande de bien maîtriser Eloquent

**Ce que j'ai vraiment apprécié par contre** — Livewire pour le temps réel sans JS, et Filament pour le panneau admin : j'aurais mis des semaines à faire ça à la main. Les deux ont des docs très bien faites.

---

## Ce que j'ajouterais si j'avais plus de temps

- Système de notation des propriétés
- Emails de confirmation automatiques
- Filtrage avancé (prix, localisation…)
- Calendrier visuel des disponibilités
- Paiement en ligne (Stripe)
- API REST pour une éventuelle app mobile
- Notifications temps réel (Laravel Echo + Pusher)
- Export PDF/Excel des réservations

---

## Commandes utiles

```bash
php artisan serve                  # démarrer le serveur
php artisan migrate:fresh --seed   # réinitialiser la BDD
php artisan cache:clear            # vider le cache
php artisan test                   # lancer les tests
npm run dev                        # compiler les assets (dev)
npm run build                      # compiler les assets (prod)
```

---

**Kady Merveille Maitovo** — [@merveillekadymaitovo-stack](https://github.com/merveillekadymaitovo-stack)
