
var cards = document.querySelectorAll('.card');

// Ajouter un écouteur d'événement "click" à toutes les cartes
cards.forEach(function(card) {
    card.addEventListener("click", function() {
        // Ajouter la classe CSS "selected" à la carte sélectionnée
        this.classList.add("selected");
        // Créer un lien "Voir le produit"
        var link = document.createElement("a");
        link.href = "#";
        link.innerHTML = "Voir le produit";
        link.classList.add("product-link");
        this.appendChild(link);
    });
});
