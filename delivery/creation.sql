DROP Table IF EXISTS Media;
DROP SEQUENCE IF EXISTS media_pk_seq;
DROP TYPE IF EXISTS media_type ;
DROP Table IF EXISTS Page;
DROP SEQUENCE IF EXISTS page_pk_seq;

BEGIN;

CREATE SEQUENCE page_pk_seq;
CREATE TABLE Page(page_id BIGINT PRIMARY KEY DEFAULT nextval('page_pk_seq'), page_name VARCHAR(255)); 

CREATE SEQUENCE media_pk_seq;
CREATE TYPE media_type AS ENUM ('file', 'text', 'video', 'image');
CREATE TABLE Media (media_id BIGINT PRIMARY KEY DEFAULT nextval('media_pk_seq'), media_name VARCHAR(255), media_path TEXT, media_content TEXT, current_media media_type, page_id BIGINT NOT NULL, FOREIGN KEY(page_id) REFERENCES Page(page_id));

COMMIT;
