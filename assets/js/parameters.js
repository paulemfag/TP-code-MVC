$(function () {
    // si le formulaire changement de mot de passe a déjà été envoyé le réaffiche
    if ($('#changeMyPassword').attr('value') === 'alreadySubmittedOnce') {
        $('#parametersMenu').show();
        $('#changeTypeOfAccount').hide();
        $('#changePasswordItems').show();
        $('#removeAccountItems').hide();
        // si le formulaire suppression du compte a déjà été envoyé le réaffiche
    } else if ($('#removeMyAccount').attr('value') === 'alreadySubmittedOnce') {
        $('#parametersMenu').show();
        $('#changeTypeOfAccount').hide();
        $('#changePasswordItems').hide();
        $('#removeAccountItems').show();
        // si le formulaire changement du type de compte a déjà été envoyé le réaffiche
    } else if ($('#changeAccountType').attr('value') === 'alreadySubmittedOnce') {
        $('#parametersMenu').show();
        $('#changeTypeOfAccount').show();
        $('#changePasswordItems').hide();
        $('#removeAccountItems').hide();
        // si le update c'est bien passé redirige vers la page index.php
    } else if ($('#changeAccountType').attr('value') === 'isOk') {
        redir();
    } else {
        // quand on arrive sur la page n'affiche que le menu
        $('#parametersMenu').show();
        $('#changeTypeOfAccount').hide();
        $('#changePasswordItems').hide();
        $('#removeAccountItems').hide();
    }
});

// fonction qui redirige vers la page "index.php"
function redir() {
    self.location.href = '/?connectMe=isOk'
}

//quand on clique sur le lien "Changer mon type de compte"
$('#changeAccount').click(function () {
    $('#parametersMenu').show();
    $('#changeTypeOfAccount').show();
    $('#changePasswordItems').hide();
    $('#removeAccountItems').hide();
});

// quand on clique sur le lien "Changer mon mot de passe"
$('#changePass').click(function () {
    $('#changePasswordItems').show();
    $('#changeTypeOfAccount').hide();
    $('#parametersMenu').show();
    $('#removeAccountItems').hide();
});

// quand on clique sur le lien "Supprimer mon compte"
$('#removeAccount').click(function () {
    $('#parametersMenu').show();
    $('#changeTypeOfAccount').hide();
    $('#changePasswordItems').hide();
    $('#removeAccountItems').show();
});
