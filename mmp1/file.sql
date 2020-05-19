--Zweck: MULTIMEDIAPROJEKT 1
--Studiengang: MultiMediaTechnology @ FH Salzburg
--Autor: Ismail Halili
--Email: ihalili.mmt-b2019@fh-salzburg.ac.at

create table summoners(
    name VARCHAR(100) PRIMARY KEY,
    level INTEGER,
    tier VARCHAR(20),
    rank VARCHAR(20),
    wins INTEGER,
    losses INTEGER,
    lp INTEGER,
    favchamp1 VARCHAR(30),
    favchamp2 VARCHAR(30),
    favchamp3 VARCHAR(30),
    role1 VARCHAR(10),
    role2 VARCHAR(10),
    quote text,
    lastupdate TIMESTAMP NOT NULL DEFAULT now()
);


create table users(
    id SERIAL,
    username VARCHAR(50) PRIMARY KEY,
    password text,
    summoner VARCHAR(100) REFERENCES summoners(name) ON DELETE CASCADE ON UPDATE CASCADE
);

create table visited(
  user1 VARCHAR(50) NOT NULL REFERENCES users(username) ON DELETE CASCADE ON UPDATE CASCADE ,
  user2 VARCHAR(50) NOT NULL REFERENCES users(username) ON DELETE CASCADE ON UPDATE CASCADE ,
  timestamp TIMESTAMP DEFAULT now(),
  PRIMARY KEY (user1, user2)
);


create table duo_requests(
  from_id VARCHAR(50) NOT NULL,
  to_id VARCHAR(50) NOT NULL, 
  timestamp TIMESTAMP DEFAULT now(),
  FOREIGN KEY(from_id, to_id) REFERENCES visited (user1, user2) ON DELETE CASCADE ON UPDATE CASCADE
);

create table duo_partners(
  user1 VARCHAR(50) NOT NULL REFERENCES  users(username) ON DELETE CASCADE ON UPDATE CASCADE,
  user2 VARCHAR(50) NOT NULL REFERENCES  users(username) ON DELETE CASCADE ON UPDATE CASCADE,
  timestamp TIMESTAMP DEFAULT now(),
  PRIMARY KEY(user1, user2)
);

create table chat_messages(
  message_id SERIAL PRIMARY KEY, 
  from_user VARCHAR(50) NOT NULL REFERENCES  users(username) ON DELETE CASCADE ON UPDATE CASCADE,
  to_user VARCHAR(50) NOT NULL REFERENCES  users(username) ON DELETE CASCADE ON UPDATE CASCADE,
  message text NOT NULL,
  timestamp TIMESTAMP DEFAULT now()
);
