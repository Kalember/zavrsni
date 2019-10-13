$.get("html_files/footer.html", function(data) {
    $("#footer").replaceWith(data);
});
$.get("html_files/navigacija.html", function(data) {
    $("#navig").replaceWith(data);
});
$.get("html_files/sidebar.html", function(data) {
    $("#sidebar").replaceWith(data);
});
$(document).ready(function() {

    $.getJSON('azili_data.php', function(data) {

        var printcard = $('#printcard');
        var i = 0;
        var getCardDeck = function() {
            return $('<div class="card-deck text-info"></div>');
        }
        var cardDeck = getCardDeck();
        data.forEach(function(object) {
            if (i == 0) {
                printcard.append(cardDeck);
            }
            var content = $(
                '<div class="card p-1">' +
                '<img class="card-img-top img-responsive border border-info rounded" src="' + object.slika + '" alt="">' +
                '<div class="card-body ">' +
                '<h5 class="card-title">' + object.naziv + '</h5>' +
                '<h5 class="card-title">' + object.adresa + ', ' + object.mesto + '</h5>' +
                '<p class="card-text"> TEL: ' + object.telefon + '</p>' +
                '<p class="card-text">EMAIL: ' + object.email + '</p>' +
                '<p class="card-text bg-info text-light p-2 rounded">' + object.opis + '</p>' +
                '</div>' +
                '</div>' +
                '</div>');
            cardDeck.append(content);
            i++;
            if (i == 3) {
                i = 0;
                cardDeck = getCardDeck();
            }

        });
    });
});