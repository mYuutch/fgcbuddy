# Projet de gestion d'events en Laravel

## Events Populaires, Cat Populaires et Upcoming Events ☑️
Fait à l'aide de scopes dans le modèle Event

## Afficher tous les events ☑️
  - Filtre par date/ville ☑️
  - Pagination ☑️
  - Gestion en back-office ☑️

## Categories ☑️
  - Affichage des categories ☑️
  - Afficher events d'une certaine cat ☑️
  - Lien dans Détail event pour accéder à la cat ☑️
  - Gestion en back-office

## Détail d'un event ☑️
 - Possibilité de s'inscrire / se désinscrire ☑️
 - Visualisation des participants en back-office ☑️
 - Events proches / Similaires ☑️ (scopes)
 - Info sur l'event ☑️

## Mails 🩹
 - Email de confirmation 〰️
   - Envoie un mail dès l'inscription mais pas de lien pour annuler/confirmer, + en raw
 - Email de rappel 〰️
   - Mise en place du scheduler, job est dispatché, s'execute, mais n'envoie pas de mail

## Reviews
  - Laisser une review sur des events terminés uniquement  ☑️
  - Affichage des reviews sur évenements terminés uniquement ☑️
  - Validation d'event terminé et de nb de review unique ☑️ (fonctions dans le model Event)
  - Pagination des reviews ☑️
  - Modération en back-office ☑️
