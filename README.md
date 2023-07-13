# Vilt - Work in progress

Vilt is an open-source repository designed to provide a comprehensive and customizable starting point for development projects. It offers a solid foundation with a wide range of common features, eliminating the need to build everything from scratch. Whether you're an experienced developer or just starting out, Vilt aims to simplify and accelerate your application development process.

The primary objective of this project is to provide a well-structured and well-documented template that can be easily tailored to meet your specific project requirements. Vilt is designed to be lightweight, flexible, and easy to configure, allowing you to quickly set up and start building your applications without unnecessary dependencies.

Vilt encourages and welcomes contributions from the community. If you have any ideas, suggestions, or improvements, we invite you to actively participate by opening an issue or submitting a pull request. The collective effort of the community will help us create and maintain a "best practice" template for Laravel and Vue.js development.

## Demo

Check out our demo to see Vilt in action: Soon

Demo Credentials:

- Email: demo@example.com
- Password: password

## Stack

Vilt is built on the following technologies and frameworks:

- [Vue.js](https://vuejs.org/)
- [Inertia.js](https://inertiajs.com/)
- [Laravel](https://laravel.com/)
- [Tailwind CSS](https://tailwindcss.com/)

These technologies provide a powerful combination for creating modern and efficient web applications. By leveraging their capabilities, Vilt aims to enhance the development experience and promote best practices in Laravel and Vue.js development.

## Key Features
- [x] No extra dependancies
- [x] Localization
- [x] `<script setup>` syntax.
- [ ] A collection of most common Vue and Tailwind CSS components
- [ ] Wisiwig editor
- [ ] Data tables
- [ ] Dark mode
- [ ] Admin section
- [ ] Role based access control
- [ ] Two-factor authentication
- [ ] API authentication
- [ ] Documentation

## Generate CRUD
Vilt provides a simple command to generate CRUD scaffolding for your models. The command will generate the following files:

- Model
- Migration
- Factory
- Controller in `app/Http/Controllers/{section}/{model}Controller.php`
- Views in `resources/js/Pages/{section}/{model}`
- Routes in `routes/{section}.php`

To generate CRUD scaffolding for a model, run the following command:

```sh
php artisan vilt:crud {model} --section
```

For example, to generate CRUD scaffolding for a `Post` model in the `Admin` section, run the following command:

```sh
php artisan vilt:crud Post --admin
```


## Installation
1. Clone the repository
	```sh
	git clone 
	```
2. Install composer dependencies
	```sh
	composer install
	```
3. Install npm dependencies
	```sh
	npm install
	```
4. Create .env file
	```sh
	cp .env.example .env
	```
5. Generate app key
	```sh
	php artisan key:generate
	```
6. Migration
	```sh
	php artisan migrate
	```
7. Run the database seeder
	```sh
	php artisan db:seed
	```
8. Work!
	```sh
	npm run dev
	```

