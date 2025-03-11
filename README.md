# Calcul de Bonus - Projet Symfony

## Description

Application web développée avec **Symfony** pour calculer un bonus/malus en fonction de trois paramètres :
- **Bonus initial**.
- **Nombre d'années sans accident**.
- **Nombre d'accidents responsables**.

Le résultat est calculé en appliquant une réduction de 5% par année sans accident et un malus de 25% par accident responsable. Le résultat est affiché sous forme de notification après soumission du formulaire.

## Fonctionnalités clés

- **Calcul du bonus/malus** : Application des règles de calcul avec validation des entrées.
- **Gestion des erreurs** : Affichage des messages d'erreur en cas de saisie invalide.
- **Interface utilisateur simple** : Formulaire intuitif et résultat clairement affiché.
- **Utilisation des sessions** : Stockage temporaire du résultat pour éviter les re-soumissions.

## Technologies utilisées

- **Symfony** : Framework PHP pour la structure et la logique métier.
- **Twig** : Moteur de templates pour l'affichage des vues.
- **Bulma** : Framework CSS pour le style de l'interface.
- **Webpack Encore** : Gestion des assets (CSS/JS).
