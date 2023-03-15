
// on sélectionnes tous les élements HTML avec la class card
var cards = document.querySelectorAll('.cards_hover');

// la méthode forEach est utilisée pour parcourir tous les élements du tableau sélectionnés et
// Ajouter les écouteurs d'événements "mouseenter" et "mouseleave" à toutes les cartes
/* Lorsque l'utilisateur passe la souris sur une carte,
 la fonction anonyme associée à l'écouteur d'événement "mouseenter" est déclenchée*/
/*si la souris quitte la card, on utilises "mouseleave"*/
cards.forEach(function(card) {
    card.addEventListener("mouseenter", function() {
        // Ajouter la classe CSS "selected" à la carte sélectionnée
        this.classList.add("selected");
        //Récupération de l'élément lien-produit
        var productLink = this.querySelector('.link-product');
        //Afficher le lien-produit
        productLink.style.display = "block";
        // ajouter une class CSS sur le lien
        productLink.classList.add("lien-produit-class");
    });
});

cards.forEach(function(card) {
    card.addEventListener("mouseleave", function() {
        // Ajouter la classe CSS "selected" à la carte sélectionnée
        this.classList.remove("selected");
        //Récupération de l'élément lien-produit
        var productLink = this.querySelector('.link-product');
        //Cacher le lien-produit
        productLink.style.display = "none";
        // cacher le lien CSS
        productLink.classList.remove("lien-produit-class");
    });
});