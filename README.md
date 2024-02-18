# Projet de gestion d'events en Laravel

## Events Populaires, Cat Populaires et Upcoming Events ☑️ (scopes) '/'

## Afficher tous les events ☑️ '/events'
  - Filtre par date/ville ☑️
  - Pagination ☑️
  - Gestion en back-office ☑️

## Categories ☑️ '/categories'
  - Affichage des categories ☑️
  - Afficher events d'une certaine cat ☑️
  - Lien dans Détail event pour accéder à la cat ☑️
  - Gestion en back-office

## Détail d'un event ☑️ '/events/{id}'
 - Possibilité de s'inscrire / se désinscrire ☑️
 - Visualisation des participants en back-office ☑️
 - Events proches / Similaires ☑️ (scopes)
 - Info sur l'event ☑️

## Mails 🩹
 - Email de confirmation 〰️
   - Envoie un mail dès l'inscription mais pas de lien pour annuler/confirmer, + en raw
 - Email de rappel 〰️
   - Mise en place du scheduler, job est dispatché, s'execute, mais n'envoie pas de mail

## Reviews '/events/{id}'
  - Laisser une review sur des events terminés uniquement  ☑️
  - Affichage des reviews sur évenements terminés uniquement ☑️
  - Moyenne des reviews ☑️
  - Validation d'event terminé et de nb de review unique ☑️ (fonctions dans le model Event)
  - Pagination des reviews ☑️
  - Modération en back-office ☑️

## Screenshots

![image](https://github.com/mYuutch/my-events/assets/113178225/314b51fe-78fc-4f89-812b-b05d793df363)
![image](https://github.com/mYuutch/my-events/assets/113178225/0b43cbc1-3410-4b03-bbd5-fef989bc6f34)
![image](https://github.com/mYuutch/my-events/assets/113178225/43be39be-84ba-4729-8cc6-222d842f1418)
![image](https://github.com/mYuutch/my-events/assets/113178225/10b46573-cc2b-4065-8052-0e1baf806a33)
![image](https://github.com/mYuutch/my-events/assets/113178225/314d9d1a-cfa0-487f-bea2-17fe69b1f919)





