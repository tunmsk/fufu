<?php

// Constantes des paramètres de base de données
define("DB_TYPE", getenv('DB_TYPE')); // example: mysql, mssql, sqlite
define("DB_NAME", getenv('DB_NAME')); // example: fufu
define("DB_SERVER", getenv('DB_SERVER')); // example: localhost
define("DB_USER", getenv('DB_USER')); // example: root
define("DB_PWD", getenv('DB_PWD')); // example: root

// Variable d'environnement (local => developpement, prod => production)
define("ENV", getenv('ENV'));
