# Routes back / API

| Méthode | URL | Description |
|--|--|--|
| **AUTHENTIFICATION** | | |
| POST | /api/login_check| Se connecter à l'API |
| | | |
| **DOCUMENTATION** | | |
| GET | /api/doc | Afficher la documentation de l’API |
| | | |
| **PRODUCT** | | |
| GET | /api/product/ | Lister tous les produits |
| GET | /api/product/?category={id} | Lister tous les produits par catégorie |
| GET | /api/product/?type={id} | Lister tous les produits par type |
| POST | /api/product/add | Ajouter un produit |
| GET | /api/product/read/{id} | Voir un produit |
| GET | /api/product/read/?product={id} | Trouver le produit par son nom |
| PATCH | /api/product/edit/{id} | Modififier un produit |
| DELETE | /api/product/delete/{id} | Supprimer un produit |
| | | |
| **CATEGORY** | | |
| GET | /api/category/ | Lister toutes les catégories |
| POST | /api/category/add | Ajouter une catégorie |
| GET | /api/category/read/{id} | Voir une catégorie |
| GET | /api/category/read/?product={id} | Trouver le(s) catégorie(s) d'un produit | 
| PATCH | /api/category/edit/{id} | Modififier une catégorie |
| DELETE | /api/category/delete/{id} | Supprimer une catégorie |
| | | |
| **TYPE** | | |
| GET | /api/type/ | Lister tous les types |
| POST | /api/type/add | Ajouter un type |
| GET | /api/type/read/{id} | Voir un type |
| GET | /api/type/read/?product={id} | Trouver le(s)type (s) d'un produit|
| PATCH | /api/type/edit/{id} | Modififier un type |
| DELETE | /api/type/delete/{id} | Supprimer un type |
| | | |
| **USER** | | |
| POST | /api/user/add | Ajouter un utilisateur |
| GET | /api/user/read/{id} | Voir un utilisateur |
| PATCH | /api/user/edit/{id} | Modififier un utilisateur |
| DELETE | /api/user/delete/{id} | Supprimer un utilisateur |
| | | |
| **LIKE** | | |
| POST | /api/like/add?product={id}&profil={id} | Ajouter un coup de coeur d'un produit |
| DELETE | /api/like/delete?product={id}&profil={id} | Supprimer un coup de coeur d'un produit |