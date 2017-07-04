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
- [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv) pour la configuration de l'environnement.
- [symfony/console](https://github.com/symfony/console) pour des commandes helpers sur console (en préparation).
- Script gulpfile.js (lib nodejs) pour la compilation less/sass/scss et minification des fichiers css/js/images.


## Installation

Via git

``` bash
$ git clone https://github.com/Fukotaku/fufu
```

Via composer

``` bash
$ composer install
```

Via npm pour le script gulp (optionnel)

``` bash
$ npm install
```


## Permissions

Autoriser les dossiers `cache` et `debugbar` à l'écriture (chmod 775).


# Guide d'utilisation

Pour bien utiliser ce template pour projet web, il est important de bien connaitre le fonctionnement de `Slim 3` et des divers librairies utilisés.
Vous avez à votre disposition, plus haut, les liens vers ces derniers pour en savoir plus.


## Commandes gulp

Le script gulp vous permet avec de simple commandes de compiler ou minifier des fichiers utiliser coté front.
Dans le dossier `src`, sont disposez les dossiers dédié au développement front dans divers langagues (less, sass, scss, css et js) mais vous pouvez aussi optimiser les images.

Pour pouvoir compiler, minifier et copier ces derniers dans le dossier `public` de votre application, il suffit de taper cette commande (après avoir fait un `npm install`)

``` bash
$ gulp build
```


## Commandes helper

In progress...
