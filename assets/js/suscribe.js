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
    }
});