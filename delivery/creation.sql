DROP Table IF EXISTS Admin;
DROP SEQUENCE IF EXISTS admin_pk_seq;
DROP Table IF EXISTS Media;
DROP SEQUENCE IF EXISTS media_pk_seq;
DROP Table IF EXISTS Section;
DROP SEQUENCE IF EXISTS section_pk_seq;
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

CREATE TABLE Media (
    media_id BIGINT NOT NULL DEFAULT nextval('media_pk_seq'),
    page_id BIGINT DEFAULT NULL,
    section_id BIGINT DEFAULT NULL,
    media_name VARCHAR(255) DEFAULT NULL,
    media_path TEXT DEFAULT NULL,
    media_content TEXT DEFAULT NULL,
    media_type VARCHAR(255) DEFAULT NULL,
    media_language VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY(media_id)
);

CREATE INDEX IDX_ABED8E08C4663E4 ON Media (page_id);
CREATE INDEX IDX_ABED8E08D823E37A ON Media (section_id);

--Les pages 

CREATE TABLE Page (
    page_id BIGINT NOT NULL DEFAULT nextval('page_pk_seq'),
    page_name VARCHAR(255) NOT NULL, PRIMARY KEY(page_id)
);


-- Les sections 
CREATE TABLE Section (
    section_id BIGINT NOT NULL DEFAULT nextval('section_pk_seq'),
    page_id BIGINT NOT NULL, section_name VARCHAR(255) NOT NULL,
    section_language VARCHAR(255) NOT NULL, PRIMARY KEY(section_id)
);

CREATE INDEX IDX_E2CE4373C4663E4 ON Section (page_id);

--Les admins

CREATE TABLE admin (
    admin_id bigint DEFAULT nextval('admin_pk_seq'::regclass) NOT NULL,
    username character varying(255) NOT NULL,
    username_canonical character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_canonical character varying(255) NOT NULL,
    enabled boolean NOT NULL,
    salt character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    last_login timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    locked boolean NOT NULL,
    expired boolean NOT NULL,
    expires_at timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    confirmation_token character varying(255) DEFAULT NULL::character varying,
    password_requested_at timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    roles text NOT NULL,
    credentials_expired boolean NOT NULL,
    credentials_expire_at timestamp(0) without time zone DEFAULT NULL::timestamp without time zone
);

CREATE UNIQUE INDEX UNIQ_49CF227292FC23A8 ON Admin (username_canonical);
CREATE UNIQUE INDEX UNIQ_49CF2272A0D96FBF ON Admin (email_canonical);

--Les clefs étrangères

ALTER TABLE Media ADD CONSTRAINT FK_ABED8E08C4663E4 FOREIGN KEY (page_id) REFERENCES Page (page_id) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE Media ADD CONSTRAINT FK_ABED8E08D823E37A FOREIGN KEY (section_id) REFERENCES Section (section_id) NOT DEFERRABLE INITIALLY IMMEDIATE;
ALTER TABLE Section ADD CONSTRAINT FK_E2CE4373C4663E4 FOREIGN KEY (page_id) REFERENCES Page (page_id) NOT DEFERRABLE INITIALLY IMMEDIATE;

COMMIT;
