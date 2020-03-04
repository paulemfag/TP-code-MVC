$(function () {
    // si formulaire s'inscrire envoyé (formulaire login et texte cachés quand on arrive sur la page)
    if ($('#suscribe').attr('value') === 'alreadySubmittedOnce') {
        $('#suscribeItems').show();
        $('#connectItems').hide();
        $('#presentationText').hide();
        $('#forgottenPassword').hide();
    } // si formulaire login envoyé (formulaire s'inscrire et texte cachés quand on arrive sur la page)
    else if ($('#login').attr('value') === 'alreadySubmittedOnce') {
        $('#suscribeItems').hide();
        $('#connectItems').show();
        $('#presentationText').hide();
        $('#forgottenPassword').hide();
    } // si formulaire login envoyé (formulaire s'inscrire et texte cachés quand on arrive sur la page)
    else if ($('#recuperation').attr('value') === 'alreadySubmittedOnce') {
        $('#suscribeItems').hide();
        $('#connectItems').hide();
        $('#presentationText').hide();
        $('#forgottenPassword').show();
    }
    // formulaires cachés et texte affiché quand on arrive sur la page
    else {
        $('#suscribeItems').hide();
        $('#connectItems').hide();
        $('#presentationText').show();
        $('#forgottenPassword').hide();
    }
    //Vérifications modal cookies

    //empêche de fermer la modal // click backdrop
    $('#userAuthorizationModal').modal({backdrop: 'static', keyboard: false});
    if (!localStorage.getItem('storageAuthorization')) {
        $('#userAuthorizationModal').modal('show');
    } else {
        $('#userAuthorizationModal').modal('hide');
    }
    $('#storageDecline').click(function () {
        location.href = "https://www.google.com/";
    });
    $('#storageAllow').click(function () {
        localStorage.setItem('storageAuthorization', 'true');
    });
});

// quand on clique sur le bouton se connecter affiche le formulaire de connexion
$('#connectbtn').click(function () {
    $('#suscribeItems').hide();
    $('#connectItems').show();
    $('#presentationText').hide();
    $('#forgottenPassword').hide();
});

// quand on clique sur "Je n'ai pas de compte" affiche le formulaire d'inscription
$('#noAccount').click(function () {
    $('#suscribeItems').show();
    $('#connectItems').hide();
    $('#presentationText').hide();
    $('#forgottenPassword').hide();
});

// quand on clique sur "Mot de passe oublié" affiche le formulaire de récupération de MDP
$('#lostPassword').click(function () {
    $('#suscribeItems').hide();
    $('#connectItems').hide();
    $('#presentationText').hide();
    $('#forgottenPassword').show();
});

// quand on clique sur le bouton s'inscrire affiche le formulaire d'inscription
$('#suscribebtn').click(function () {
    $('#suscribeItems').show();
    $('#connectItems').hide();
    $('#presentationText').hide();
    $('#forgottenPassword').hide();
});

// quand on clique sur le nom du site affiche le texte de présentation
$('#FILL').click(function () {
    $('#suscribeItems').hide();
    $('#connectItems').hide();
    $('#presentationText').show();
    $('#forgottenPassword').hide();
});