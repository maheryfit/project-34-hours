 --Création d'utilisateur 

create user maison login password 'root'; 
create database depense_maison;
alter database depense_maison owner to maison;
 
\c depense_maison maison;

-- Liste des séquences

create sequence seq_Admin increment by 1 minvalue 1 start 1; 
create sequence seq_Utilisateurs increment by 1 minvalue 1 start 1;
create sequence seq_Beneficiaires increment by 1 minvalue 1 start 1;
create sequence seq_Categorie_depense increment by 1 minvalue 1 start 1;
create sequence seq_Depense increment by 1 minvalue 1 start 1;
create sequence seq_Entree_imprevue increment by 1 minvalue 1 start 1;

-- Liste des tables

create table Administrateurs
(
    id_admin varchar(10) DEFAULT 'AD'||nextval('seq_Admin') PRIMARY KEY,
    nom varchar(15), 
    mdp varchar(50)
);

create table Utilisateurs
(
    id_utilisateur varchar(10) DEFAULT 'UT'||nextval('seq_Utilisateurs') PRIMARY KEY,
    nom varchar(20), 
    mdp varchar(50) DEFAULT NULL, 
    salaire int DEFAULT 0, 
    statut varchar(20) DEFAULT 'employe'
);

create table Beneficiaires
(
    id_beneficiaire varchar(10) DEFAULT 'BEN'||nextval('seq_Beneficiaires') PRIMARY KEY, 
    nom varchar(15),
 	  id_utilisateur varchar(10) references Utilisateurs(id_utilisateur), 
    relation varchar(15),
    statut varchar(20) DEFAULT 'valide'
);

create table Categorie_depense
(
    id_categorie varchar(10) DEFAULT 'CATDEP'||nextval('seq_Categorie_depense') PRIMARY KEY, 
 	  nom varchar(20), 
    budget int
);

create table Depense
(
    id_depense varchar(10) DEFAULT 'DEP'||nextval('seq_Depense') PRIMARY KEY, 
    daty date,
    id_categorie varchar(10) references Categorie_depense(id_categorie), 
    montant int,
    id_beneficiaire varchar(10) references Beneficiaires(id_beneficiaire)
);

create table Entree_imprevue 
(
    id_entree varchar(10) DEFAULT 'ETI'||nextval('seq_Entree_imprevue') PRIMARY KEY,
    motif varchar(15),
	  daty date, 
    montant int,
    id_utilisateur varchar(10) references Utilisateurs(id_utilisateur)
);


insert into Administrateurs (nom, mdp) values ('rakoto', (select md5('rakoto')));
insert into Administrateurs (nom, mdp) values ('ravao', (select md5('ravao')));
insert into Administrateurs (nom, mdp) values ('rasoa', (select md5('rasoa')));  

insert into Utilisateurs (nom, mdp, salaire, statut) values ('Jean', (select md5('jean')), 600000, 'employe');
insert into Utilisateurs (nom, mdp, salaire, statut) values ('Jeanne', (select md5('jeanne')), 700000, 'employe');
insert into Utilisateurs (nom, mdp, salaire, statut) values ('Luc', (select md5('luc')), 0, 'vire');
-- insert into Utilisateurs (nom, mdp, salaire, statut) values ('Soa', (select md5('soa')), 0, 'beneficiaire');
-- insert into Utilisateurs (nom, mdp, salaire, statut) values ('Emile', (select md5('emile')), 0, 'beneficiaire');

insert into Beneficiaires values('BEN'||nextval('seq_Beneficiaires'), 'Soa', 'UT1', 'fille', 'valide');
insert into Beneficiaires values('BEN'||nextval('seq_Beneficiaires'), 'Ed', 'UT3', 'fils', 'non-valide');
insert into Beneficiaires values('BEN'||nextval('seq_Beneficiaires'), 'Luc', 'UT2', 'fils', 'valide');
insert into Beneficiaires values('BEN'||nextval('seq_Beneficiaires'), 'Herve', 'UT1', 'famille', 'valide');
insert into Beneficiaires values('BEN'||nextval('seq_Beneficiaires'), 'Lucie', 'UT2', 'famille', 'valide');
insert into Beneficiaires values('BEN'||nextval('seq_Beneficiaires'), 'Marc', 'UT2', 'famille', 'valide');

   	 
insert into Categorie_depense values('CATDEP'||nextval('seq_Categorie_depense') , 'nourriture' , 400000);
insert into Categorie_depense values('CATDEP'||nextval('seq_Categorie_depense') , 'deplacement' , 600000);
insert into Categorie_depense values('CATDEP'||nextval('seq_Categorie_depense') , 'etude' , 800000);

insert into Depense values('DEP'||nextval('seq_Depense'), '2022-07-15', 'CATDEP1', 58900, 'BEN1');
insert into Depense values('DEP'||nextval('seq_Depense'), '2022-08-20', 'CATDEP1', 60000, 'BEN1');
insert into Depense values('DEP'||nextval('seq_Depense'), '2022-09-09', 'CATDEP1', 80000, 'BEN3');
insert into Depense values('DEP'||nextval('seq_Depense'), '2022-09-20', 'CATDEP2', 75900, 'BEN5');
insert into Depense values('DEP'||nextval('seq_Depense'), '2022-11-19', 'CATDEP3', 120000, 'BEN3');

insert into Entree_imprevue values('ETI'||nextval('seq_Entree_imprevue'), 'Loto', '2022-01-25' , 89500 , 'UT1');
insert into Entree_imprevue values('ETI'||nextval('seq_Entree_imprevue'), 'Trosavoaloha', '2022-02-23' , 100000 , 'UT1');
insert into Entree_imprevue values('ETI'||nextval('seq_Entree_imprevue'), 'Famangiana', '2022-08-05' , 200000 , 'UT3');
