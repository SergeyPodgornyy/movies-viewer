$('#search').on('keydown', function(event) {
    if (event.which == 13 || event.keyCode == 13) {
        event.preventDefault();

        var parameter = $('#select').val();
        var searchText = $('#search').val();
        window.location.replace("index.php?"+parameter+"="+searchText);
    }
});