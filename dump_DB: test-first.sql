CREATE DATABASE test CHARACTER SET utf32 COLLATE utf32_general_ci;

use test;

CREATE TABLE tvseries (
    id INT NOT NULL AUTO_INCREMENT,
    description TEXT NULL,
    name VARCHAR(64) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE season (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(64) NOT NULL,
    dateStart DATETIME NOT NULL,
    dateFinish DATETIME NOT NULL,
    tvseries_id INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (tvseries_id) REFERENCES tvseries(id)
);

CREATE TABLE episode(
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(64) NULL,
    description TEXT NULL,
    season_id INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (season_id) REFERENCES season(id)
);
