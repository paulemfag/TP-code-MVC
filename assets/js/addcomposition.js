$(function () {
    // cache l'alert
    $('#successfullCreation').hide();
    // cache le champ autre style quand on arrive sur la page
    $('#otherChoice').hide();
    setInterval(function () {
        //récupération de l'option sélectionné
        var option = $('#compositionStyle option:selected').text();
        // Si le style choisi est autre affiche le champ autre
        if (option === 'Autre') {
            $('#otherChoice').show();
        }
        // si l'option n'est pas égale à Autre (quand on change de 'autre' à une autre option)
        else if (option !== 'Autre') {
            $('#otherChoice').hide();
        }
    }, 1);
    //récupère la valeur du bouton submit
    if ($('#newComposition').val() === 'isOk'){
        $('#successfullCreation').show();
        setInterval(function redir(){
            self.location.href="mypage.php"
        }, 2000);
        redir();
    }
});
