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
		  created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
		) ENGINE=InnoDB	;

 
  
 -- insert into users(nombre, apellidos, nick, email, password) value ("javier","green","Jgreen","miguel-green@hotmail.com","123123213");

        CREATE TABLE movies (
  id int(11) NOT NULL,
  title varchar(255) NOT NULL,
  description longtext NOT NULL,
  cover varchar(255) NOT NULL,
  minutes int(11) NOT NULL,
  clasification varchar(255) NOT NULL,
  category_id int(11) NOT NULL
) ENGINE=InnoDB ;

 select * from users;
  select * from movies;