DROP DATABASE IF EXISTS PFWEB;
CREATE DATABASE PFWEB;
USE PFWEB;


 CREATE TABLE users(
			id int auto_increment primary key not null,
		  nombre varchar(255) NOT NULL,
          apellidos varchar(255) not null,
		  nick varchar(25) not null,
		  email varchar(255) NOT NULL unique,
		  password varchar(255) NOT NULL,
		  status varchar(255) NOT NULL DEFAULT 'active',
		  created_at datetime 
		) ENGINE=InnoDB	;
        
       
 
 -- insert into users(nombre, apellidos, nick, email, password) value ("javier","green","Jgreen","miguel-green@hotmail.com","123123213");

        CREATE TABLE movies (
  id int(11) NOT NULL auto_increment primary key,
  title varchar(255) NOT NULL,
  description longtext NOT NULL,
  cover varchar(255) NOT NULL,
  minutes int(11) NOT NULL,
  clasification varchar(255) NOT NULL,
  status varchar(20) default "active"
 
) ENGINE=InnoDB ;

/*insert into movies (title,description,minutes,cover,clasification) values("spiderman","sadasdsadsa",120,"asdasd","b15");
*/
	 select * from users;
	  select * from movies;
-- update movies set title = "spider2", description="4321",cover="qweqweqw",minutes = 85, clasification ="A" where id =2 ;


-- views 
select title as pelicula, minutes as duracion from movies ;

-- PROCEDIMIENTO ALMACENADO
 DROP PROCEDURE IF EXISTS cambio_estado ;
DELIMITER $$
 
CREATE PROCEDURE cambio_estado(in id int) 
BEGIN

 update movies set status = "inactive" where id = movies.id;


END$$
DELIMITER ;
 call cambio_estado(1);
 
 
 -- TRIGGER
 
  drop trigger if  exists T_Bf_create_at;
DELIMITER $$
CREATE TRIGGER T_Bf_create_at
BEFORE INSERT ON users
FOR EACH ROW
BEGIN

declare now datetime default current_timestamp();
set new.created_at = now;

END$$
DELIMITER ;
