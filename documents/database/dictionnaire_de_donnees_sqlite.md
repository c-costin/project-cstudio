# dictionnaire de données

## Product
| Champ | Type | Spécificités | Description |
|--|--|--|--|
| Code_Product      | INTEGER                   | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT   | Identifiant du produit |
| Title             | TEXT                      | NOT NULL                                          | Titre du produit |
| Description       | TEXT                      | NOT NULL                                          | Description du produit |
| Dimensions        | TEXT                      | NOT NULL                                          | Dimensions du produit |
| Price             | REAL                      | NOT NULL                                          | Prix du produit |
| Picture           | TEXT                      | NOT NULL                                          | Image du produit |
| Release_Date      | TEXT                      | NOT NULL                                          | Date de mise sur la marché du produit |
| Artist            | TEXT                      | NOT NULL                                          | Nom du créateur du produit |
| Stock             | INTEGER                   | NOT NULL                                          | Nombre de produits en stock |
| Created_At        | TEXT                      | NULL, DEFAULT CURRENT_TIMESTAMP,                  | Date de création du produit |
| Updated_At        | TEXT                      | NULL, DEFAULT CURRENT_TIMESTAMP,                  | Date de mise à jour du produit |
| Code_Type         | INTEGER                   | PRIMARY KEY, NOT NULL, UNSIGNED                   | Identifiant du type auquel le produit est rattaché |

## User
| Champ | Type | Spécificités | Description |
|--|--|--|--|
| Code_User         | INTEGER                   | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT   | Identifiant de l'utilisateur |
| Name              | TEXT                      | NOT NULL                                          | Nom de l'utilisateur|
| Firstname         | TEXT                      | NOT NULL                                          | Prénom de l'utilisateur |
| Password          | TEXT                      | NOT NULL                                          | Mot de passe de l'utilisateur |
| Email             | TEXT                      | NOT NULL, UNIQUE                                  | Adresse mail de l'utilisateur |
| Phone             | TEXT                      | NOT NULL                                          | Numéro de téléphone de l'utilisateur |
| Address           | TEXT                      | NOT NULL                                          | Adresse postale de l'utilisateur|
| Role              | TEXT                      | NOT NULL                                          | Rôle de l'utilisateur |
| Created_At        | TEXT                      | NULL, DEFAULT CURRENT_TIMESTAMP                   | Date de création du compte utilisateur |
| Updated_At        | TEXT                      | NULL, DEFAULT CURRENT_TIMESTAMP                   | Date de mise à jour du compte utilisateur |

## Category
| Champ | Type | Spécificités | Description |
|--|--|--|--|
| Code_Category     | INTEGER                   | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT   | Identifiant de la catégorie de produit|
| Name              | TEXT                      | NOT NULL                                          | Nom de la catégorie|
| Created_At        | TEXT                      | NULL, DEFAULT CURRENT_TIMESTAMP                   | Date de création de la catégorie|
| Updated_At        | TEXT                      | NULL, DEFAULT CURRENT_TIMESTAMP                   | Date de mise à jour de la catégorie|

## Order
| Champ | Type | Spécificités | Description |
|--|--|--|--|
| Code_Order        | INTEGER                   | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT   | Adresse mail de l'utilisateur |
| Number            | TEXT                      | NOT NULL, UNIQUE                                  | Numéro de commande |
| Delivery_Date     | TEXT                      | NULL, UNSIGNED                                    | Date de livraison estimée|
| Created_At        | TEXT                      | NULL, DEFAULT CURRENT_TIMESTAMP                   | Date de création de la commande |
| Updated_At        | TEXT                      | NULL, DEFAULT CURRENT_TIMESTAMP                   | Date de mise à jour de la commande |
| Code_User         | INTEGER                   | PRIMARY KEY, NOT NULL, UNSIGNED                   | Identifiant de l'utilisateur ayant commandé|

## Type
| Champ | Type | Spécificités | Description |
|--|--|--|--|
| Code_Type         | INTEGER                   | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT   | Identifiant du type de produit|
| Name              | TEXT                      | NOT NULL                                          | Nom du type de produit|
| Created_At        | TEXT                      | PRIMARY KEY, NOT NULL, UNSIGNED                   | Date de création du type|
| Updated_At        | TEXT                      | PRIMARY KEY, NOT NULL, UNSIGNED                   | Date de mise à jour du type|

## Product_Order
| Champ | Type | Spécificités | Description |
|--|--|--|--|
| Code_Product      | TEXT                      | PRIMARY KEY, NOT NULL, UNSIGNED                   | Identifiant du produit commandé|
| Code_Order        | TEXT                      | PRIMARY KEY, NOT NULL, UNSIGNED                   | Identifiant de la commande|

## Product_Category
| Champ | Type | Spécificités | Description |
|--|--|--|--|
| Code_Product      | TEXT                      | PRIMARY KEY, NOT NULL, UNSIGNED                   | Identifiant du produit|
| Code_Category     | TEXT                      | PRIMARY KEY, NOT NULL, UNSIGNED                   | Identifiant de la catégorie correspondant au produit|

## Product_Like
| Champ | Type | Spécificités | Description |
|--|--|--|--|
| Code_User         | TEXT                      | PRIMARY KEY, NOT NULL, UNSIGNED                   | Identifiant de l'utilisateur ayant liké|
| Code_Product      | TEXT                      | PRIMARY KEY, NOT NULL, UNSIGNED                   | Identifiant du produit liké par l'utilisateur|