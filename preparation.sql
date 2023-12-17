CREATE DATABASE opentutorials;

use opentutorials;

CREATE TABLE topic (
  id int(11) NOT NULL AUTO_INCREMENT,
  title VARCHAR(45) NOT NULL,
  description TEXT,
  created datetime NOT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB;

SHOW TABELS;

DESC topic;