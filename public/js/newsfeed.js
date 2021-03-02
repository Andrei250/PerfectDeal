/* JS code for newsfeed*/
const categoriesSelect = $('#categories-select');
const subcategoriesSelect = $('#subcategories-select');
const _token = $('meta[name="csrf-token"]').attr('content');

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
                field.append('<option name="' + element['slug'] + '" >' + element['name'] + '</option>');
            });
        }
    });
}
