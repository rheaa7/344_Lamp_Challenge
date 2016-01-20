create database movies character set='UTF8';

create user moviesuser@localhost identified by 'oBUjrNWy';
grant select on movies.* to moviesuser@localhost;

use movies;

drop table if exists movies;

create table movies (
	movie_id int not null auto_increment primary key,
	title varchar(100),
    released date,
    distributor varchar (100),
    genre varchar (100),
    rating varchar (100),
    gross int,
    tickets int,
    imdb_id varchar(100),
    
    index (movie_id)
);
    
    
load data infile '~/Desktop/344_Lamp_Challenge/data/movies-2014.csv'
into table movies
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'
ignore 1 lines
(title, released, distributor, genre, rating, gross, tickets, imdb_id);




