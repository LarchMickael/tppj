#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

DROP DATABASE tppjdb;
CREATE DATABASE tppjdb /*!40100 COLLATE 'utf8mb4_unicode_ci' */;
USE tppjdb;

#------------------------------------------------------------
# Table: tpj_units
#------------------------------------------------------------

CREATE TABLE tpj_units(
        unt_id    int (11) Auto_increment  NOT NULL ,
        unt_label TinyText NOT NULL ,
        ing_id    Int NOT NULL ,
        PRIMARY KEY (unt_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: tpj_countries
#------------------------------------------------------------

CREATE TABLE tpj_countries(
        cou_code  Varchar (3) NOT NULL ,
        cou_label TinyText NOT NULL ,
        rec_id    Int NOT NULL ,
        PRIMARY KEY (cou_code )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: tpj_ingredients
#------------------------------------------------------------

CREATE TABLE tpj_ingredients(
        ing_id           int (11) Auto_increment  NOT NULL ,
        ing_label        TinyText NOT NULL ,
        unt_id           Int NOT NULL ,
        unt_id_tpj_units Int NOT NULL ,
        PRIMARY KEY (ing_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: tpj_users
#------------------------------------------------------------

CREATE TABLE tpj_users(
        use_id        int (11) Auto_increment  NOT NULL ,
        use_login     Varchar (40) NOT NULL ,
        use_password  Varchar (40) NOT NULL ,
        use_lastname  TinyText ,
        use_firstname TinyText ,
        use_mail      Text ,
        PRIMARY KEY (use_id ) ,
        UNIQUE (use_login ,use_password )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: tpj_diets
#------------------------------------------------------------

CREATE TABLE tpj_diets(
        die_id    int (11) Auto_increment  NOT NULL ,
        die_label TinyText NOT NULL ,
        PRIMARY KEY (die_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: tpj_meals
#------------------------------------------------------------

CREATE TABLE tpj_meals(
        mea_id    int (11) Auto_increment  NOT NULL ,
        mea_label TinyText NOT NULL ,
        PRIMARY KEY (mea_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: tpj_recipes
#------------------------------------------------------------

CREATE TABLE tpj_recipes(
        rec_id                 int (11) Auto_increment  NOT NULL ,
        rec_label              TinyText NOT NULL ,
        rec_link               Text NOT NULL ,
        rec_tppj               Char (25) NOT NULL ,
        mea_id                 Int NOT NULL ,
        die_id                 Int NOT NULL ,
        cou_code               Varchar (3) NOT NULL ,
        cou_code_tpj_countries Varchar (3) NOT NULL ,
        PRIMARY KEY (rec_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: tpj_roles
#------------------------------------------------------------

CREATE TABLE tpj_roles(
        rol_id    int (11) Auto_increment  NOT NULL ,
        rol_label TinyText NOT NULL ,
        PRIMARY KEY (rol_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: tpj_permissions
#------------------------------------------------------------

CREATE TABLE tpj_permissions(
        per_id    int (11) Auto_increment  NOT NULL ,
        per_label TinyText NOT NULL ,
        per_desc  Text NOT NULL ,
        PRIMARY KEY (per_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: tpj_recipes_contain_ingredients
#------------------------------------------------------------

CREATE TABLE tpj_recipes_contain_ingredients(
        quantity Int NOT NULL ,
        ing_id   Int NOT NULL ,
        rec_id   Int NOT NULL ,
        PRIMARY KEY (ing_id ,rec_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: tpj_recipes_is_meals
#------------------------------------------------------------

CREATE TABLE tpj_recipes_is_meals(
        mea_id Int NOT NULL ,
        rec_id Int NOT NULL ,
        PRIMARY KEY (mea_id ,rec_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: tpj_recipes_fit_diets
#------------------------------------------------------------

CREATE TABLE tpj_recipes_fit_diets(
        rec_id Int NOT NULL ,
        die_id Int NOT NULL ,
        PRIMARY KEY (rec_id ,die_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: tpj_users_recipes
#------------------------------------------------------------

CREATE TABLE tpj_users_recipes(
        use_id Int NOT NULL ,
        rec_id Int NOT NULL ,
        PRIMARY KEY (use_id ,rec_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: tpj_roles_as_permissions
#------------------------------------------------------------

CREATE TABLE tpj_roles_as_permissions(
        rol_id Int NOT NULL ,
        per_id Int NOT NULL ,
        PRIMARY KEY (rol_id ,per_id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: tpj_users_get_roles
#------------------------------------------------------------

CREATE TABLE tpj_users_get_roles(
        use_id Int NOT NULL ,
        rol_id Int NOT NULL ,
        PRIMARY KEY (use_id ,rol_id )
)ENGINE=InnoDB;

ALTER TABLE tpj_units ADD CONSTRAINT FK_tpj_units_ing_id FOREIGN KEY (ing_id) REFERENCES tpj_ingredients(ing_id);
ALTER TABLE tpj_countries ADD CONSTRAINT FK_tpj_countries_rec_id FOREIGN KEY (rec_id) REFERENCES tpj_recipes(rec_id);
ALTER TABLE tpj_ingredients ADD CONSTRAINT FK_tpj_ingredients_unt_id_tpj_units FOREIGN KEY (unt_id_tpj_units) REFERENCES tpj_units(unt_id);
ALTER TABLE tpj_recipes ADD CONSTRAINT FK_tpj_recipes_cou_code_tpj_countries FOREIGN KEY (cou_code_tpj_countries) REFERENCES tpj_countries(cou_code);
ALTER TABLE tpj_recipes_contain_ingredients ADD CONSTRAINT FK_tpj_recipes_contain_ingredients_ing_id FOREIGN KEY (ing_id) REFERENCES tpj_ingredients(ing_id);
ALTER TABLE tpj_recipes_contain_ingredients ADD CONSTRAINT FK_tpj_recipes_contain_ingredients_rec_id FOREIGN KEY (rec_id) REFERENCES tpj_recipes(rec_id);
ALTER TABLE tpj_recipes_is_meals ADD CONSTRAINT FK_tpj_recipes_is_meals_mea_id FOREIGN KEY (mea_id) REFERENCES tpj_meals(mea_id);
ALTER TABLE tpj_recipes_is_meals ADD CONSTRAINT FK_tpj_recipes_is_meals_rec_id FOREIGN KEY (rec_id) REFERENCES tpj_recipes(rec_id);
ALTER TABLE tpj_recipes_fit_diets ADD CONSTRAINT FK_tpj_recipes_fit_diets_rec_id FOREIGN KEY (rec_id) REFERENCES tpj_recipes(rec_id);
ALTER TABLE tpj_recipes_fit_diets ADD CONSTRAINT FK_tpj_recipes_fit_diets_die_id FOREIGN KEY (die_id) REFERENCES tpj_diets(die_id);
ALTER TABLE tpj_users_recipes ADD CONSTRAINT FK_tpj_users_recipes_use_id FOREIGN KEY (use_id) REFERENCES tpj_users(use_id);
ALTER TABLE tpj_users_recipes ADD CONSTRAINT FK_tpj_users_recipes_rec_id FOREIGN KEY (rec_id) REFERENCES tpj_recipes(rec_id);
ALTER TABLE tpj_roles_as_permissions ADD CONSTRAINT FK_tpj_roles_as_permissions_rol_id FOREIGN KEY (rol_id) REFERENCES tpj_roles(rol_id);
ALTER TABLE tpj_roles_as_permissions ADD CONSTRAINT FK_tpj_roles_as_permissions_per_id FOREIGN KEY (per_id) REFERENCES tpj_permissions(per_id);
ALTER TABLE tpj_users_get_roles ADD CONSTRAINT FK_tpj_users_get_roles_use_id FOREIGN KEY (use_id) REFERENCES tpj_users(use_id);
ALTER TABLE tpj_users_get_roles ADD CONSTRAINT FK_tpj_users_get_roles_rol_id FOREIGN KEY (rol_id) REFERENCES tpj_roles(rol_id);
