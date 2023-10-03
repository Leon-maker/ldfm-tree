// Sélectionner l'élément dans lequel afficher les catégories d'influence
var influencesMenu = document.querySelector('#menu-item-21357 .sub-menu');

// Récupérer les catégories d'influence depuis la variable transmise par PHP
var influenceCategories = influenceData.categories;

// Afficher les 4 premières catégories d'influence
var limit = 4;
for (var i = 0; i < limit && i < influenceCategories.length; i++) {
    var category = influenceCategories[i];
    var li = document.createElement('li');
    li.innerHTML = '<a href="#" class="default-link-hover">' + category.name + '</a>';
    influencesMenu.appendChild(li);
}

// Si le nombre de catégories d'influence dépasse 4, ajouter un lien "Voir plus"
if (influenceCategories.length > limit) {
    var li = document.createElement('li');
    li.innerHTML = '<a href="#" class="default-link-hover">Voir plus</a>';
    influencesMenu.appendChild(li);
}
