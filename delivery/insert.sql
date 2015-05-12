BEGIN;

--Insertion des pages

INSERT INTO Page (page_id, page_name) VALUES(1,'Home');
INSERT INTO Page (page_id, page_name) VALUES(2,'Qu''est ce que Memorae');
INSERT INTO Page (page_id, page_name) VALUES(3,'Document');
INSERT INTO Page (page_id, page_name) VALUES(4,'Video');
INSERT INTO Page (page_id, page_name) VALUES(5,'Projets de recherche');
INSERT INTO Page (page_id, page_name) VALUES(6,'Thèses');

INSERT INTO Section (section_id, section_name) VALUES(1,'Thesis');
INSERT INTO Section (section_id, section_name) VALUES(2,'HDR');
INSERT INTO Section (section_id, section_name) VALUES(3,'Industrial');
INSERT INTO Section (section_id, section_name) VALUES(4,'Academic');
INSERT INTO Section (section_id, section_name) VALUES(5,'Regional');
INSERT INTO Section (section_id, section_name) VALUES(6,'Books');
INSERT INTO Section (section_id, section_name) VALUES(7,'Book Chapters');
INSERT INTO Section (section_id, section_name) VALUES(8,'Articles');
INSERT INTO Section (section_id, section_name) VALUES(9,'Conferences');


--Insertion dans la page d'accueil

