# Fufu

Template pour projet web basé sur `slim 3`.

Pour toutes contribution sur github, merci de lire le document [CONTRIBUTING.md](https://github.com/Fukotaku/fufu/blob/master/CONTRIBUTING.md).


## Pre-requis

- php 5.6+
  - extension pdo
  - extension mbstring


## Librairies/outils

- [slim/twig-view](https://github.com/slimphp/Twig-View) pour la vue.
- [catfan/Medoo](https://github.com/catfan/Medoo) pour les requêtes SQL.
- [respect/validation](https://github.com/Respect/Validation) pour valider les données.
- [slim/csrf](https://github.com/slimphp/Slim-Csrf) pour la sécurisé des sessions.
- [kitchenu/slim-debugbar](https://github.com/kitchenu/Slim-DebugBar) pour une toolbar de debug.
- [digitalnature/php-ref](https://github.com/digitalnature/php-ref) pour une fonction var_dump plus optimal.
- [symfony/console](https://github.com/symfony/console) pour des commandes helpers sur console (en préparation).
- Script gulpfile.js (lib nodejs) pour la compilation less/sass/scss et minification des fichiers css/jss/images.


## Installation

Via composer

``` bash
$ composer install
```

Via npm pour le script gulp

``` bash
$ npm install
```


## Permissions

Autoriser les dossiers `cache` et `debugbar` à l'écriture (chmod 775).
