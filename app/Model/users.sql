CREATE TABLE users (
  id integer SERIAL PRIMARY KEY,
  username varchar(100) NOT NULL,
  password varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
      role varchar(100)

)
