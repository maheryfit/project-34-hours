-- create database web_s3_takalo;
-- use web_s3_takalo;

create table IF NOT EXISTS utilisateur
(
	idutilisateur int NOT NULL AUTO_INCREMENT,
	nom varchar(15) NOT NULL,
	mail varchar(80) NOT NULL,
	motdepasse varchar(80) NOT NULL,
	isadmin int, -- 0 : non, 1 : oui
    dateinscription date,
	PRIMARY KEY (idutilisateur)
) ENGINE=InnoDB DEFAULT CHARSET="utf8";

insert into utilisateur (nom, mail, motdepasse, isadmin, dateinscription) values ('boss', 'boss@gmail.com', (select sha1('boss123')), 1, now());
insert into utilisateur (nom, mail, motdepasse, isadmin, dateinscription) values ('jean', 'jean@gmail.com', (select sha1('jean123')), 0, now());
insert into utilisateur (nom, mail, motdepasse, isadmin, dateinscription) values ('jacques', 'jacques@gmail.com', (select sha1('jacques123')), 0, now());
insert into utilisateur (nom, mail, motdepasse, isadmin, dateinscription) values ('jeanne', 'jeanne@gmail.com', (select sha1('jeanne123')), 0, now());
insert into utilisateur (nom, mail, motdepasse, isadmin, dateinscription) values ('soa', 'soa@gmail.com', (select sha1('soa123')), 0, now());

create table IF NOT EXISTS categorie
(
	idcategorie int NOT NULL AUTO_INCREMENT,
	nom varchar(20),
	PRIMARY KEY (idcategorie)
) ENGINE=InnoDB DEFAULT CHARSET="utf8";

insert into categorie (nom) values ('pantalon');
insert into categorie (nom) values ('jeu video');
insert into categorie (nom) values ('DVD');
insert into categorie (nom) values ('tshirt');
insert into categorie (nom) values ('figurine');
insert into categorie (nom) values ('materiel info');

create table IF NOT EXISTS objet
(
	idobjet int NOT NULL AUTO_INCREMENT,
	idproprietaire int NOT NULL,
	titre varchar(30) NOT NULL,
    description varchar(100),
	idcategorie int NOT NULL,
	prix int NOT NULL,
	PRIMARY KEY (idobjet),
    FOREIGN KEY (idproprietaire) references utilisateur(idutilisateur),
    FOREIGN KEY (idcategorie) references categorie(idcategorie)
) ENGINE=InnoDB DEFAULT CHARSET="utf8";

insert into objet(idproprietaire, titre, description, idcategorie, prix) values (2, 'DVD pirates des caraibes', 'DVD du film original, sous blister et sans defaut', 3, 50000);
insert into objet(idproprietaire, titre, description, idcategorie, prix) values (4, 'DVD armored core', 'DVD du jeu armored core', 2, 20000);
insert into objet(idproprietaire, titre, description, idcategorie, prix) values (2, 'tshirt hippie', 'tshirt 100% coton, tres peu usé', 4, 12000);
insert into objet(idproprietaire, titre, description, idcategorie, prix) values (3, 'figurine jojo', 'figurine 15cm x 3 cm du personnage Jotaro, fait au Japon', 5, 60000);
insert into objet(idproprietaire, titre, description, idcategorie, prix) values (3, 'figurine einstein', 'mini figurine du celebre Albert Einstein', 5, 25000);
insert into objet(idproprietaire, titre, description, idcategorie, prix) values (3, 'hub USB 3.1', 'multi-port USB version 3.1, en bon etat', 6, 33000);
insert into objet(idproprietaire, titre, description, idcategorie, prix) values (5, 'CD Fifa 23', 'CD du jeu FIFA pour PS4', 2, 115000);
insert into objet(idproprietaire, titre, description, idcategorie, prix) values (2, 'souris sans fil', 'souris logitech sans fil avec dongle, etat 9/10', 6, 78000);
insert into objet(idproprietaire, titre, description, idcategorie, prix) values (4, 'survetement PSG', 'jogging avec logo PSG, coton', 1, 35000);
insert into objet(idproprietaire, titre, description, idcategorie, prix) values (5, 'pantalon militaire', 'authentique pantalon vert armé, recuperé de la seconde guerre mondiale', 1, 68000);

create table IF NOT EXISTS imageobjet
(
	idimageobjet int NOT NULL AUTO_INCREMENT,
	idobjet int NOT NULL,
	urlimage varchar(80),
    PRIMARY KEY (idimageobjet),
	FOREIGN KEY (idobjet) references objet(idobjet)
) ENGINE=InnoDB DEFAULT CHARSET="utf8";
insert into imageobjet (idobjet, urlimage) values (1, 'assets/img/dvd1.png');
insert into imageobjet (idobjet, urlimage) values (1, 'assets/img/dvd2.jpg');
insert into imageobjet (idobjet, urlimage) values (2, 'assets/img/tshirt1.jpg');
insert into imageobjet (idobjet, urlimage) values (3, 'assets/img/figurine1.png');
insert into imageobjet (idobjet, urlimage) values (4, 'assets/img/figurine2.jpg');
insert into imageobjet (idobjet, urlimage) values (5, 'assets/img/usbhub1,png');
insert into imageobjet (idobjet, urlimage) values (6, 'assets/img/dvd3.jpg');
insert into imageobjet (idobjet, urlimage) values (7, 'assets/img/souris.jpg');
insert into imageobjet (idobjet, urlimage) values (8, 'assets/img/souris1.jpg');
insert into imageobjet (idobjet, urlimage) values (9, 'assets/img/pantalon1.png');
insert into imageobjet (idobjet, urlimage) values (9, 'assets/img/pantalon2.png');
insert into imageobjet (idobjet, urlimage) values (9, 'assets/img/pantalon4.jpg');
insert into imageobjet (idobjet, urlimage) values (10, 'assets/img/pantalon3.jpg');


create table IF NOT EXISTS Echange
(
	idechange int NOT NULL AUTO_INCREMENT,
	idobjetorigine int NOT NULL,
	idobjetcible int NOT NULL,
	idproprioorigine int NOT NULL,
	idproprionouveau int NOT NULL,
    dateechange date,
	etat varchar(10), -- attente, annule, confirme
	PRIMARY KEY (idechange),
	FOREIGN KEY (idobjetorigine) references objet(idobjet),
	FOREIGN KEY (idobjetcible) references objet(idobjet),
	FOREIGN KEY (idproprioorigine) references utilisateur(idutilisateur),
	FOREIGN KEY (idproprionouveau) references utilisateur(idutilisateur)
) ENGINE=InnoDB DEFAULT CHARSET="utf8";

insert into echange (idobjetorigine, idobjetcible, idproprioorigine, idproprionouveau, dateechange, etat) values (2, 7, 4, 5, current_date(), 'attente');
insert into echange (idobjetorigine, idobjetcible, idproprioorigine, idproprionouveau, dateechange, etat) values (8, 9, 2, 4, current_date(), 'confirme');
insert into echange (idobjetorigine, idobjetcible, idproprioorigine, idproprionouveau, dateechange, etat) values (6, 1, 3, 2, current_date(), 'attente');

create or replace view v_objet_categorie as select * from objet natural join categorie;

create or replace view v_objet_image_objet as select * from objet natural join imageobjet;
--test