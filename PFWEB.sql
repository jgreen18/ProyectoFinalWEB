DROP DATABASE IF EXISTS PFWEB;
CREATE DATABASE PFWEB;
USE PFWEB;


 CREATE TABLE users (
  id int(11) primary key NOT NULL auto_increment,
		  name varchar(255) NOT NULL,
		  nickname varchar(25) not null,
		  email varchar(255) NOT NULL,
		  password varchar(255) NOT NULL,
		  status varchar(255) NOT NULL DEFAULT 'active',
		  created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
		) ENGINE=InnoDB	;

  select * from users;