

## Instalar en local para Windows con laragon.
## Instalar laragon 
  
    - activar el servidor nginx (dejar que creé hostVirtuales Laragon), desactivar apache (todo esto en la configuracion de laragon)
    - instalar la base de datos postgres (https://www.enterprisedb.com/download-postgresql-binaries) utilizamos la version 16
        -realizar los siguientes pasos:
        -creer en el directorio donde se instalo laragon /bin/postgresql -> luego una cree una carpeta que describa la version de postgres ej. postgresql-16.1
        -descargar la version de php requerida php 8.3.2, se dirige a la carperta donde se instalo el laragon, buscar bin/php/ descomprimir los archivos en la carpeta quedando algo asi C:\laragon\bin\php\php-8.3.2-nts-Win32-vs16-x64, luego en laragon seleccionar la               version de php
    - instalar o verificar que los siguiente complementos estencomposer globalmente en sus sistema operativo Composer version 2.4.1 (verificar si laragon los instala por defecto)-> no lo instala por defecto, en windows se descarga y se instala globalmente
    - instalar npm 8.18.0 -> viene por defecto en laragon
    - instalar node  node v18.8.0, por defecto en laragon, se puede actualizar
    - activar nginx y habilitar el puerto 80 
    - desactivar apache
    - laragon por defecto puede crear virtual hosts. por lo que o que se crea el archivo en la carpeta sites-enables, aqui podemos realizar los ajustes para saber donde esta el archivo index.php, si no lo hace por defecto deberia de aputar asi en el proyecto root     
      "C:/laragon/www/panellaravel/public";

## Instala laravel si es un proyecto desde 0
    - no dirigimos al directorio general de laragon para alojar los sitios C:\laragon\www
    - abrimos una terminal y ejecutamos composer create-project laravel/laravel <nombre-app>
    - modificamos el archivo .env modificar los datos para acceso a bases de datos, entre otras cosas


            DB_CONNECTION=pgsql
            DB_HOST=127.0.0.1
            DB_PORT=5432
            DB_DATABASE=laravel_panel
            DB_USERNAME=gquijadah
            DB_PASSWORD=gquijada561
    - abrimos una terminal, nos dirigimos al directorio pricipal de laravel y ejecutamos:  php artisan key:generate

## clonar el repositorio desde Git

    - instalar Git en computador
    - nos dirigimos al directorio www de laragon creamos un directorio con el nombre del proyecto
    - abrir una terminar es esta ubicacion y ejecutar: git clone https://github.com/gersoluisquijadahennig/panel-laravel-ssbb.git
    - en la mis terminar ejcutar: composer install
    - luego:  npm install && npm rum dev 

## Instalamos AdminLTE v3 el paquete por composer para laravel - Primera vez despues despues simplemente se descarga repo
## se instala paquete Auth, por defecto de laravel
    
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


    npm install

    php artisan migrate

## comandos para implementar Git

git remote add origin URL_DEL_REPOSITORIO_EN_GITHUB
git commit -m "commit inicial en la rama main"

## instalacion de Oracle DB driver for Laravel 4|5|6|7|8|9|10 via OCI8

    - composer require yajra/laravel-oci8:^10
    - composer update
    - habilitar las extenciones de php necesarias
    - instalar cliente oracle compatible con la version de BD 11.2

## Al parecer tenemos que instalar el cliente de Oracle vamos a empezar con la version actualizada 

 Version 19.21.0.0.0
 versión del cliente coincida con la versión de tu servidor de base de datos Oracle. 

## Vamos a instalar https://laratrust.santigarcor.me/docs/8.x/installation.html
 agregar al archivo composer.json

"require": {
    "kkszymanowski/traitor": "^1.0"
}

composer update

composer require santigarcor/laratrust



