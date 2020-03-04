$(function () {
    //empêche de fermer la modal / click backdrop
    $('#rules').modal({backdrop: 'static', keyboard: false});
    if (!localStorage.getItem('rulesAuthorization')) {
        $('#rules').modal('show');
    } else {
        $('#rules').modal('hide');
    }
    $('#storageDecline').click(function () {
        location.href = "https://www.google.com/";
    });
    $('#storageAllow').click(function () {
        localStorage.setItem('rulesAuthorization', 'true');
    });
});
