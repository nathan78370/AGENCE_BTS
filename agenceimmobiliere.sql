Drop database if exists agenceimmobiliere;
Create database agenceimmobiliere;
Use agenceimmobiliere;

Create table users (
	id_u int(11) not null auto_increment,
	nom varchar(50),
	prenom varchar(50),
	email varchar(255) UNIQUE,
	mdp varchar(255),
	primary key (id_u)
) ENGINE=InnoDB;

Insert into users values
(1, "TEST", "Test", "test@gmail.com", "107d348bff437c999a9ff192adcb78cb03b8ddc6");

Create table logement (
	id_l int(11) not null auto_increment,
	adresse varchar(100),
	ville varchar(100),
	nbPieces int(11),
	surface decimal(5,2),
	prix decimal(9,2),
	primary key (id_l)
) ENGINE=InnoDB;

Insert into logement values
(1, "5 rue de IRIS", "Paris", 5, 150, 500000),
(2, "19 rue NANTERRE", "Marseille", 9, 200, 1000000);

Create table messages (
	id_exp int(11),
	id_dest int(11),
	contenu text,
	date_envoi datetime,
	lu int(11),
	primary key (id_exp, id_dest),
	foreign key (id_dest) references users (id_u)
) ENGINE=InnoDB;

Create table annonces (
	id_a int(11) not null auto_increment,
	date_publication datetime,
	primary key (id_a)
) ENGINE=InnoDB;

Create table type_bien (
	id_tb int(11) not null auto_increment,
	libelle varchar(50),
	primary key (id_tb)
) ENGINE=InnoDB;


