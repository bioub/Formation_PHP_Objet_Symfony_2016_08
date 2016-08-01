git
===

Introduction
------------

git est un gestionnaire de version (SCM), il permet de créer des sauvegardes dans un projet contenant des fichiers textes (en général du code source).

3 états
-------

![Etats Git](img/areas.png)

Une modification sous git peut exister sous 3 états :

* working directory, modification est présente sur le filesystem mais pas encore sauvegardée
* staging area, modification est à prendre en compte dans la prochaine sauvegarde
* git repository, modication est sauvegardée


Installation
------------

A télécharger sur [git-scm.com](http://git-scm.com) et penser à l'ajouter au PATH (variable d'environnement qui permet d'utiliser directement le nom d'un programme en ligne de commande plutôt que son chemin complet).

Une fois l'installation effectuée, vérifier l'installation avec :

    git --version

Commandes de base
-----------------

### Configurer git

    git config --global user.name "Romain Bohdanowicz"
    git config --global user.email "romain.bohdanowicz@gmail.com"

### Créer le repository

Demande à git de surveiller un projet.

    git init

### Ajouter une modification à la staging area

    git add CHEMIN_VERS_LE_FICHIER
    git add README.md
    git add Cours/git.md
    git add *.html
    git add *.{js,html,css}
		
### Créer une sauvegarde (de ce qui se trouve dans la staging area)

    git commit -m "Message de commit"

### Publier sur un autre repository (exemple Github)

    git remote add origin http://URL_VERS_LE_REPOSITORY_DISTANT
    git push -u origin master
		
Les fois suivantes :

    git push

