$(document).ready(function() {

    var form = $('#form'),
        email = $('#kontakt_email'),
        subject = $('#kontakt_ime'),
        message = $('#kontakt_poruka'),
        info = $('#info'),
        submit = $("#submit");

    form.on('input', '#kontakt_email, #kontakt_ime, #kontakt_poruka', function() {
        $(this).css('border-color', '');
        info.html('').slideUp();
    });

    submit.on('click', function(e) {
        e.preventDefault();
        if (validate()) {
            $.ajax({
                type: "POST",
                url: "mailer.php",
                data: form.serialize(),
                dataType: "json",
                success: function(result) {
                    alert("Poruka je uspesno poslata");
                }
            })

        }
    });

    function validate() {
        var valid = true;
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (!regex.test(email.val())) {
            email.css('border-color', 'red');
            valid = false;
        }
        if ($.trim(subject.val()) === "") {
            subject.css('border-color', 'red');
            valid = false;
        }
        if ($.trim(message.val()) === "") {
            message.css('border-color', 'red');
            valid = false;
        }

        return valid;
    }

});