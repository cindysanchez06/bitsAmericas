# bitsAmericas

`git clone https://github.com/cindysanchez06/bitsAmericas`

## requisitos
- node >= 14
- yarn
- php >= 7.2.0
- composer
- symfony

## Instalacion de paquetes y dependencias
### server 
- `composer install` para instalar dependencias de PHP

###client
- `yarn install` para instalar dependencias de node

### Para correr encore (css y JS)
- `yarn encore dev`



## Ejecucion en local
### Para levantar el sevidor
- `symfony server:start` si cuenta con symfony cli
- `php -S localhost:8000 -t public/` si no cuenta con symfony cli


### Arquitectura 
- El BE esta compuesto de controladores, servicios 
- En el FE se implementan paginas que utilizan servicios para hacer peticiones al api

###
- las tecnologias que se utilizaron son:
- php >= 7.2.0
- symfony en su version 5.4


By Cindy Sanchez


