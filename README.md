# Clicker Master 2000

<p align="center">
    <a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a>
</p>

## Descripción del Proyecto

Clicker Master 2000 es un juego de tipo clicker en el que los jugadores acumulan puntos mediante clics. Los puntos pueden ser utilizados para comprar mejoras que aumentan la cantidad de puntos obtenidos por clic. El objetivo es maximizar los puntos y gestionar eficientemente los recursos obtenidos.

## Estado del Proyecto

El proyecto está actualmente en desarrollo. La funcionalidad principal está implementada, pero se están añadiendo nuevas características y mejoras.

## Instalación del Proyecto

Para instalar y ejecutar este proyecto en tu máquina local, sigue los siguientes pasos:

1. Clona el repositorio:
    ```sh
    git clone https://github.com/Jeison2224/CM2000
    ```

2. Navega al directorio del proyecto:
    ```sh
    cd CM2000
    ```

3. Instala las dependencias del proyecto:
    ```sh
    composer install
    npm install
    ```

4. Copia el archivo de configuración y genera la clave de la aplicación:
    ```sh
    cp .env.example .env
    php artisan key:generate
    ```

5. Configura tu archivo `.env` con las credenciales de la base de datos.

6. Ejecuta las migraciones para crear las tablas en la base de datos:
    ```sh
    php artisan migrate
    ```
7. Ejecuta las migraciones para crear las tablas en la base de datos:
    ```sh
    php artisan seeders
    ```

8. Inicia el servidor de desarrollo:
    ```sh
    php artisan serve
    npm run dev
    ```

## Funcionalidades

- Acumulación de puntos mediante clics.
- Compra de mejoras para aumentar puntos por clic.
- Almacenamiento del inventario del jugador.
- Sistema de autenticación de usuarios.
- Tablero de puntuaciones.

## Tecnologías Utilizadas

- [Laravel](https://laravel.com) - Framework de PHP para backend.
- [JavaScript](https://www.javascript.com) - JavaScript para frontend.
- [MySQL](https://www.mysql.com) - Sistema de gestión de bases de datos.
- [Tailwind CSS](https://tailwindcss.com) - Framework CSS para diseño responsivo.
- [Apache](https://httpd.apache.org) - Apache para el servidor web.

## Autor

- **José Medrano** - *Desarrollador Principal* - [Mi-github](https://github.com/Jeison2224)

## Licencia

Este proyecto está licenciado bajo la [Creative Commons](https://creativecommons.org/licenses/by-nc-nd/4.0/?ref=) - consulta el archivo LICENSE para más detalles.

