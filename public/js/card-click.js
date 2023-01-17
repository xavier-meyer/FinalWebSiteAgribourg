
// on sélectionnes tous les élements HTML avec la class card
var cards = document.querySelectorAll('.card');

 // la méthode forEach est utilisée pour parcourir tous les élements du tableau sélectionnés et
 // Ajouter un écouteur d'événement "click" à toutes les cartes
/* Lorsque l'utilisateur clique sur une carte,
 la fonction anonyme associée à l'écouteur d'événement "click" est déclenchée*/
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
