# Routes back / API

| Méthode | URL | Description |
| AUTHENTIFICATION |
| POST | https://cstudio.fr/login_check| Se connecter à l'API |
| DOCUMENTATION |
| GET | https://cstudio.fr/doc | Afficher la documentation de l’API |
| PRODUCT |
| GET | https://cstudio.fr/api/product/ | Lister tous les produits |
| GET | https://cstudio.fr/api/product/?category={id} | Lister tous les produits par catégorie |
| GET | https://cstudio.fr/api/product/?type={id} | Lister tous les produits par type |
| POST | https://cstudio.fr/api/product/add | Ajouter un produit |
| GET | https://cstudio.fr/api/product/read/{id} | Voir un produit |
| GET | https://cstudio.fr/api/product/read/?product={id} | Trouver le produit par son nom |
| PATCH | https://cstudio.fr/api/product/edit/{id} | Modififier un produit |
| DELETE | https://cstudio.fr/api/product/delete/{id} | Supprimer un produit |
| CATEGORY |
| GET | https://cstudio.fr/api/category/ | Lister toutes les catégories |
| POST | https://cstudio.fr/api/category/add | Ajouter une catégorie |
| GET | https://cstudio.fr/api/category/read/{id} | Voir une catégorie |
| GET | https://cstudio.fr/api/category/read/?product={id} | Trouver le(s) catégorie(s) d'un produit |
| PATCH | https://cstudio.fr/api/category/edit/{id} | Modififier une catégorie |
| DELETE | https://cstudio.fr/api/category/delete/{id} | Supprimer une catégorie |
| TYPE |
| GET | https://cstudio.fr/api/type/ | Lister tous les types |
| POST | https://cstudio.fr/api/type/add | Ajouter un type |
| GET | https://cstudio.fr/api/type/read/{id} | Voir un type |
| GET | https://cstudio.fr/api/type/read/?product={id} | Trouver le(s)type (s) d'un produit|
| PATCH | https://cstudio.fr/api/type/edit/{id} | Modififier un type |
| DELETE | https://cstudio.fr/api/type/delete/{id} | Supprimer un type |
| USER |
| POST | https://cstudio.fr/api/user/add | Ajouter un utilisateur |
| GET | https://cstudio.fr/api/user/read/{id} | Voir un utilisateur |
| PATCH | https://cstudio.fr/api/user/edit/{id} | Modififier un utilisateur |
| DELETE | https://cstudio.fr/api/user/delete/{id} | Supprimer un utilisateur |

