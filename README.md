Recettes Incomm
Recettes Incomm est un site de partage de recettes développé dans le cadre d'un test de recrutement. Ce projet WordPress présente des recettes culinaires avec des fonctionnalités de recherche avancée, une interface utilisateur dynamique et une gestion personnalisée des recettes via l'outil ACF (Advanced Custom Fields).

Table des matières
Fonctionnalités principales
Technologies utilisées
Installation
Étapes de développement
Contribuer
Fonctionnalités principales
Affichage dynamique des recettes : Chaque recette est présentée avec son titre, une image associée, les ingrédients et les étapes de préparation.
Recherche avancée : Une barre de recherche en haut de la page permet de chercher des recettes par mots-clés.
Interface responsive : Le site est conçu pour être facilement utilisable sur ordinateur, tablette et mobile.
Gestion des recettes via ACF : Les recettes sont gérées via des champs personnalisés pour une meilleure flexibilité d'ajout et de gestion.
Technologies utilisées
WordPress : Utilisé comme CMS principal pour la gestion des recettes et du contenu.
PHP : Pour la logique côté serveur et l'interaction avec WordPress.
HTML5/CSS3 : Pour la structure et le design des pages.
JavaScript : Pour certaines fonctionnalités interactives (comme la barre de recherche).
ACF (Advanced Custom Fields) : Utilisé pour ajouter des champs personnalisés aux recettes, comme les images, les ingrédients et les étapes de préparation.
Git & GitHub : Gestion du versionnement et partage du code.
Installation
Cloner le dépôt :

bash
Copier le code
git clone https://github.com/Jxles17/Recettes-incomm.git
Installation de WordPress :

Téléchargez et installez WordPress.
Placez le contenu du dépôt dans le répertoire wp-content/themes/ de WordPress.
Activer le thème :

Dans l'administration WordPress, allez dans Apparence > Thèmes et activez le thème.
Installation des plugins :

Installez le plugin ACF (Advanced Custom Fields) pour la gestion des recettes.
Configuration des champs ACF :

Configurez les champs personnalisés (image, ingrédients, étapes, etc.) dans l'interface ACF pour les recettes.
Étapes de développement
1. Initialisation du projet
Création du projet WordPress et intégration du thème personnalisé.
Configuration du dépôt Git et versionnement du projet sur GitHub.
2. Création du modèle de page de recettes
Mise en place d'une structure pour afficher les recettes avec un titre, une image, les ingrédients et les étapes.
Gestion des recettes avec des champs personnalisés via ACF.
3. Recherche et navigation
Ajout d'une barre de recherche permettant de trouver des recettes par mots-clés.
Mise en place d'une navigation simple pour accéder aux différentes recettes.
4. Interface utilisateur
Ajout de styles CSS pour une interface claire, moderne et responsive.
Ajustement des tailles d'images et des éléments pour une bonne expérience utilisateur sur mobile.
5. Intégration des images
Récupération et affichage des images personnalisées des recettes via ACF.
6. Footer et mise en page globale
Création d'un footer global réutilisable sur toutes les pages pour assurer une cohérence du site.
Contribuer
Les contributions sont les bienvenues ! Pour contribuer à ce projet :

Fork le dépôt.
Crée une branche pour ta fonctionnalité (git checkout -b nouvelle-fonctionnalité).
Commit tes changements (git commit -m 'Ajout de nouvelle fonctionnalité').
Push vers la branche (git push origin nouvelle-fonctionnalité).
Ouvre une pull request.
