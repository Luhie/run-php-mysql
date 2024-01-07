-- create table author
CREATE TABLE author(
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(30) NOT NULL,
  profile VARCHAR(200) DEFAULT NULL,
  PRIMARY KEY(id)
);
-- check author table
DESC author;

-- insert author data
INSERT INTO author(name, profile)
  VALUES
  ('gogo', 'developer'),
  ('hate', 'DBA'),
  ('nana', 'Data scientist');

-- add author_id column in topic
ALTER TABLE topic ADD COLUMN author_id INT(11);

-- check topic TABLE
DESC topic;

-- update value
UPDATE topic SET author_id=1 WHERE id= 11;

-- check data
SELECT * FROM topic LEFT JOIN author ON topic.author_id = author.id;
