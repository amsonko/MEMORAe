BEGIN;

--Insertion des pages

INSERT INTO Page (page_id, page_name) VALUES(1,'Home');
INSERT INTO Page (page_id, page_name) VALUES(2,'Qu''est ce que Memorae');
INSERT INTO Page (page_id, page_name) VALUES(3,'Document');
INSERT INTO Page (page_id, page_name) VALUES(4,'Video');
INSERT INTO Page (page_id, page_name) VALUES(5,'Projets de recherche');
INSERT INTO Page (page_id, page_name) VALUES(6,'Thèses');
INSERT INTO Page (page_id, page_name) VALUES(7,'Publications');

INSERT INTO Section (section_id, section_name, section_language, page_id) VALUES(1,'Thesis', 'fr', 6);
INSERT INTO Section (section_id, section_name, section_language, page_id) VALUES(2,'HDR', 'fr', 6);
INSERT INTO Section (section_id, section_name, section_language, page_id) VALUES(3,'Industrial', 'fr', 5);
INSERT INTO Section (section_id, section_name, section_language, page_id) VALUES(4,'Academic', 'fr', 5);
INSERT INTO Section (section_id, section_name, section_language, page_id) VALUES(5,'Regional', 'fr', 5);
INSERT INTO Section (section_id, section_name, section_language, page_id) VALUES(6,'Books', 'fr', 7);
INSERT INTO Section (section_id, section_name, section_language, page_id) VALUES(7,'Book Chapters', 'fr', 7);
INSERT INTO Section (section_id, section_name, section_language, page_id) VALUES(8,'Articles', 'fr', 7);
INSERT INTO Section (section_id, section_name, section_language, page_id) VALUES(9,'Conferences', 'fr', 7);
INSERT INTO Section (section_id, section_name, section_language, page_id) VALUES(10, 'Plateforme intégrée', 'fr', 2);
INSERT INTO Section (section_id, section_name, section_language, page_id) VALUES(11, 'Référentiel commun', 'fr', 2);
INSERT INTO Section (section_id, section_name, section_language, page_id) VALUES(12, 'Organisation des ressources', 'fr', 2);
INSERT INTO Section (section_id, section_name, section_language, page_id) VALUES(13, 'Espaces de partage', 'fr', 2);
INSERT INTO Section (section_id, section_name, section_language, page_id) VALUES(14, 'Ressources', 'fr', 2);
INSERT INTO Section (section_id, section_name, section_language, page_id) VALUES(15, 'Bookmarks', 'fr', 2);
INSERT INTO Section (section_id, section_name, section_language, page_id) VALUES(16, 'Trace d''interaction', 'fr', 2);
INSERT INTO Section (section_id, section_name, section_language, page_id) VALUES(17, 'Réseau social d''entreprise', 'fr', 2);

--Insertion dans la page d'accueil

