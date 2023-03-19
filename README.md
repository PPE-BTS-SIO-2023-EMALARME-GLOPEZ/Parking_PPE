# Application Web de gestion des places de parking
### Contexte 
Il s'agit d'un projet de groupe réalisé en 2eme année de [BTS SIO](https://www.onisep.fr/Ressources/univers-formation/Formations/Post-bac/bts-services-informatiques-aux-organisations-option-b-solutions-logicielles-et-applications-metiers) 

### Scénario
La maisons des ligues sportives de lorraine aimerait réaliser une application web afin de pouvoir gérer l'attribution des places parking à ses employés.

### Spécification du besoin
* Le front-office doit être sécurisé et n’accepter que les demandes du personnel des ligues. 
* Les inscriptions au service de réservation de place doivent être validées (ou créées) par un administrateur.
* L’administrateur, seul utilisateur du back-office, doit pouvoir éditer la liste des places et gérer les inscriptions des utilisateurs.
* Lorsqu’un utilisateur en fait la demande, une place libre lui est est attribuée aléatoirement et immédiatement par l’application.
* la réservation expire automatiquement au bout d’une durée par défaut déterminée par l’administrateur.
* Si une demande ne peut pas être satisfaite, l’utilisateur est placé en liste d’attente.
* L’utilisateur ne peut pas choisir la date à laquelle une place lui est attribué, les réservations sont toujours immédiates. 
* Un utilisateur ne peut pas faire une demande de réservation s’il est en file d’attente ou si il occupe une place.
* Un utilisateur ou l’administateur peut fermer une réservation avant la date d’expiration prévue. 
* Lorsqu'une réservation expire l’utilisateur doit refaire une demande s’il souhaite obtenir une place.

### Technologies utilisées
Il était obligatoire d'utiliser le **framework web Laravel** , nous avons décidé d'utiliser la **[TALL stack](https://tallstack.dev/)** qui comprend les technologies suivantes : 
* [Tailwind CSS](https://tailwindcss.com/) :heavy_check_mark:
* [Alpine JS](https://alpinejs.dev/)  :heavy_check_mark:
* [Laravel](https://laravel.com/) :heavy_check_mark:
* [Livewire](https://laravel-livewire.com/) :x: <sub>(Que je n'ai finalement pas utilisé)</sub>

### Documentations ###
* Guide d'installation
* Guide d'utilisation
* Développeurs
