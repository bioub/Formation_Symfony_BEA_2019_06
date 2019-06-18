Exercice Société
========================

### Créer un contrôleur `SocieteController`

Utiliser la commande `generate:controller`

Ajouter 2 méthodes dans `SocieteController`
* listAction
* showAction

Utiliser les URLs suivantes

* listAction -> /societes
* showAction -> /societes/123

Faire en sorte que 123 soit paramétrable

### Dans `app/Resources/view/_navbar.html.twig`

Ajouter 1 lien vers l'action list de société dans le menu

### Créer l'entité `App\Entity\Societe`

Utiliser la commande `doctrine:generate:entity`

Par exemple avec 2 propriétés : `nom`, `ville`...

### Générer la table societe

Utiliser la commande `doctrine:schema:update --dump-sql` 
pour vérifier puis `doctrine:schema:update --force` pour la créer dans MySQL

### Ajouter des sociétés via phpMyAdmin

[http://localhost/phpmyadmin](http://localhost/phpmyadmin)

### Créer du faux texte dans les 2 templates

### Appeler les méthodes find et findAll de Doctrine puis remplacer le faux-text

Exercice Contact Update
========================

* Ajouter manuellement une méthode `updateAction` dans ContactController
* Créer un template twig associé et appeler ce template depuis l'action
* Ajouter une route sous la forme `/contacts/123/update`
* Vérifier que la page soit accessible
* L'update est un mélange de `showAction` et `createAction`, il faut récupérer le contact avec le `Repository`
et le passer au formulaire avec la méthode `setData`
* Le reste du code est très similaire à createAction (même méthode `persist` du `Manager`)
