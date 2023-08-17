# dictionnaire de données

## Product
| Champ | Type | Spécificités | Description |
|--|--|--|--|
| Code_Product      | INT                       | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT   | Identifiant du produit |
| Title             | VARCHAR(64)               | NOT NULL                                          | Titre du produit |
| Description       | TEXT                      | NOT NULL                                          | Description du produit |
| Dimensions        | VARCHAR                   | NOT NULL                                          | Dimensions du produit |
| Price             | VARCHAR                   | NOT NULL                                          | Prix du produit |
| Picture           | VARCHAR(128)              | NOT NULL                                          | Image du produit |
| Release_Date      | VARCHAR(64)               | NOT NULL                                          | Date de mise sur la marché du produit |
| Artist            | VARCHAR(64)               | NOT NULL                                          | Nom du créateur du produit |
| Stock             | INT                       | NOT NULL                                          | Nombre de produits en stock |
| Created_At        | DATETIME IMMUTABLE        | NULL, DEFAULT CURRENT_TIMESTAMP,                  | Date de création du produit |
| Updated_At        | DATETIME IMMUTABLE        | NULL, DEFAULT CURRENT_TIMESTAMP,                  | Date de mise à jour du produit |
| Code_Type         | ENTITY                    | PRIMARY KEY, NOT NULL, UNSIGNED                   | Identifiant du type auquel le produit est rattaché |

## User
| Champ | Type | Spécificités | Description |
|--|--|--|--|
| Code_User         | INT                       | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT   | Identifiant de l'utilisateur |
| Name              | VARCHAR(64)               | NOT NULL                                          | Nom de l'utilisateur|
| Firstname         | VARCHAR(64)               | NOT NULL                                          | Prénom de l'utilisateur |
| Password          | VARCHAR(64)               | NOT NULL                                          | Mot de passe de l'utilisateur |
| Email             | VARCHAR(128)              | NOT NULL, UNIQUE                                  | Adresse mail de l'utilisateur |
| Phone             | VARCHAR(64)               | NOT NULL                                          | Numéro de téléphone de l'utilisateur |
| Address           | VARCHAR(128)              | NOT NULL                                          | Adresse postale de l'utilisateur|
| Role              | VARCHAR(64)               | NOT NULL                                          | Rôle de l'utilisateur |
| Created_At        | DATETIME IMMUTABLE        | NULL, DEFAULT CURRENT_TIMESTAMP                   | Date de création du compte utilisateur |
| Updated_At        | DATETIME IMMUTABLE        | NULL, DEFAULT CURRENT_TIMESTAMP                   | Date de mise à jour du compte utilisateur |

## Category
| Champ | Type | Spécificités | Description |
|--|--|--|--|
| Code_Category     | INT                       | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT   | Identifiant de la catégorie de produit|
| Name              | VARCHAR(64)               | NOT NULL                                          | Nom de la catégorie|
| Created_At        | DATETIME IMMUTABLE        | NULL, DEFAULT CURRENT_TIMESTAMP                   | Date de création de la catégorie|
| Updated_At        | DATETIME IMMUTABLE        | NULL, DEFAULT CURRENT_TIMESTAMP                   | Date de mise à jour de la catégorie|

## Order
| Champ | Type | Spécificités | Description |
|--|--|--|--|
| Code_Order        | INT                       | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT   | Adresse mail de l'utilisateur |
| Number            | VARCHAR(64)               | NOT NULL, UNIQUE                                  | Numéro de commande |
| Delivery_Date     | VARCHAR(64)               | NULL, UNSIGNED                                    | Date de livraison estimée|
| Created_At        | DATETIME IMMUTABLE        | NULL, DEFAULT CURRENT_TIMESTAMP                   | Date de création de la commande |
| Updated_At        | DATETIME IMMUTABLE        | NULL, DEFAULT CURRENT_TIMESTAMP                   | Date de mise à jour de la commande |
| Code_User         | ENTITY                    | PRIMARY KEY, NOT NULL, UNSIGNED                   | Identifiant de l'utilisateur ayant commandé|

## Type
| Champ | Type | Spécificités | Description |
|--|--|--|--|
| Code_Type         | INT                       | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT   | Identifiant du type de produit|
| Name              | VARCHAR(64)               | NOT NULL                                          | Nom du type de produit|
| Created_At        | DATETIME IMMUTABLE        | PRIMARY KEY, NOT NULL, UNSIGNED                   | Date de création du type|
| Updated_At        | DATETIME IMMUTABLE        | PRIMARY KEY, NOT NULL, UNSIGNED                   | Date de mise à jour du type|

## Product_Order
| Champ | Type | Spécificités | Description |
|--|--|--|--|
| Code_Product      | ENTITY                    | PRIMARY KEY, NOT NULL, UNSIGNED                   | Identifiant du produit commandé|
| Code_Order        | ENTITY                    | PRIMARY KEY, NOT NULL, UNSIGNED                   | Identifiant de la commande|

## Product_Category
| Champ | Type | Spécificités | Description |
|--|--|--|--|
| Code_Product      | ENTITY                    | PRIMARY KEY, NOT NULL, UNSIGNED                   | Identifiant du produit|
| Code_Category     | ENTITY                    | PRIMARY KEY, NOT NULL, UNSIGNED                   | Identifiant de la catégorie correspondant au produit|

## Product_Like
| Champ | Type | Spécificités | Description |
|--|--|--|--|
| Code_User         | ENTITY                    | PRIMARY KEY, NOT NULL, UNSIGNED                   | Identifiant de l'utilisateur ayant liké|
| Code_Product      | ENTITY                    | PRIMARY KEY, NOT NULL, UNSIGNED                   | Identifiant du produit liké par l'utilisateur|

