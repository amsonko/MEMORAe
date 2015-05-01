DROP Table IF EXISTS Admin;
DROP SEQUENCE IF EXISTS admin_pk_seq;
DROP Table IF EXISTS Media;
DROP SEQUENCE IF EXISTS media_pk_seq;
DROP Table IF EXISTS Page;
DROP SEQUENCE IF EXISTS page_pk_seq;
DROP TYPE IF EXISTS media_type ;
DROP TYPE IF EXISTS language_type;

BEGIN;

-- Table des admins
CREATE SEQUENCE admin_pk_seq;
CREATE TABLE Admin(admin_id BIGINT PRIMARY KEY DEFAULT nextval('admin_pk_seq'),email VARCHAR(255) NOT NULL UNIQUE, password VARCHAR(15) NOT NULL UNIQUE, last_name VARCHAR(255), first_name VARCHAR(255));

-- Table des pages
CREATE SEQUENCE page_pk_seq;
CREATE TABLE Page(page_id BIGINT PRIMARY KEY DEFAULT nextval('page_pk_seq'), page_name VARCHAR(255)); 

-- Table des Contenus de pages
CREATE SEQUENCE media_pk_seq;
CREATE TYPE media_type AS ENUM ('file', 'text', 'video', 'image');
CREATE TYPE language_type AS ENUM('fr', 'en');
CREATE TABLE Media (media_id BIGINT PRIMARY KEY DEFAULT nextval('media_pk_seq'),media_name VARCHAR(255), media_path TEXT, media_content TEXT, current_media media_type, media_language language_type NOT NULL, page_id BIGINT NOT NULL, FOREIGN KEY(page_id) REFERENCES Page(page_id));

COMMIT;
