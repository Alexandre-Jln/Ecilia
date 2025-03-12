#!/usr/bin/env bash
set -eux

# Installer les dépendances PHP
composer install --no-dev --optimize-autoloader

# Installer les dépendances JS & builder les assets
yarn install
yarn encore production

# Nettoyer et mettre en cache
php bin/console cache:clear
php bin/console cache:warmup

# Exécuter les migrations pour la base de données
php bin/console doctrine:migrations:migrate --no-interaction
