$(document).ready(function() {
    $('#send').click(function() {

        var emailInput = $('.new_email').val();
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (!(filter.test(emailInput))) {
            alert("Prijava nije uspesna")
            return false;
        }
        $.ajax({
            type: "POST",
            url: "php/newsletter.php",
            data: $('.new_email').serialize(),
            success: function(result) {
                console.log(emailInput);
                alert("Uspesna priajva");
            }
        });
        return false;
    });
})





/*
$(document).ready(function() {
    $('#send').click(function() {
        var email = $('.new_email').val();
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (!(filter.test(email))) {
            alert("Prijava nije uspesna")
            return false;
        }
        $.ajax({
            type: "post",
            url: "php/newsletter.php",
            data: { email: email },
            success: function(data) {
                alert("Uspesna priajva")
            }
        });
        return false;
    });
});*/