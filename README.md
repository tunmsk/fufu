# Fufu

Template pour projet web basé sur `slim 3`.

Pour toutes contribution sur github, merci de lire le document [CONTRIBUTING.md](https://github.com/Fukotaku/fufu/blob/master/CONTRIBUTING.md).


## Objectifs

- [x] Répartition des routes/controlleurs/vues/middlewares.
- [x] Fichier de configuration d'environnement.
- [x] Fonctionnement de twig et du cache.
- [x] Organisation du container pour faciliter l'ajout de nouvelles librairies.
- [x] Fichier `app/config/error_pages.php` pour personnaliser les pages d'erreurs (404, 405, 500).
- [x] Commandes gulp pour faciliter le développement front-end.
- [x] Mise en place de middlewares pour le csrf, message flash et sauvegarde des inputs.
- [x] Commande via la console pour vider le cache de twig.
- [x] Commandes via la console pour créer rapidement des controlleurs/middlewares.
- [x] Mettre en place un système de migration de base de données.
- [ ] Commandes via la console pour simplifier les commandes phinx.


## Pre-requis

- php 5.6+
  - extension pdo
  - extension mbstring  


## Librairies/outils

- [slim/twig-view](https://github.com/slimphp/Twig-View) pour la vue.
- [catfan/Medoo](https://github.com/catfan/Medoo) pour les requêtes SQL.
- [respect/validation](https://github.com/Respect/Validation) pour valider les données.
- [slim/csrf](https://github.com/slimphp/Slim-Csrf) pour la sécurité des sessions.
- [digitalnature/php-ref](https://github.com/digitalnature/php-ref) pour une fonction var_dump amélioré.
- [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv) pour la configuration de l'environnement.
- [robmorgan/phinx](https://github.com/cakephp/phinx) pour les migrations.
- [symfony/console](https://github.com/symfony/console) pour des commandes console.
- Script gulpfile.js (lib nodejs) pour la compilation less/sass/scss et minification des fichiers css/js/images.


### Note

Le validateur utilisé fonctionne sur `php5.6` à l'heure ou cette note est écrite, mais depuis quelques mois la vérification `php5.6` via travis à été retiré du dépot, si jamais cette librairie commence à ne plus fonctionner correctement, merci de bien le signaler dans les issues (si possible préciser à partir de qu'elle version) il faudra alors utiliser `php7` le temps de corriger celà.


## Installation

Via git

``` bash
$ git clone https://github.com/Fukotaku/fufu
```

Via composer

``` bash
$ composer install
```

Vérifiez que le fichier `.env` a bien été créé, il s'agit du fichier de configuration de votre environnement ou vous définissez la connexion à la base de données, l'environnement `local` ou `prod` et l'activation du cache de twig.

Si jamais le fichier n'a pas été créé, faite le manuellement en dupliquant `.env.example`.

Via npm pour le script gulp (optionnel)

``` bash
$ npm install
```

Le template utilise une connexion à une base de données avec comme table d'exemple `posts`, vous devez donc créer une base de données que vous appelez comme vous le souhaitez, mais il faudra l'indiquer dans votre `.env`.

Puis vous utilisez ces commandes `phinx` pour effectuer la migration de la table `posts`

``` bash
$ vendor/bin/phinx migrate
```

``` bash
$ vendor/bin/phinx seed:run
```


## Permissions

Autoriser le dossier `cache` à l'écriture (chmod 775).


# Guide d'utilisation

Pour bien utiliser ce template pour projet web, il est important de bien connaitre le fonctionnement de `Slim 3` et des divers librairies utilisées.

Vous avez à votre disposition, plus haut, les liens vers ces derniers pour en savoir plus.


## Commandes gulp

Le script `gulpfile.js` vous permet avec de simple commandes de compiler ou minifier des fichiers utilisés coté front.

Dans le dossier `src`, sont disposez les dossiers dédiés au développement front-end dans divers langagues (less, sass, scss, css et js) mais vous pouvez aussi optimiser les images.

Pour pouvoir compiler, minifier et copier ces derniers dans le dossier `public` de votre application, il suffit de taper cette commande (après avoir fait un `npm install`)

``` bash
$ gulp build
```

D'autres commandes sont disponibles, je vous laisse regarder le script pour vous familiarisez.


## Commandes console

Le fichier `console` vous permet d'utiliser des commandes pour effectuer des actions plus rapidements.

Pour voir la liste des commandes disponibles

``` bash
$ php console list
```

Pour vider le cache de twig

``` bash
$ php console cache:clear
```

Pour générer un controller ou middleware

``` bash
$ php console generate:controller Test
```
`app/Controllers/TestController.php`

``` bash
$ php console generate:middleware Test
```
`app/Middlewares/TestMiddleware.php`


## Astuces pour debugger

Pour debugger pendant le développement de votre application, je vous recommande d'utiliser la fonction `r()` qui est un `var_dump` amélioré.

Pour les requêtes SQL avec `medoo`, vous avez la fonction `debug()`, `error()` ou encore `log()`.
