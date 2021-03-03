/* JS code for newsfeed*/

function makeRequest(url, _token, field, text) {
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            _token: _token,
        },
        success: function (response) {
            field.removeAttr('disabled');
            field.html('');
            field.append('<option selected name="disabled" disabled>' + text + '</option>');

            response[0].forEach(element => {
                field.append('<option value="' + element['slug'] + '" >' + element['name'] + '</option>');
            });
        }
    });
}

function disableField(field, text) {
    field.attr('disabled', true);
    field.html('');
    field.append('<option selected name="disabled" disabled>' + text + '</option>');
}
