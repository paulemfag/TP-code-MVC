$(function () {
    setInterval(function () {
        var option = $('#software option:selected').text();
        if (option === 'Autre') {
            $('#otherSoftware').show();
        }
        else if (option !== 'Autre') {
            $('#otherSoftware').hide();
        }
    }, 1);
    if ($('#particular').attr('checked') === ('checked')) {
        $('#particularItems').show();
        $('#compositorItems').hide();
    }
    if ($('#compositor').attr('checked') === ('checked')) {
        $('#particularItems').hide();
        $('#compositorItems').show();
        $('#biography').emojioneArea({
            pickerPosition: 'bottom',
            searchPlaceholder: 'Rechercher',
            buttonTitle: 'Utilisez la touche TAB pour insérer des emojis plus rapidement.',
            filters: {
                recent: {
                    title: 'Récents',
                },
                smileys_people: {
                    title: 'Smileys & Personnages',
                },
                animals_nature: {
                    title: 'Animaux & Nature',
                },
                food_drink: {
                    title: 'Nourriture & Boissons',
                },
                activity: {
                    title: 'Activités',
                },
                travel_places: {
                    title: 'Voyages & Lieux',
                },
                objects: {
                    title: 'Objets',
                },
                symbols: {
                    title: 'Symboles',
                },
                flags: {
                    title: 'Drapeaux',
                },
            }
        });
        $('#instruments').emojioneArea({
            pickerPosition: 'bottom',
            searchPlaceholder: 'Rechercher',
            buttonTitle: 'Utilisez la touche TAB pour insérer des emojis plus rapidement.',
            filters: {
                recent: {
                    title: 'Récents',
                },
                smileys_people: {
                    title: 'Smileys & Personnages',
                },
                animals_nature: {
                    title: 'Animaux & Nature',
                },
                food_drink: {
                    title: 'Nourriture & Boissons',
                },
                activity: {
                    title: 'Activités',
                },
                travel_places: {
                    title: 'Voyages & Lieux',
                },
                objects: {
                    title: 'Objets',
                },
                symbols: {
                    title: 'Symboles',
                },
                flags: {
                    title: 'Drapeaux',
                },
            }
        });
    }
});