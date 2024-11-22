# Laravel Docker Standalone

## Overview
This project is a standalone Laravel application configured to run inside a Docker container. The exercise involves setting up a Laravel environment, managing migrations, and installing necessary packages for the project. It includes creating resources, managing data seeding, and running tests.

**Project created by:** Jerónimo Alvarez  
**Access the server:** [Server Link](http://example.com) (replace with actual link)
**Default user** mail:admin@admin.com pw:admin

## Guide

### Container Management
- **Build container:**  
  `docker-compose up --build -d`
- **Stop container:**  
  `docker stop laravel`
- **Delete container:**  
  `docker rm laravel`
- **Delete and down all yml:**  
  `docker-compose down`
- **Sing into Laravel container:**  
  `docker exec -it laravel bash`

### Docker Volume Management
- **List volumes:**  
  `docker volume ls`
- **Delete volume:**  
  `docker volume rm laravel-docker-standalone_mariadb_data`

### Laravel Commands
- **Create migrations:**  
  `php artisan make:migration create_customers_table`
- **Update migrations:**  
  `php artisan make:migration add_custom_fields_to_customers_table --table=customers`
- **Execute Seeders:**  
  `php artisan db:seed --class=CustomerSeeder`

### Composer & Filament Setup
- **Install Composer dependencies:**  
  `composer install`
- **Install Filament Panel:**  
  `composer require filament/filament:"^3.2" -W`
- **Install Filament resources:**  
  `php artisan filament:install --panels`
- **Create Filament User:**  
  `php artisan make:filament-user`
- **Create Filament Resource (Customer):**  
  `php artisan make:filament-resource Customer --generate`
- **Create Filament Relation Manager (Device):**  
  `php artisan make:filament-relation-manager DeviceRelationManager`

### Custom Commands & Testing
- **Create custom command (List Customers with Devices):**  
  `php artisan make:command ListCustomersWithDevices`
- **Create test for Customers:**  
  `php artisan make:test CustumerTest`
- **Run tests:**  
  `php artisan test`

## Steps to Run Project
1. Build and run the container:  
   `docker-compose up --build -d`
2. Access the Laravel container:  
   `docker exec -it laravel bash`
3. Run migrations:  
   `php artisan migrate`
4. Install Composer dependencies:  
   `composer install`
5. Install Filament Panel:  
   `composer require filament/filament:"^3.2" -W`
6. Seed the database:  
   `php artisan db:seed --class=CustomerSeeder`

