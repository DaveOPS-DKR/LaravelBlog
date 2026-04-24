# Blog TP — Laravel 10

Mini-blog avec authentification, relations One-to-Many, upload d'image et envoi d'email.

**Stack :** Laravel 10, Breeze, Eloquent ORM, Mailable, Storage, MySQL

---

## Prérequis

- PHP 8.1+
- Composer
- Node.js
- MySQL (Laragon recommandé)
- Compte Mailtrap

---

## Installation

### 1. Cloner le projet

```bash
git clone https://github.com/DaveOPS-DKR/LaravelBlog.git
cd LaravelBlog
```

### 2. Installer les dépendances

```bash
composer install
npm install && npm run build
```

### 3. Configurer l'environnement

```bash
cp .env.example .env
php artisan key:generate
```

Ouvrir `.env` et configurer :

```env
DB_DATABASE=blog_tp
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=votre_username_mailtrap
MAIL_PASSWORD=votre_password_mailtrap
MAIL_FROM_ADDRESS=noreply@blog.com
MAIL_FROM_NAME="Blog TP"
```

### 4. Créer la base de données

Créer une base de données `blog_tp` dans MySQL/HeidiSQL.

### 5. Lancer les migrations et le seeder

```bash
php artisan migrate
php artisan db:seed
php artisan storage:link
```

### 6. Démarrer le serveur

```bash
php artisan serve
```

Ouvrir **http://localhost:8000**

---

## Fonctionnalités

- Inscription, connexion, déconnexion
- Création, modification, suppression d'articles
- Upload d'image de couverture
- Catégorisation des articles (One-to-Many)
- Email de confirmation à chaque publication

---

## Auteur

**Daouda Diaby** — Institut Polytechnique Panafricain (IPP)
