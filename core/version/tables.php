<?php
$tables = array(
"users" => "CREATE TABLE if not exists table_to_change (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        username VARCHAR(50) NOT NULL,
        lastname VARCHAR(50) NOT NULL,
        email VARCHAR(50) unique,
	    password varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
        block tinyint(4) NOT NULL DEFAULT '0',
        sendEmail tinyint(4) DEFAULT '0',
        register_date datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
        lastvisit_date datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
        activation varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
        )",
"categories" => "CREATE TABLE if not exists table_to_change (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        category VARCHAR(30) NOT NULL,
        published tinyint(4) NOT NULL DEFAULT '0',
        pub_from datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
        pu_to datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
        )",
"articles" => "CREATE TABLE if not exists table_to_change (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        category_id INT(6) UNSIGNED,
        article VARCHAR(30) NOT NULL,
        published tinyint(4) NOT NULL DEFAULT '0'
        )",
"menu" => "CREATE TABLE if not exists table_to_change (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        parent_id INT(6),
        menu_type INT(6) UNSIGNED,
        title VARCHAR(30) NOT NULL,
        note VARCHAR(50),
        path VARCHAR(120) not null,
        home tinyint(4) NOT NULL DEFAULT '0',
        published tinyint(4) NOT NULL DEFAULT '0'
        )"
);
    