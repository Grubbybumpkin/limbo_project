/* This file shall hold all of the commands for our "Limbo" Database
Authors <Leonardo Keefe, Antonio Delveccio>
Version 1.0 */


/* create limbo db if it doesn't exist */
DROP DATABASE IF EXISTS limbo_db;
CREATE DATABASE IF NOT EXISTS limbo_db;

USE limbo_db 
/* create users table if it doesn't exist */
	DROP TABLE IF EXISTS users;
	CREATE TABLE IF NOT EXISTS users 
	(
		user_id INT NOT NULL AUTO_INCREMENT,
		user_name VARCHAR(60) NOT NULL,
		first_name VARCHAR(20) NOT NULL,
		last_name VARCHAR(40) NOT NULL,
		email VARCHAR(60) NOT NULL,
		pass CHAR(40) NOT NULL,
		reg_date DATETIME NOT NULL,
		PRIMARY KEY (user_id),
		UNIQUE(email),
		UNIQUE(user_name)
	);
/* populate user table with admin */
	INSERT INTO users (first_name, last_name, email, user_name, pass, reg_date)
		VALUES ("Leonardo", "Keefe","leonardo.keefe1@marist.edu","admin","gazelle",Now());

/* create stuff table */
	DROP TABLE IF EXISTS stuff;
	CREATE TABLE IF NOT EXISTS stuff 
	(
		id INT NOT NULL AUTO_INCREMENT,
		location_id VARCHAR(40) NOT NULL,
		description TEXT NOT NULL,
		create_date DATETIME NOT NULL,
		update_date DATETIME NOT NULL,
		room TEXT,
		owner TEXT,
		finder TEXT,
		status SET("found","lost","claimed"),
		PRIMARY KEY(id),
		CONSTRAINT FOREIGN KEY(location_id) REFERENCES location(id)
	);
/*create locations table */
	DROP TABLE IF EXISTS location;
	CREATE TABLE IF NOT EXISTS location 
	(
		id INT NOT NULL AUTO_INCREMENT,
		create_date DATETIME NOT NULL,
		update_date DATETIME NOT NULL,
		name TEXT NOT NULL,
		PRIMARY KEY(id)
	);
/* populate locations table with buildings on campus */
	INSERT INTO location (create_date,update_date,name)
		VALUES(Now(),Now(), "Tenney Stadium"),
			(Now(),Now(), "Benoit House"),
			(Now(),Now(), "Boat House"),
			(Now(),Now(), "Byrne House"),
			(Now(),Now(), "Champagnat"),
			(Now(),Now(), "Donnelly"),
			(Now(),Now(), "Dyson"),
			(Now(),Now(), "Fontaine"),
			(Now(),Now(), "Upper Fulton"),
			(Now(),Now(), "Lower Fulton"),
			(Now(),Now(), "Gartland"),
			(Now(),Now(), "Gate House"),
			(Now(),Now(), "Gregory House"),
			(Now(),Now(), "Goshen"),
			(Now(),Now(), "Greystone"),
			(Now(),Now(), "Hancock"),
			(Now(),Now(), "Kirk House"),
			(Now(),Now(), "Gregory House"),
			(Now(),Now(), "Library"),
			(Now(),Now(), "Leo"),
			(Now(),Now(), "Lowell Thomas"),
			(Now(),Now(), "Lower West Cedar"),
			(Now(),Now(), "Upper West Cedar"),
			(Now(),Now(), "Marian Hall"),
			(Now(),Now(), "McCann"),
			(Now(),Now(), "Midrise"),
			(Now(),Now(), "Mechanical Services"),
			(Now(),Now(), "Rotunda"),
			(Now(),Now(), "St. Ann's"),
			(Now(),Now(), "Student Center"),
			(Now(),Now(), "Sheahan"),
			(Now(),Now(), "St. Peter"),
			(Now(),Now(), "Steel Plant"),
			(Now(),Now(), "Off Campus");
			
			
