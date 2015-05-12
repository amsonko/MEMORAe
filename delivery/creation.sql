DROP Table IF EXISTS Admin;
DROP SEQUENCE IF EXISTS admin_pk_seq;
DROP Table IF EXISTS Media;
DROP SEQUENCE IF EXISTS media_pk_seq;
DROP Table IF EXISTS Page;
DROP SEQUENCE IF EXISTS page_pk_seq;
DROP TYPE IF EXISTS media_type ;
DROP TYPE IF EXISTS language_type;

BEGIN;

--Séquences pour les clefs primaires

CREATE SEQUENCE media_pk_seq INCREMENT BY 1 MINVALUE 1 START 1;
CREATE SEQUENCE page_pk_seq INCREMENT BY 1 MINVALUE 1 START 1;
CREATE SEQUENCE section_pk_seq INCREMENT BY 1 MINVALUE 1 START 1;
CREATE SEQUENCE admin_pk_seq INCREMENT BY 1 MINVALUE 1 START 1;



--Les médias

CREATE TABLE Media (media_id BIGINT NOT NULL, page_id BIGINT NOT NULL, section_id BIGINT DEFAULT NULL, media_name VARCHAR(255) DEFAULT NULL, media_path TEXT DEFAULT NULL, media_content TEXT DEFAULT NULL, media_type VARCHAR(255) DEFAULT NULL, media_language VARCHAR(255) NOT NULL, PRIMARY KEY(media_id));
CREATE INDEX IDX_ABED8E08C4663E4 ON Media (page_id);
CREATE INDEX IDX_ABED8E08D823E37A ON Media (section_id);

--Les pages 

CREATE TABLE Page (page_id BIGINT NOT NULL, page_name VARCHAR(255) NOT NULL, PRIMARY KEY(page_id));


-- Les sections 
CREATE TABLE Section (section_id BIGINT NOT NULL, section_name VARCHAR(255) NOT NULL, PRIMARY KEY(section_id));


--Les admins

CREATE TABLE Admin (admin_id BIGINT NOT NULL, username VARCHAR(255) NOT NULL, username_canonical VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, email_canonical VARCHAR(255) NOT NULL, enabled BOOLEAN NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, locked BOOLEAN NOT NULL, expired BOOLEAN NOT NULL, expires_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, confirmation_token VARCHAR(255) DEFAULT NULL, password_requested_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, roles TEXT NOT NULL, credentials_expired BOOLEAN NOT NULL, credentials_expire_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, PRIMARY KEY(admin_id));
CREATE UNIQUE INDEX UNIQ_49CF227292FC23A8 ON Admin (username_canonical);
CREATE UNIQUE INDEX UNIQ_49CF2272A0D96FBF ON Admin (email_canonical);
COMMENT ON COLUMN Admin.roles IS '(DC2Type:array)';

--Les clefs étrangères

ALTER TABLE Media ADD CONSTRAINT FK_ABED8E08C4663E4 FOREIGN KEY (page_id) REFERENCES Page (page_id) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE Media ADD CONSTRAINT FK_ABED8E08D823E37A FOREIGN KEY (section_id) REFERENCES Section (section_id) NOT DEFERRABLE INITIALLY IMMEDIATE;

COMMIT;
