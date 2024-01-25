

## Instalar en local para Windows con laragon.
## Instalar laragon 
  
    - activar el servidor nginx (dejar que creé hostVirtuales Laragon), desactivar apache (todo esto en la configuracion de laragon)
    - instalar la base de datos postgres (https://www.enterprisedb.com/download-postgresql-binaries) utilizamos la version 16
        -realizar los siguientes pasos:
        -creer en el directorio donde se instalo laragon /bin/postgresql -> luego una cree una carpeta que describa la version de postgres ej. postgresql-16.1
        -
    - instalar o verificar que los siguiente complementos estencomposer globalmente en sus sistema operativo Composer version 2.4.1 (verificar si laragon los instala por defecto)
    - instalar npm 8.18.0
    - instalar node  node v18.8.0

## Instala laravel
    - no dirigimos al directorio general de laragon para alojar los sitios C:\laragon\www
    - abrimos una terminal y ejecutamos composer create-project laravel/laravel <nombre-app>
    - modificamos el archivo .env modificar los datos para acceso a bases de datos


            DB_CONNECTION=pgsql
            DB_HOST=127.0.0.1
            DB_PORT=5432
            DB_DATABASE=laravel_panel
            DB_USERNAME=gquijadah
            DB_PASSWORD=gquijada561

## Instalamos AdminLTE v3 el paquete por composer para laravel 
    
    - composer require jeroennoten/laravel-adminlte
    - php artisan adminlte:install
    - composer require laravel/ui
    - php artisan adminlte:status

    
    +------------------+------------------------------------------+---------------+----------+
    | Package Resource | Description                              | Status        | Required |
    +------------------+------------------------------------------+---------------+----------+
    | assets           | The AdminLTE required assets             | Installed     | true     |
    | config           | The default package configuration file   | Installed     | true     |
    | translations     | The default package translations files   | Installed     | true     |
    | main_views       | The default package main views           | Not Installed | false    |
    | auth_views       | The default package authentication views | Not Installed | false    |
    | basic_views      | The default package basic views          | Not Installed | false    |
    | basic_routes     | The package routes                       | Not Installed | false    |
    +------------------+------------------------------------------+---------------+----------+


    - php artisan ui bootstrap --auth

     The [Controller.php] file already exists. Do you want to replace it? (yes/no) [no]
    ❯ yes

    - php artisan adminlte:install --only=auth_views

    The authentication views already exists. Want to replace the views? (yes/no) [no]:
    > yes