INSERT INTO Media (media_id, media_language, media_type, page_id, media_content) VALUES(1, 'fr', 'text', 1,
'<p>Avec l''approche MEMORAe, nous avons souhaité modéliser et concevoir une plateforme web permettant de gérer l''ensemble des ressources hétérogènes de connaissances circulant dans une organisation.</p>
<p>La plateforme, du même nom que l''approche, a été pensée et développée afin de faciliter l''apprentissage organisationnel et la capitalisation des connaissances à partir d’une modélisation sémantique.Elle exploite la puissance des nouvelles technologies support à la collaboration (technologies web 2.0, tables tactiles, etc.) et s’appuie sur les standards du web sémantique.</p>
<p>Le cœur de l''innovation concerne l''organisation autour d''une carte de connaissances de l''ensemble des ressources privées ou partagées, issues d''un processus formel ou informel au sein d''un groupe d’individus (équipe, service, projet, organisation, etc.</p>
<p>L’usage d’une carte sémantique permet de définir un référentiel commun dans lequel il est possible de naviguer pour accéder aux ressources capitalisées dans différents espaces. Ces espaces sont visibles en parallèle et facilitent le transfert de connaissances entre individus.</p>
');

INSERT INTO Media (media_id, media_name, media_language, media_type, page_id, media_content, media_path) VALUES(23, 'stand up about pimp', 'fr', 'video', 1, 'Le cœur de l’innovation concerne l’organisation autour d’une carte de connaissances de l’ensemble des ressources privées ou partagées', 'https://www.youtube.com/embed/oqe3HvVf8nk');

--Insertion dans la page Qu'est ce que Memorae



INSERT INTO Media (media_id, media_name, media_type, media_content, media_path, section_id) VALUES(7, 'Titre', 'video',
'<p>Un bookmarks est un ensemble de points d''entrée sur le référentiel commun identifiés par les membres d''un espace de partage </p>
<p>Un bookmarks est associé à chaque espace de partage</p>', 'https://www.youtube.com/embed/oqe3HvVf8nk', 15);

INSERT INTO Media (media_id, media_name, media_type, media_content, media_path, section_id) VALUES(8, 'Titre', 'video',
'<p>Module de présentation des activités réalisées au sein de la plateforme selon différents critères.</p>', 'https://www.youtube.com/embed/oqe3HvVf8nk', 16);

INSERT INTO Media (media_id, media_name, media_type, media_content, media_path, section_id) VALUES(9, 'Titre', 'video',
'<p>La plateforme gère son propre réseau social d’entreprise/organisation..</p>', 'https://www.youtube.com/embed/7I9PFi0ftdE', 17);


--Jeux de données pour les documents

INSERT INTO Media (media_id, media_name, media_language, media_type, page_id, media_content, media_path) VALUES(10, 'Kenya', 'fr', 'file', 3, 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'dance1.jpg');
INSERT INTO Media (media_id, media_name, media_language, media_type, page_id, media_content, media_path) VALUES(11, 'Azonto', 'fr', 'file', 3, 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'dance2.jpg');
INSERT INTO Media (media_id, media_name, media_language, media_type, page_id, media_content, media_path) VALUES(12, 'Salsa', 'fr', 'file', 3, 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'dance7.jpg');

-- Jeux de données pour les vidéos
INSERT INTO Media (media_id, media_name, media_language, media_type, page_id, media_content, media_path) VALUES(13, 'stand up about pimp', 'fr', 'video', 4, 'Le cœur de l’innovation concerne l’organisation autour d’une carte de connaissances de l’ensemble des ressources privées ou partagées', 'https://www.youtube.com/embed/7I9PFi0ftdE');
INSERT INTO Media (media_id, media_name, media_language, media_type, page_id, media_content, media_path) VALUES(14, 'Katt Williams', 'fr', 'video', 4, 'Le cœur de l’innovation concerne l’organisation autour d’une carte de connaissances de l’ensemble des ressources privées ou partagées', 'https://www.youtube.com/embed/oqe3HvVf8nk');
INSERT INTO Media (media_id, media_name, media_language, media_type, page_id, media_content, media_path) VALUES(15, 'Katt Williams', 'fr', 'video', 4, 'Le cœur de l’innovation concerne l’organisation autour d’une carte de connaissances de l’ensemble des ressources privées ou partagées', 'https://www.youtube.com/embed/LR6YSWgdzpc');
INSERT INTO Media (media_id, media_name, media_language, media_type, page_id, media_content, media_path) VALUES(16, 'Katt Williams', 'fr', 'video', 4, 'Le cœur de l’innovation concerne l’organisation autour d’une carte de connaissances de l’ensemble des ressources privées ou partagées', 'https://www.youtube.com/embed/S1C4wbrXvDI');

--jeux de données pour les projets de recherche

INSERT INTO Media (media_id, media_name, media_type, section_id, media_content, media_path) VALUES(17, 'Kenya', 'file', 3, 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'dance1.jpg');
INSERT INTO Media (media_id, media_name, media_type, section_id, media_content, media_path) VALUES(18, 'Azonto', 'file', 3, 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'dance2.jpg');
INSERT INTO Media (media_id, media_name, media_type, section_id, media_content, media_path) VALUES(19, 'Salsa', 'file', 5, 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'dance7.jpg');

INSERT INTO Media (media_id, media_name, media_type, section_id, media_content, media_path) VALUES(20, 'Kenya', 'file', 7, 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'dance1.jpg');
INSERT INTO Media (media_id, media_name, media_type, section_id, media_content, media_path) VALUES(21, 'Azonto', 'file', 9, 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'dance2.jpg');
INSERT INTO Media (media_id, media_name, media_type, section_id, media_content, media_path) VALUES(22, 'Salsa', 'file', 9, 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'dance7.jpg');

--Jeux de données pour la page de thèses
INSERT INTO Media (media_id, media_name, media_type, section_id, media_content, media_path) VALUES(24, 'Kenya', 'file', 1, 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'dance1.jpg');
INSERT INTO Media (media_id, media_name, media_type, section_id, media_content, media_path) VALUES(25, 'Azonto', 'file', 1, 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'dance2.jpg');
INSERT INTO Media (media_id, media_name, media_type, section_id, media_content, media_path) VALUES(26, 'Salsa', 'file', 1, 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'dance7.jpg');

INSERT INTO Media (media_id, media_name, media_type, section_id, media_content, media_path) VALUES(27, 'Kenya', 'file', 2, 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'dance1.jpg');
INSERT INTO Media (media_id, media_name, media_type, section_id, media_content, media_path) VALUES(28, 'Azonto', 'file', 2, 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'dance2.jpg');
INSERT INTO Media (media_id, media_name, media_type, section_id, media_content, media_path) VALUES(29, 'Salsa', 'file', 2, 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'dance7.jpg');

COMMIT;


alter sequence media_pk_seq restart with 30;




