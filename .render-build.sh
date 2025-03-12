#!/usr/bin/env bash
set -eux

# Dépendances PHP
composer install --no-dev --optimize-autoloader

# Installer les dépendances JS & builder les assets
yarn install
yarn encore production

# Nettoie et mets en cache
php bin/console cache:clear
php bin/console cache:warmup

# Exécute les migrations pour la base de données
php bin/console doctrine:migrations:migrate --no-interaction
