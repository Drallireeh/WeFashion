# We Fashion
Site d'e-commerce réalisé avec le framework laravel
## Initialisation du projet
- Pour commencer, veuillez créer une table mySQL nommée we_fashion.
- Ensuite, faîtes un 
```
npm init
```
- Puis un
```
npm run dev
```
- Pour finir, faites un seed
```
php artisan make:migration --seed
```
- Vous pouvez désormais lancer le projet avec
```
php artisan serve
```

## /!\ Avant chaque seed, il faut refaire la commande npm run dev /!\

## Comportements spéciaux

Il y a une gestion spéciale des dossiers images. A chaque fois qu'on modifie le nom d'une catégorie, le nom du dossier contenant les images de cette catégorie
est également changé. Lorsqu'on créer une nouvelle catégorie, un dossier est également créer. Dans le cas de la suppression, le dossier ne sera supprimer que 
s'il est vide. 

## Liste des utilisateurs enregistrés sur le site ##

#### Administrateur ####

```
Mail : admin@admin.fr
Mot de passe : admin
```

#### Visiteur ####

```
Mail : 123@hotmail.fr
Mot de passe : admin
```
