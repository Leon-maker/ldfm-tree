Bienvenue sur le projet INFLUENCE BY M.
Trouvez ici toutes les informations relatives au projet.
Installation du projet

1 - Prérequis
Clonez le projet dans votre répertoire de travail.
git clone https://gitlab.com/AgenceThrive/influence-by-m.git

2 - Paramétrez Prepros
Ouvrez le projet dans Prepros et configurez les paramètres suivants :
Cliquez droit sur "Readme.md" et décochez "Include file while uploading"
Dans le dossier "styles", sélectionnez "main.scss" et cochez les cases :
"Process automatically"
"Auto-prefix"
"Minify"
"Source map"
Dans les paramètres du projet, paramétrez l'upload :


SFTP
Host : Serveur mutualisé
User : Identifiant FTP
vPassword : Mot de passe FTP
Port : 22
Ne pas oublier :wink: :
- Remote path : /clickandbuilds/InfluenceByM/wp-content/themes/thrive-custom-theme
- Cocher la case "Upload automatically"

3 - Construction
Avant de débuter la construction du site, il convient de se poser les bonnes question sur les informations et leurs type d'attribution :
Tout type d'information qui doit servir à REGROUPER (métier / secteur / ville etc...) :
doit être considéré comme une TAXONOMIE. Une taxonomie est une information PARTAGÉE.
Tout type d'information qui à pour finalité d'être PUBLIÉE sur le site (article / annonce / formation etc...) :
doit être considéré comme une PUBLICATION (CPT), qui peut recevoir des champs personalisés (ACF).

4 - Développement
Tout le style du projet se trouve dans le dossier "styles".
Le fichier style.css est un fichier nécessaire à WordPress, il ne doit pas être modifié.

5 - Structure du dossier "styles
"main.scss" : Fichier principal qui importe tous les autres fichiers
"main.css" : Fichier généré par Prepros, minifié et autoprefixé --> c'est celui-là qui est upload et utilisé par le site
"main.css.map" : Fichier généré par Prepros, permettant de retrouver les fichiers sources dans le navigateur
"_components" : Contient les styles des différents composants du projet
"_elements" : Contient les styles des éléments header & footer mais aussi les styles des shortcodes
"_global" : Contient les styles globaux du projet, s'appliquant sur toutes les pages
"_pages" : Contient les styles des différentes pages du projet
"_vars" : Contient les variables utilisées dans le projet

6 - Structure des scripts Javascript du dossier "scripts"
"main-script.js" : Fichier principal qui importera tous les autres fichiers lorsque la page est chargée.
"managers" : Contient les managers du projet, sous forme de classes JS

7 - Structure des fichiers PHP
"functions.php" : Fichier principal qui importe tous les autres fichiers de config présents dans le dossier "config"
"index.php" : Fichier nécessaire par défaut pour Wordpress
"header.php" : Fichier contenant le header du site
"header.php" : Fichier contenant le header du site
"footer.php" : Fichier contenant le footer du site
"front-page.php" : Fichier contenant la page d'accueil du site
"single.php" : Fichier contenant la page d'un article de base

8 - Structure du dossier "config"
"config.php" : Fichier principal qui configure les fonctionnalités de Wordpress
"custom-post-types.php" : Fichier contenant les custom post types du projet
"shortcode-manager.php" : Fichier qui importe tous les shortcodes du projet
Développé par :

[Thrive](https://www.agencethrive.com)
