
BEGIN;
INSERT INTO Page (page_id, page_name) VALUES(1,'Home');
INSERT INTO Page (page_id, page_name) VALUES(2,'Qu''est ce que Memorae');
INSERT INTO Page (page_id, page_name) VALUES(3,'Document');
INSERT INTO Page (page_id, page_name) VALUES(4,'Video');

INSERT INTO Media (media_id, media_language, current_media, page_id, media_content) VALUES(1, 'fr', 'text', 1, 'Avec l’approche MEMORAe, nous avons souhaité modéliser et concevoir une plateforme web permettant de gérer l’ensemble des ressources hétérogènes de connaissances circulant dans une organisation.

La plateforme, du même nom que l’approche, a été pensée et développée afin de faciliter l’apprentissage organisationnel et la capitalisation des connaissances à partir d’une modélisation sémantique.Elle exploite la puissance des nouvelles technologies support à la collaboration (technologies web 2.0, tables tactiles, etc.) et s’appuie sur les standards du web sémantique.

Le cœur de l’innovation concerne l’organisation autour d’une carte de connaissances de l’ensemble des ressources privées ou partagées, issues d’un processus formel ou informel au sein d’un groupe d’individus (équipe, service, projet, organisation, etc.)

L’usage d’une carte sémantique permet de définir un référentiel commun dans lequel il est possible de naviguer pour accéder aux ressources capitalisées dans différents espaces. Ces espaces sont visibles en parallèle et facilitent le transfert de connaissances entre individus.');

INSERT INTO Media (media_id, media_language, current_media, page_id, media_content) VALUES(2, 'fr', 'text', 1, 'detais de qu''est ce que memorea');

# mise en place le 03/05/2015 test de la récuperation des media 
INSERT INTO Media (media_id, media_language, current_media, page_id, media_content) VALUES(2, 'fr', 'text', 1, 'detais  de qu''est ce que memorea');
INSERT INTO Media (media_id, media_language, current_media, page_id, media_content) VALUES(3, 'fr', 'text', 1, 'detais2 de qu''est ce que memorea');
INSERT INTO Media (media_id, media_language, current_media, page_id, media_content) VALUES(4, 'fr', 'text', 1, 'detais3 de qu''est ce que memorea');
INSERT INTO Media (media_id, media_language, current_media, page_id, media_content) VALUES(5, 'fr', 'text', 1, 'detais4 de qu''est ce que memorea');
INSERT INTO Media (media_id, media_language, current_media, page_id, media_content) VALUES(6, 'fr', 'text', 2, 'detais4 de qu''est ce que memorea');

--jeux de données de test des accordions sur la page qu'est ce que memorae

INSERT INTO Media (media_id, media_name, media_language, current_media, page_id, media_content) VALUES(7, 'Plateforme intégrée', 'fr', 'text', 2, 'Une des forces de la plateforme MEMORAe est son intégration complète de toutes les fonctionnalités nécessaires pour héberger un serveur de collaboration et de capitalisation des connaissances. Elle inclut toutes ses fonctionnalités au sein d''une même application : il ne s''agit pas d''une association de différents logiciels offrant les fonctionnalités désirées.');
INSERT INTO Media (media_id, media_name, media_language, current_media, page_id, media_content) VALUES(8, 'Référentiel commun', 'fr', 'text', 2, 'Représentation d’un référentiel commun au moyen d’un standard du web sémantique (OWL).
Création, importation/exportation du référentiel commun.
Navigation au sein d''une cartographie de connaissances illustrant le
référentiel commun ;
Le focus sur la carte permet d''afficher en parallèle l''ensemble des ressources qu''il indexe distribuées dans les espaces de partage accessible par l''utilisateur. Ces ressources peuvent êtres issues d’un chat, d''une base documentaire, d''un wiki, d''un agenda, etc.');
-- INSERT INTO Media (media_id, media_name, media_language, current_media, page_id, media_content) VALUES(9, 'fr', 'text', 2, 'detais3 de qu''est ce que memorea');
-- INSERT INTO Media (media_id, media_name, media_language, current_media, page_id, media_content) VALUES(10, 'fr', 'text', 2, 'detais4 de qu''est ce que memorea');
-- INSERT INTO Media (media_id, media_name, media_language, current_media, page_id, media_content) VALUES(11, 'fr', 'text', 2, 'detais4 de qu''est ce que memorea');

--Jeux de données de test des documents
INSERT INTO Media (media_id, media_name, media_language, current_media, page_id, media_content, media_path) VALUES(9, 'Dance 1', 'fr', 'file', 3, 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'dance1.jpg');
INSERT INTO Media (media_id, media_name, media_language, current_media, page_id, media_content, media_path) VALUES(10, 'Dance 2', 'fr', 'file', 3, 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'dance2.jpg');
INSERT INTO Media (media_id, media_name, media_language, current_media, page_id, media_content, media_path) VALUES(11, 'Dance 7', 'fr', 'file', 3, 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'dance7.jpg');

-- Jeux de données pour les vidéos
INSERT INTO Media (media_id, media_name, media_language, current_media, page_id, media_content, media_path) VALUES(12, 'stand up about pimp', 'fr', 'video', 4, 'Le cœur de l’innovation concerne l’organisation autour d’une carte de connaissances de l’ensemble des ressources privées ou partagées', 'pimp.mp4');
INSERT INTO Media (media_id, media_name, media_language, current_media, page_id, media_content, media_path) VALUES(13, 'Dance 2', 'fr', 'video', 4, 'Le cœur de l’innovation concerne l’organisation autour d’une carte de connaissances de l’ensemble des ressources privées ou partagées', 'weed.mp4');
INSERT INTO Media (media_id, media_name, media_language, current_media, page_id, media_content, media_path) VALUES(14, 'Dance 7', 'fr', 'video', 4, 'Le cœur de l’innovation concerne l’organisation autour d’une carte de connaissances de l’ensemble des ressources privées ou partagées', 'religion.mp4');
INSERT INTO Media (media_id, media_name, media_language, current_media, page_id, media_content, media_path) VALUES(15, 'Dance 7', 'fr', 'video', 4, 'Le cœur de l’innovation concerne l’organisation autour d’une carte de connaissances de l’ensemble des ressources privées ou partagées', 'nasa.mp4');


COMMIT;

-- clean de la page d'acceuil 
select * from media ;
delete from media where  media_id=1 or media_id=2 or media_id=3 or media_id=4 or media_id=5;

INSERT INTO Media (media_id, media_language, current_media, page_id, media_content) VALUES(1, 'fr', 'text', 1, 'Avec l’approche MEMORAe, nous avons souhaité modéliser et concevoir une plateforme web permettant de gérer l’ensemble des ressources hétérogènes de connaissances circulant dans une organisation.');

INSERT INTO Media (media_id, media_language, current_media, page_id, media_content) VALUES(2, 'fr', 'text', 1, 'La plateforme, du même nom que l’approche, a été pensée et développée afin de faciliter l’apprentissage organisationnel et la capitalisation des connaissances à partir d’une modélisation sémantique.Elle exploite la puissance des nouvelles technologies support à la collaboration (technologies web 2.0, tables tactiles, etc.) et s’appuie sur les standards du web sémantique.');

INSERT INTO Media (media_id, media_language, current_media, page_id, media_content) VALUES(3, 'fr', 'text', 1, 'Le cœur de l’innovation concerne l’organisation autour d’une carte de connaissances de l’ensemble des ressources privées ou partagées, issues d’un processus formel ou informel au sein d’un groupe d’individus (équipe, service, projet, organisation, etc.');

INSERT INTO Media (media_id, media_language, current_media, page_id, media_content) VALUES(4, 'fr', 'text', 1, 'L’usage d’une carte sémantique permet de définir un référentiel commun dans lequel il est possible de naviguer pour accéder aux ressources capitalisées dans différents espaces. Ces espaces sont visibles en parallèle et facilitent le transfert de connaissances entre individus.');

INSERT INTO Media (media_id, media_language, current_media, page_id, media_content) VALUES(5, 'fr', 'text', 1, 'Avec l’approche MEMORAe, nous avons souhaité modéliser et concevoir une plateforme web permettant de gérer l’ensemble des ressources hétérogènes de connaissances circulant dans une organisation.');


-- activation des sous menus de r&d 

INSERT INTO Page (page_id, page_name) VALUES(5,' Projets de  Recherche');
INSERT INTO Page (page_id, page_name) VALUES(6,' Thèses');

-- ******ARRENTION CES DEUX lignes seront à supprimer après c'est juste pour empecher que le resultat de la  requete ne devient nul 
INSERT INTO Media (media_id,media_name, media_language, current_media, page_id, media_content) VALUES(16,'industriels', 'fr', 'text',5, 'projets industriel de la plateforme memorae');
INSERT INTO Media (media_id, media_language, current_media, page_id, media_content) VALUES(17, 'fr', 'text',6, 'theses du projet memorae');
