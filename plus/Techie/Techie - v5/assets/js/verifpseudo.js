$(document).ready(function () {
    $('#pseudo').keyup(function () {
        
        var pseudo = $('#pseodo').val();
        pseudo = $.tril(pseudo);
        if (pseudo != "") {
            $.post(
                '../../php/dispopseudo.php',
                {
                    pseudoPHP:pseudo
                },
                function (reponse) {
                    $('.feedBack').html(reponse);
                }
            );
        } 
        else {
            $('feedBack').text('<h3>' + 'Veuller saisir un pseudo' + '<h3>');
        }
    });
});