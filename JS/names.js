$(document).ready(function() {
    $('#rbtnMale').click(function() {
        $('.spinner').show();
        $.getJSON('php/get_names.php', function(data) {

            var printcard = $('#printcard');
            var i = 0;
            var getCardDeck = function() {
                return $('<div class="card-deck text-info"></div>');
            }

            var cardDeck = getCardDeck();

            data.forEach(function(object) {
                if (i == 0) {
                    setTimeout(function() {
                        printcard.append(cardDeck);
                        cardDeck.prev().remove();
                        $('.spinner').hide();

                    }, 1000);
                }

                var content = $(
                    '<div class="card border-0 p-1">' +
                    '<div class="card-body ">' +
                    '<h1 class="card-text font-italic ">' + object.ime + '</h1>' +
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
    })
    $('#rbtnFemale').click(function() {
        $('.spinner').show();
        $.getJSON('php/get_names.php', function(data) {

            var printcard = $('#printcard');
            var i = 0;
            var getCardDeck = function() {
                return $('<div class="card-deck text-info"></div>');
            }

            var cardDeck = getCardDeck();

            data.forEach(function(object) {
                if (i == 0) {
                    setTimeout(function() {
                        printcard.append(cardDeck);
                        cardDeck.prev().remove();
                        $('.spinner').hide();

                    }, 1000);
                }

                var content = $(
                    '<div class="card border-0 p-1">' +
                    '<div class="card-body ">' +
                    '<h1 class="card-text font-italic ">' + object.ime + '</h1>' +
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
    })

});