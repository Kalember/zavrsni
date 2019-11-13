$(document).ready(function() {


    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }


    //Moze koljac
    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }

            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }



    function showUpdateAccountForm() {
        // validacija tokena z apristup
        var jwt = $.cookie('jwt');
        $.post("api/validate_token.php", JSON.stringify({
            jwt: jwt
        })).done(function(result) {

            // ako je ok
            var html = `
<h2 class="mt-3 text-info">Izmeni podatke</h2>
<form id='update_account_form' class="mb-3 text-info">
<div class="form-group">
<label for="firstname">Ime</label>
<input type="text" class="form-control" name="firstname" id="firstname" required value="` + result.data.firstname + `" />
</div>

<div class="form-group">
<label for="lastname">Prezime</label>
<input type="text" class="form-control" name="lastname" id="lastname" required value="` + result.data.lastname + `" />
</div>

<div class="form-group">
<label for="email">Email</label>
<input type="email" class="form-control" name="email" id="email" required value="` + result.data.email + `" />
</div>

<div class="form-group">
<label for="password">Password</label>
<input type="password" class="form-control" name="password" id="password" />
</div>

<button type='submit' class='btn btn-primary'>
Sacuvaj promene
</button>
<a href="#" id="delete">
Obrisi nalog</a>
</form>
`;


            $('#content').html(html);
        })
    }

    $(document).on('click', '#update_account', function(e) {
        e.preventDefault();
        showUpdateAccountForm();
    });
    $(document).on('submit', '#update_account_form', function() {
        var update_account_form = $(this);

        // validiraj token za pristup
        var jwt = $.cookie('jwt');

        // uzmi podatke
        var update_account_form_obj = update_account_form.serializeObject()

        // dodaj token u objekat...
        update_account_form_obj.jwt = jwt;

        // pa ga prebaci u string...
        var form_data = JSON.stringify(update_account_form_obj);

        // ...i posalji api
        $.ajax({
            url: "api/update_user.php",
            type: "POST",
            contentType: 'application/json',
            data: form_data,
            success: function(result) {

                // obavesti smaraca
                $('#response').html("<div class='alert alert-success'>Podaci su izmenjeni.</div>");
                alert("Uspesno promenjeni podaci");
                // snimi token u kuki
                setCookie("jwt", result.jwt, 1);
            },

            // greske
            error: function(xhr, resp, text) {
                if (xhr.responseJSON.message == "Ne mere") {
                    $('#response').html("<div class='alert alert-danger'>nije moguce da ti se promene podatci, ostajes to sto jesi</div>");
                } else if (xhr.responseJSON.message == "nece moci") {
                    showLoginPage();
                    $('#response').html("<div class='alert alert-success'>Prijavi se pa menjaj</div>");
                }
            }
        });

        return false;
    });

})