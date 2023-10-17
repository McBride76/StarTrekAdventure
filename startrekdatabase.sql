DROP DATABASE startrekadventure;

CREATE DATABASE startrekadventure;
USE startrekadventure;

CREATE TABLE races (
    race_id TINYINT UNSIGNED AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    PRIMARY KEY (race_id)
);

CREATE TABLE characters (
    character_id MEDIUMINT UNSIGNED AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    fk_race_id TINYINT UNSIGNED NOT NULL,
    gender VARCHAR(1),
    credits INT UNSIGNED DEFAULT 0,
    PRIMARY KEY (character_id),
    FOREIGN KEY (fk_race_id) REFERENCES races(race_id)
);

CREATE TABLE players (
    player_id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(40) NOT NULL,
    email VARCHAR(60) NOT NULL,
    pass VARCHAR(256) NOT NULL,
    active CHAR(32),
    registration_date DATETIME NOT NULL,
    fk_character_id MEDIUMINT UNSIGNED,
    hasCharacter BOOLEAN DEFAULT 0,
    PRIMARY KEY (player_id),
    FOREIGN KEY (fk_character_id) REFERENCES characters(character_id)
);

INSERT INTO races (name)
VALUES 
    ('Human'),
    ('Vulcan'),
    ('Klingon'),
    ('Betazoid'),
    ('Ferengi');