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

### Créer le repository

Demande à git de surveiller un projet.

    git init


    