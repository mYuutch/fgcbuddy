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

### Index 
![image](https://github.com/mYuutch/my-events/assets/113178225/c1de27bd-5e20-44d1-bdf3-7e31655b13bd)

### Events
![image](https://github.com/mYuutch/my-events/assets/113178225/d7da0890-15fb-49b7-9d71-d27a2715c054)

### Event terminé 
![image](https://github.com/mYuutch/my-events/assets/113178225/cf870bc0-ee3a-4f0d-bd9d-9f5ef45a5c1d)

### Event en cours ou pas encore commencé
![image](https://github.com/mYuutch/my-events/assets/113178225/76694d60-f3b9-4ab1-b3c4-26eb9524c436)

### Categories 
![image](https://github.com/mYuutch/my-events/assets/113178225/0d056e8e-6efb-46ed-b638-a7100f03dde9)

### Events par categorie
![image](https://github.com/mYuutch/my-events/assets/113178225/52c07613-6810-427d-93fb-ba0a74dbfa3c)


### Back-office event 
![image](https://github.com/mYuutch/my-events/assets/113178225/17812b4c-a381-4743-8121-1f7ea79b6cb8)










