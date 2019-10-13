$(document).ready(function() {
    $("#registracijaSubmit").on('click', function(e) {
        e.preventDefault();
        var login_form = $("#sign_up_form");
        var form_data = JSON.stringify(login_form.serializeObject());

        // pa ih posalji
        $.ajax({
            url: "api/create_user.php",
            type: "POST",
            contentType: 'application/json',
            data: form_data,
            success: function(result) {

                // sacuvaj token u kuki
                //setCookie("jwt", result.jwt, 1); //Zavrsi poruku korisniku
                if (result.success) {
                    $('#registration_succes-hide').hide();
                    $('#registration_succes').html('<label data-error="wrong" data-success="right" for="modalLRInput10">Uspešno ste se registrovali. Prijavite se</label>');
                    $("#panel1activate").click();
                } else {

                }

            },
            error: function(xhr, resp, text) {
                // ako ima greska pri prijavi
                $('#response').html("<div class='alert alert-danger'>Korisnik sa tom email adresom vec postoji</div>");
                login_form.find('input').val('');
            }
        });

        return false;

    });

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    $("#login_user").on('click', function() {
        var login_form = $("#login_form");
        var form_data = JSON.stringify(login_form.serializeObject());

        // pa ih posalji
        $.ajax({
            url: "api/login.php",
            type: "POST",
            contentType: 'application/json',
            data: form_data,
            success: function(result) {

                // sacuvaj token u kuki
                setCookie("jwt", result.jwt, 1);
                //document.location.href = "/zavrsniprojekat/index.html";
                $('#modalLRForm').modal('toggle');
                $('#LogREGbtn').hide();
                $("#logovanKorisnik").show();



            },
            error: function(xhr, resp, text) {
                $('#registration_succes-hide').hide();
                $('#registration_succes').html('<label data-error="wrong" data-success="right" for="modalLRInput10 class="text-danger" ">Prijava nije uspesna</label>');
            }
        });

        return false;
    });
    $("#logout").on('click', function() {
        showLoginPage();

        $('#response').html("<div class='alert alert-info'>Otisao si.</div>");
    });

    function showLoginPage() {
        //logout.php fajl za uklanjanje tokena sa servera
        // ukloni token
        setCookie("jwt", "", 1);
    }
});