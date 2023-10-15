# Routes back / API

| Méthode           | URL | Description                        |
| ----------------- | --- | ---------------------------------- |
| **DOCUMENTATION** |     |                                    |
| GET               | /   | Afficher la documentation de l’API |

| Méthode              | URL              | Description          |
| -------------------- | ---------------- | -------------------- |
| **AUTHENTIFICATION** |                  |                      |
| POST                 | /api/login_check | Se connecter à l'API |

| Méthode      | URL                              | Description                           |
| ------------ | -------------------------------- | ------------------------------------- |
| **CATEGORY** |                                  |                                       |
| GET          | /api/category/                   | Lister toutes les catégories          |
| GET          | /api/category/?category={string} | Trouver des catégories via une string |
| GET          | /api/category/{id}               | Voir une catégorie                    |
| PATCH        | /api/category/edit/{id}          | Modififier une catégorie              |
| POST         | /api/category/add                | Ajouter une catégorie                 |
| DELETE       | /api/category/delete/{id}        | Supprimer une catégorie               |

| Méthode  | URL                                     | Description                                     |
| -------- | --------------------------------------- | ----------------------------------------------- |
| **LIKE** |                                         |                                                 |
| GET      | /api/like/?user={id}                    | Lister tous les coup de coeurs de l'utilisateur |
| POST     | /api/like/add?product={id}&user={id}    | Ajouter un coup de coeur d'un produit           |
| DELETE   | /api/like/delete?product={id}&user={id} | Supprimer un coup de coeur d'un produit         |

| Méthode   | URL                   | Description                                     |
| --------- | --------------------- | ----------------------------------------------- |
| **ORDER** |                       |                                                 |
| GET       | /api/order/           | Listes de toutes les commandes                  |
| GET       | /api/order/?user={id} | Listes de toutes les commandes d'un utilisateur |
| POST      | /api/order/add        | Ajout d'une commande d'un utilisateur           |

| Méthode     | URL                            | Description                            |
| ----------- | ------------------------------ | -------------------------------------- |
| **PRODUCT** |                                |                                        |
| GET         | /api/product/                  | Lister tous les produits               |
| GET         | /api/product/?home             | Lister les produits de la page home    |
| GET         | /api/product/?category={id}    | Lister tous les produits par catégorie |
| GET         | /api/product/?type={id}        | Lister tous les produits par type      |
| GET         | /api/product/?product={string} | Trouver des produits via une string    |
| GET         | /api/product/{id}              | Voir un produit                        |
| PATCH       | /api/product/edit/{id}         | Modififier un produit                  |
| POST        | /api/product/add               | Ajouter un produit                     |
| DELETE      | /api/product/delete/{id}       | Supprimer un produit                   |

| Méthode  | URL                      | Description                      |
| -------- | ------------------------ | -------------------------------- |
| **TYPE** |                          |                                  |
| GET      | /api/type/               | Lister tous les types            |
| GET      | /api/type/?type={string} | Trouver des types via une string |
| GET      | /api/type/{id}           | Voir un type                     |
| PATCH    | /api/type/edit/{id}      | Modififier un type               |
| POST     | /api/type/add            | Ajouter un type                  |
| DELETE   | /api/type/delete/{id}    | Supprimer un type                |

| Méthode  | URL                   | Description               |
| -------- | --------------------- | ------------------------- |
| **USER** |                       |                           |
| GET      | /api/user/{id}        | Voir un utilisateur       |
| PATCH    | /api/user/edit/{id}   | Modififier un utilisateur |
| POST     | /api/user/add         | Ajouter un utilisateur    |
| DELETE   | /api/user/delete/{id} | Supprimer un utilisateur  |
