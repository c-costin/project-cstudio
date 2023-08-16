# Routes back / API

| Méthode | URL | Description |
| AUTHENTIFICATION |
| POST | https://cstudio.fr/login_check| Se connecter à l'API |
| DOCUMENTATION |
| GET | https://cstudio.fr/doc | Afficher la documentation de l’API |
| PRODUCT |
| GET | https://cstudio.fr/api/product/ | Lister tous les produits |
| GET | https://cstudio.fr/api/product/?name={nom} | Trouver le produit par son nom |
| POST | https://cstudio.fr/api/product/add | Ajouter un produit |
| GET | https://cstudio.fr/api/product/read/{id} | Voir un produit |
| PATCH | https://cstudio.fr/api/product/edit/{id} | Modififier un produit |
| DELETE | https://cstudio.fr/api/product/delete/{id} | Supprimer un produit |
| CATEGORIE |
| GET | https://cstudio.fr/api/category/?name={nom} | Trouver le(s) catégorie(s) d'un produit |
| POST | https://cstudio.fr/api/category/add | Ajouter une catégorie |
| GET | https://cstudio.fr/api/category/read/{id} | Voir une catégorie |
| PATCH | https://cstudio.fr/api/category/edit/{id} | Modififier une catégorie |
| DELETE | https://cstudio.fr/api/category/delete/{id} | Supprimer une catégorie |
| TYPE |
| GET | https://cstudio.fr/api/type/?product={id} | Trouver le(s) type(s) d'un produit |
| POST | https://cstudio.fr/api/type/add | Ajouter un type |
| GET | https://cstudio.fr/api/type/read/{id} | Voir un type |
| PATCH | https://cstudio.fr/api/type/edit/{id} | Modififier un type |
| DELETE | https://cstudio.fr/api/type/delete/{id} | Supprimer un type |
| USER |
| GET | https://cstudio.fr/api/user/info | Retourner les infos de l’utilisateur connecté |
