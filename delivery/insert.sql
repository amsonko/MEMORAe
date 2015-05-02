BEGIN;
INSERT INTO Page (page_id, page_name) VALUES(1,'Home');
INSERT INTO Media (media_id, media_language, current_media, page_id, media_content) VALUES(1, 'fr', 'text', 1, 'Avec l’approche MEMORAe, nous avons souhaité modéliser et concevoir une plateforme web permettant de gérer l’ensemble des ressources hétérogènes de connaissances circulant dans une organisation.

La plateforme, du même nom que l’approche, a été pensée et développée afin de faciliter l’apprentissage organisationnel et la capitalisation des connaissances à partir d’une modélisation sémantique.Elle exploite la puissance des nouvelles technologies support à la collaboration (technologies web 2.0, tables tactiles, etc.) et s’appuie sur les standards du web sémantique.

Le cœur de l’innovation concerne l’organisation autour d’une carte de connaissances de l’ensemble des ressources privées ou partagées, issues d’un processus formel ou informel au sein d’un groupe d’individus (équipe, service, projet, organisation, etc.)

L’usage d’une carte sémantique permet de définir un référentiel commun dans lequel il est possible de naviguer pour accéder aux ressources capitalisées dans différents espaces. Ces espaces sont visibles en parallèle et facilitent le transfert de connaissances entre individus.');
COMMIT;
