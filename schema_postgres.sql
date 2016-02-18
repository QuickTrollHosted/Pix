CREATE TABLE  tags (
  id serial,
  tag varchar(100) NOT NULL,
  hits integer NOT NULL,
  UNIQUE (tag)
);

CREATE TABLE  uploads (
  id serial,
  "user" varchar(80) default NULL,
  description text NOT NULL,
  tags text NOT NULL,
  "public" NUMERIC(1) NOT NULL,
  name varchar(60) default NULL
);

CREATE TABLE  users (
  id serial UNIQUE,
  pseudo varchar(20) NOT NULL,
  "session" varchar(40) default NULL,
  password varchar(30) default NULL,
  membre NUMERIC(1) NOT NULL,
  ip varchar(15) NOT NULL
);

-- Replace the update on duplicate key
CREATE FUNCTION insert_on_duplicate_key_tags(tag_update TEXT, hits_tag INT) RETURNS VOID AS
$$
  BEGIN
    LOOP
      -- first try to update the key
      UPDATE tags SET hits = hits_tag WHERE tag=tag_update;
      IF found THEN
        RETURN;
      END IF;
      -- not there, so try to insert the key
      -- if someone else inserts the same key concurrently,
      -- we could get a unique-key failure
      BEGIN
        INSERT INTO tags (tag, hits) VALUES (tag_update, hits_tag);
        RETURN;
      EXCEPTION WHEN unique_violation THEN
        -- do nothing, and loop to try the UPDATE again
     END;
    END LOOP;
  END;
$$
LANGUAGE plpgsql;
