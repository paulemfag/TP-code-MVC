$(function () {
    //Vérifications modal cookies
    //Empêche de fermer la modal // click backdrop
    $('#userAuthorizationModal').modal({backdrop: 'static', keyboard: false});
    if (!localStorage.getItem('storageAuthorization')) {
        $('#userAuthorizationModal').modal('show');
    } else {
        $('#userAuthorizationModal').modal('hide');
    }
    if (localStorage.getItem('analyticsAuthorization')){
        $('#analytics').attr('checked', 'checked')
    }
    $('#storageDecline').click(function () {
        location.href = "https://www.google.com/";
    });
    $('#storageAllow').click(function () {
        if (document.getElementById('analytics').checked === true) {
            localStorage.setItem('analyticsAuthorization', 'true');
        }
    });
});