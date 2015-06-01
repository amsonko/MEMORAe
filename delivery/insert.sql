BEGIN;

--Insertion des pages

INSERT INTO Page (page_id, page_name) VALUES(1,'Home');
INSERT INTO Page (page_id, page_name) VALUES(2,'Qu''est ce que Memorae');
INSERT INTO Page (page_id, page_name) VALUES(3,'Document');
INSERT INTO Page (page_id, page_name) VALUES(4,'Video');
INSERT INTO Page (page_id, page_name) VALUES(5,'Projets de recherche');
INSERT INTO Page (page_id, page_name) VALUES(6,'Thèses');
INSERT INTO Page (page_id, page_name) VALUES(7,'Publications');
INSERT INTO Page (page_id, page_name) VALUES(100,'Banniere');

--Insertino des sections en français

INSERT INTO Section (section_name, section_language, page_id) VALUES('Thèses', 'fr', 6);
INSERT INTO Section (section_name, section_language, page_id) VALUES('HDR', 'fr', 6);
INSERT INTO Section (section_name, section_language, page_id) VALUES('Industriels', 'fr', 5);
INSERT INTO Section (section_name, section_language, page_id) VALUES('Académiques', 'fr', 5);
INSERT INTO Section (section_name, section_language, page_id) VALUES('Régionaux', 'fr', 5);
INSERT INTO Section (section_name, section_language, page_id) VALUES('Livres', 'fr', 7);
INSERT INTO Section (section_name, section_language, page_id) VALUES('Chapitres de livres', 'fr', 7);
INSERT INTO Section (section_name, section_language, page_id) VALUES('Articles', 'fr', 7);
INSERT INTO Section (section_name, section_language, page_id) VALUES('Conférences', 'fr', 7);

--Insertino des sections en anglais

INSERT INTO Section (section_name, section_language, page_id) VALUES('Thesis', 'en', 6);
INSERT INTO Section (section_name, section_language, page_id) VALUES('HDR', 'en', 6);
INSERT INTO Section (section_name, section_language, page_id) VALUES('Industrial', 'en', 5);
INSERT INTO Section (section_name, section_language, page_id) VALUES('Academic', 'en', 5);
INSERT INTO Section (section_name, section_language, page_id) VALUES('Regional', 'en', 5);
INSERT INTO Section (section_name, section_language, page_id) VALUES('Books', 'en', 7);
INSERT INTO Section (section_name, section_language, page_id) VALUES('Book Chapters', 'en', 7);
INSERT INTO Section (section_name, section_language, page_id) VALUES('Articles', 'en', 7);
INSERT INTO Section (section_name, section_language, page_id) VALUES('Conferences', 'en', 7);


--Insertion dans la page d'accueil

INSERT INTO Media (media_language, media_type, page_id, media_content) VALUES('fr', 'text', 1,
'<p>Avec l''approche MEMORAe, nous avons souhaité modéliser et concevoir une plateforme web permettant de gérer l''ensemble des ressources hétérogènes de connaissances circulant dans une organisation.</p>
<p>La plateforme, du même nom que l''approche, a été pensée et développée afin de faciliter l''apprentissage organisationnel et la capitalisation des connaissances à partir d’une modélisation sémantique.Elle exploite la puissance des nouvelles technologies support à la collaboration (technologies web 2.0, tables tactiles, etc.) et s’appuie sur les standards du web sémantique.</p>
<p>Le cœur de l''innovation concerne l''organisation autour d''une carte de connaissances de l''ensemble des ressources privées ou partagées, issues d''un processus formel ou informel au sein d''un groupe d’individus (équipe, service, projet, organisation, etc.</p>
<p>L’usage d’une carte sémantique permet de définir un référentiel commun dans lequel il est possible de naviguer pour accéder aux ressources capitalisées dans différents espaces. Ces espaces sont visibles en parallèle et facilitent le transfert de connaissances entre individus.</p>
');

INSERT INTO Media (media_name, media_language, media_type, page_id, media_content, media_path) VALUES('MEMORAe] - Ajouter une ressource', 'fr', 'video', 1, 'Le cœur de l’innovation concerne l’organisation autour d’une carte de connaissances de l’ensemble des ressources privées ou partagées', '//www.dailymotion.com/embed/video/xrlmt6');


INSERT INTO Media (media_language, media_type, page_id, media_content) VALUES('en', 'text', 1,
'<p>Avec l''approche MEMORAe, nous avons souhaité modéliser et concevoir une plateforme web permettant de gérer l''ensemble des ressources hétérogènes de connaissances circulant dans une organisation.</p>
<p>La plateforme, du même nom que l''approche, a été pensée et développée afin de faciliter l''apprentissage organisationnel et la capitalisation des connaissances à partir d’une modélisation sémantique.Elle exploite la puissance des nouvelles technologies support à la collaboration (technologies web 2.0, tables tactiles, etc.) et s’appuie sur les standards du web sémantique.</p>
<p>Le cœur de l''innovation concerne l''organisation autour d''une carte de connaissances de l''ensemble des ressources privées ou partagées, issues d''un processus formel ou informel au sein d''un groupe d’individus (équipe, service, projet, organisation, etc.</p>
<p>L’usage d’une carte sémantique permet de définir un référentiel commun dans lequel il est possible de naviguer pour accéder aux ressources capitalisées dans différents espaces. Ces espaces sont visibles en parallèle et facilitent le transfert de connaissances entre individus.</p>
');

INSERT INTO Media (media_name, media_language, media_type, page_id, media_content, media_path) VALUES('[MEMORAe] - Ajouter une ressource', 'en', 'video', 1, 'Le cœur de l’innovation concerne l’organisation autour d’une carte de connaissances de l’ensemble des ressources privées ou partagées', '//www.dailymotion.com/embed/video/xrlmt6');



--Admin de base

INSERT INTO admin (admin_id, username, username_canonical, email, email_canonical, enabled, salt, password, last_login, locked, expired, expires_at, confirmation_token, password_requested_at, roles, credentials_expired, credentials_expire_at) VALUES (1, 'sonkoama', 'sonkoama', 'sonkoama@gmail.com', 'sonkoama@gmail.com', true, '8xu8qur6uscgcssco8skog0wg0ooo04', 'BbXJYg2HbfJ5LhpyPyO9Jir+FfLWDZH9DbAbFsPFNhFCRXBrve4aUZdWMJ18/HwKJYcnSDiw0kZA18/LSMBPXQ==', '2015-05-26 11:15:16', false, false, NULL, NULL, NULL, 'a:0:{}', false, NULL);

COMMIT;