INSERT INTO Media (media_id, media_language, media_type, page_id, media_content) VALUES(1, 'fr', 'text', 1,
'<p>Avec l''approche MEMORAe, nous avons souhaité modéliser et concevoir une plateforme web permettant de gérer l''ensemble des ressources hétérogènes de connaissances circulant dans une organisation.</p>
<p>La plateforme, du même nom que l''approche, a été pensée et développée afin de faciliter l''apprentissage organisationnel et la capitalisation des connaissances à partir d’une modélisation sémantique.Elle exploite la puissance des nouvelles technologies support à la collaboration (technologies web 2.0, tables tactiles, etc.) et s’appuie sur les standards du web sémantique.</p>
<p>Le cœur de l''innovation concerne l''organisation autour d''une carte de connaissances de l''ensemble des ressources privées ou partagées, issues d''un processus formel ou informel au sein d''un groupe d’individus (équipe, service, projet, organisation, etc.</p>
<p>L’usage d’une carte sémantique permet de définir un référentiel commun dans lequel il est possible de naviguer pour accéder aux ressources capitalisées dans différents espaces. Ces espaces sont visibles en parallèle et facilitent le transfert de connaissances entre individus.</p>
');

INSERT INTO Media (media_id, media_name, media_language, media_type, page_id, media_content, media_path) VALUES(23, 'stand up about pimp', 'fr', 'video', 1, 'Le cœur de l’innovation concerne l’organisation autour d’une carte de connaissances de l’ensemble des ressources privées ou partagées', 'weed.mp4');

--Insertion dans la page Qu'est ce que Memorae

INSERT INTO Media (media_id, media_name, media_language, media_type, page_id, media_content) VALUES(2, 'Plateforme intégrée', 'fr', 'text', 2, 'Une des forces de la plateforme MEMORAe est son intégration complète de toutes les fonctionnalités nécessaires pour héberger un serveur de collaboration et de capitalisation des connaissances. Elle inclut toutes ses fonctionnalités au sein d''une même application : il ne s''agit pas d''une association de différents logiciels offrant les fonctionnalités désirées.');

INSERT INTO Media (media_id, media_name, media_language, media_type, page_id, media_content) VALUES(3, 'Référentiel commun', 'fr', 'text', 2, 'Représentation d’un référentiel commun au moyen d’un standard du web sémantique (OWL).
Création, importation/exportation du référentiel commun.
Navigation au sein d''une cartographie de connaissances illustrant le
référentiel commun ;
Le focus sur la carte permet d''afficher en parallèle l''ensemble des ressources qu''il indexe distribuées dans les espaces de partage accessible par l''utilisateur. Ces ressources peuvent êtres issues d’un chat, d''une base documentaire, d''un wiki, d''un agenda, etc.');

INSERT INTO Media (media_id, media_name, media_language, media_type, page_id, media_content) VALUES(4, 'Organisation des ressources', 'fr', 'text', 2, '
L''organisation des ressources se fait :
<p>autour du référentiel commun et permet différents accès sur les ressources suivant leur description sémantique, toute ressource peut être indexée par son contenu (les concepts qu''elle traite) ou son contenant (auteur, date de création, etc.) ;</p>
<p>selon les droits d''accès de l''utilisateur sur les espaces de partage permettant de les visualiser.</p>'
);


INSERT INTO Media (media_id, media_name, media_language, media_type, page_id, media_content) VALUES(5, 'Espaces de partage', 'fr', 'text', 2,
'<p>Un espace de partage permet de rendre visible un ensemble de ressources partagées par les membres de cet espace. Une même ressource peut être visible dans différents espaces, elle reste cependant stockée à un endroit unique.</p>
<p>Chaque utilisateur possède un espace de partage accessible que par lui-même (privé).</p>
<p>La visualisation des espaces partagés en parallèle facilite le transfert de ressources d’un espace à l''autre et donc le partage : glisser-déposer.</p>'
);

INSERT INTO Media (media_id, media_name, media_language, media_type, page_id, media_content) VALUES(6, 'Ressources', 'fr', 'text', 2,
'<p>Modélisation de ressources documentaires et/ou issues d’un processus social (fichier pdf, forum sémantique, chat sémantique, wiki sémantique agenda sémantique, etc.).</p>
<p>Modélisation de ressources humaines : qui sait quoi ?</p>
<p>Annotation de ressources, parties de ressources ou de concepts (composants du référentiel commun) ; L’annotation est elle-même
considérée comme une ressource. Elle est donc accessible dans les espaces de partage en tant que ressource ou via la ressource annotée.</p>'
);

INSERT INTO Media (media_id, media_name, media_language, media_type, page_id, media_content) VALUES(7, 'Bookmarks', 'fr', 'text', 2,
'<p>Un bookmarks est un ensemble de points d''entrée sur le référentiel commun identifiés par les membres d''un espace de partage </p>
<p>Un bookmarks est associé à chaque espace de partage</p>'
);

INSERT INTO Media (media_id, media_name, media_language, media_type, page_id, media_content) VALUES(8, 'Trace d''interaction', 'fr', 'text', 2,
'<p>Module de présentation des activités réalisées au sein de la plateforme selon différents critères.</p>');

INSERT INTO Media (media_id, media_name, media_language, media_type, page_id, media_content) VALUES(9, 'Réseau social d''entreprise', 'fr', 'text', 2,
'<p>La plateforme gère son propre réseau social d’entreprise/organisation..</p>');

--Jeux de données pour les documents

INSERT INTO Media (media_id, media_name, media_language, media_type, page_id, media_content, media_path) VALUES(10, 'Kenya', 'fr', 'file', 3, 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'dance1.jpg');
INSERT INTO Media (media_id, media_name, media_language, media_type, page_id, media_content, media_path) VALUES(11, 'Azonto', 'fr', 'file', 3, 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'dance2.jpg');
INSERT INTO Media (media_id, media_name, media_language, media_type, page_id, media_content, media_path) VALUES(12, 'Salsa', 'fr', 'file', 3, 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'dance7.jpg');

-- Jeux de données pour les vidéos
INSERT INTO Media (media_id, media_name, media_language, media_type, page_id, media_content, media_path) VALUES(13, 'stand up about pimp', 'fr', 'video', 4, 'Le cœur de l’innovation concerne l’organisation autour d’une carte de connaissances de l’ensemble des ressources privées ou partagées', 'pimp.mp4');
INSERT INTO Media (media_id, media_name, media_language, media_type, page_id, media_content, media_path) VALUES(14, 'Katt Williams', 'fr', 'video', 4, 'Le cœur de l’innovation concerne l’organisation autour d’une carte de connaissances de l’ensemble des ressources privées ou partagées', 'weed.mp4');
INSERT INTO Media (media_id, media_name, media_language, media_type, page_id, media_content, media_path) VALUES(15, 'Katt Williams', 'fr', 'video', 4, 'Le cœur de l’innovation concerne l’organisation autour d’une carte de connaissances de l’ensemble des ressources privées ou partagées', 'religion.mp4');
INSERT INTO Media (media_id, media_name, media_language, media_type, page_id, media_content, media_path) VALUES(16, 'Katt Williams', 'fr', 'video', 4, 'Le cœur de l’innovation concerne l’organisation autour d’une carte de connaissances de l’ensemble des ressources privées ou partagées', 'nasa.mp4');

--jeux de données pour les projets de recherche et les publications

INSERT INTO Media (media_id, media_name, media_language, media_type, page_id, section_id, media_content, media_path) VALUES(17, 'Kenya', 'fr', 'file', 5, 3, 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'dance1.jpg');
INSERT INTO Media (media_id, media_name, media_language, media_type, page_id, section_id, media_content, media_path) VALUES(18, 'Azonto', 'fr', 'file', 5, 3, 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'dance2.jpg');
INSERT INTO Media (media_id, media_name, media_language, media_type, page_id, section_id, media_content, media_path) VALUES(19, 'Salsa', 'fr', 'file', 5, 5, 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'dance7.jpg');

INSERT INTO Media (media_id, media_name, media_language, media_type, page_id, section_id, media_content, media_path) VALUES(20, 'Kenya', 'fr', 'file', 5, 7, 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'dance1.jpg');
INSERT INTO Media (media_id, media_name, media_language, media_type, page_id, section_id, media_content, media_path) VALUES(21, 'Azonto', 'fr', 'file', 5, 9, 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'dance2.jpg');
INSERT INTO Media (media_id, media_name, media_language, media_type, page_id, section_id, media_content, media_path) VALUES(22, 'Salsa', 'fr', 'file', 5, 9, 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'dance7.jpg');

COMMIT;




