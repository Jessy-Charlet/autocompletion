
var availableTags = [];
fetch('recherche.php')
  .then(response => response.json())
  .then(data => {
    data.forEach(user => {
      availableTags.push(user.Nom);
    });
  })
  .catch(error => console.error('Erreur lors de la récupération des utilisateurs:', error));




$(function () {
  $("#tags").autocomplete({
    source: availableTags
  });
});
