$(function () {
    $('#comment').emojioneArea({
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
})
