$.get("html_files/footer.html", function(data) {
    $("#footer").replaceWith(data);
});
$.get("html_files/navigacija.html", function(data) {
    $("#navig").replaceWith(data);
});
$.get("html_files/sidebar.html", function(data) {
    $("#sidebar").replaceWith(data);
});