<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Agrolanza

Agrolanza es un sistema centralizado para la gestión de servicios agrícolas, diseñado para facilitar la administración de clientes, parcelas, maquinarias, productos fitosanitarios y servicios relacionados.

## Requisitos del Sistema

- PHP >= 8.1
- Composer
- Node.js y npm
- Servidor web (Apache/Nginx)
- Base de datos compatible con Laravel (MySQL, PostgreSQL, etc.)

## Instalación

1. Clona el repositorio:

   ```bash
   git clone git@github.com:ElMedusita/agrolanza.git
   cd agrolanza

2. Instala las depedencias de PHP:

    ```bash
    sudo apt install php-xml
    sudo apt install npm
    sudo apt install php-mysql
    sudo apt install composer

3. Instala las dependencias de Node.js:

   ```bash
    npm install

4. Instala paquetes de librerías necesarios para el proyecto:

    ```bash
    composer require laravel/breeze --dev
    composer require jeroennoten/laravel-adminlte
    composer require spatie/laravel-permission
    composer require barryvdh/laravel-dompdf

5. Copia el archivo .env.example y configúralo a una base de datos:

    ```bash
    cp .env.example .env

Configura las variables de entorno, como la conexión a la base de datos, en el archivo .env.

6. Genera la clave de la aplicación:

    ```bash
    php artisan key:generate

7. Ejecuta las migraciones y los seeders para configurar la base de datos:

    ```bash
    php artisan migrate --seed

8. Compila los assets de frontend:

    ```bash
    npm run dev

9. Inicia el servidor de desarrollo:

    ```bash
    php artisan serve

Accede a la aplicación en http://localhost:8000.

## Funcionalidades

Gestión de Clientes: Registro, actualización, eliminación y exportación de datos en PDF.

Gestión de Parcelas: Administración de parcelas asociadas a clientes.

Gestión de Maquinarias: Registro y mantenimiento de información sobre maquinarias.

Gestión de Productos Fitosanitarios: Consulta y administración de productos fitosanitarios.

Exportación de Datos: Generación de reportes en formato PDF.

Roles y Permisos: Control de acceso basado en roles (admin, auxiliar, etc.).

## Estructura del Proyecto

controllers: Controladores de la aplicación.

views: Vistas Blade para la interfaz de usuario.

migrations: Migraciones para la base de datos.

web.php: Definición de rutas web.

public: Archivos públicos como imágenes y scripts.

