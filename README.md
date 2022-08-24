# Inventory Admin Panel

Inventory Admin Panel is a website application for managing Products supplying and records the stock supplying history for each product

## Features

Admin Authentication
1. Login
2. Logout

Category CRUD
1. Creating new category is necessarily needed to create products by its category
2. List all categories
3. Update category name
4. Delete each category(delete can't be performed if the category has products record)

Product CRUD
1. Create new product by its category
2. List all products and show the category of each product, each product show the stocks too, the default is zero because we haven't supply it yet
3. Update the product data, and we can change the category of each product too
4. Delete each product(stocks will be empty and all of it supplying history will be erased too if we choose to delete the product)

Create New Supplying Records
1. This feature is needed to record the product's stock supplying history
2. Add quantity to restock the product


## Installation

Use the package manager [composer](https://getcomposer.org/) to install.

```
composer install
npm install
npm run dev
cp .env.example .env (and then setup the environment)
php artisan key:generate
php artisan optimize
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan migrate
php artisan db:seed
```

## Usage

```
php artisan serve
```
## Login
User 1
```
Email: user@email.com
Password: user1234
```
User 2
```
Email: user2@email.com
Password: user1234
```
