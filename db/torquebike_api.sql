-- database     
create database torquebike_api;
use torquebike_api;

create table user(
	id int auto_increment not null primary key,
	id_user text NOT NULL,
	first_name text NOT NULL,
	last_name text NOT NULL,
	email text NOT NULL,
	secret_key text NOT NULL
);

create table bikes(
	id int(11) auto_increment not null primary key,
    mark varchar(30),
    model varchar(50),
    cc varchar(6),
    year varchar(15),
    descript varchar(1000)
);


INSERT INTO bikes(mark, model, cc, year, descript) 
VALUES  ('yamaha', 'yamaha xtz', '149 cc', '2024', null),
        ('benelli', 'benilli trk 502 x', '499 cc', '2024', null),
        ('ktm', 'ktm 890 adventure R', '879 cc', '2024', null)
        ('kawasaki', 'ktm versys 650', '649 cc', '2024', null),
        ('BMW', 'BMW f 850 gs adventure', '853 cc', '2021 - 2023', null),
        ('Husqvarna', 'Husqvarna norden 901', '890 cc', '2024', null),
        ('susuki', 'susuki v-strom 650 xt', '645 cc', '2023', null),
        ('susuki', 'susuki v-strom 800 DE', '776 cc', '2024', null);
