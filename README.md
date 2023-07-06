# Vilt

Vilt is an open-source repository designed to kickstart your development projects with ease. It provides a comprehensive set of common features, eliminating the need to start from scratch. Whether you're an experienced developer or just getting started, Vilt offers a solid foundation for your applications.

## Stack
- [Vue.js](https://vuejs.org/)
- [Inertia.js](https://inertiajs.com/)
- [Laravel](https://laravel.com/)
- [Tailwind CSS](https://tailwindcss.com/)

## Key Features
- No extra dependancies
- Localization
- A collection of most common Vue and Tailwind CSS components
- Dark mode
- Admin section
- Role based access control
- Two-factor authentication
- API authentication

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

