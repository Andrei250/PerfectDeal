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
            field.append('<option selected name="none" disabled>' + text + '</option>');

            response[0].forEach(element => {
                field.append('<option value="' + element['slug'] + '" name="' + element['slug'] + '">' + element['name'] + '</option>');
            });
        }
    });
}

function disableField(field, text) {
    field.attr('disabled', true);
    field.html('');
    field.append('<option selected name="none" disabled>' + text + '</option>');
}

function applyFilters(url, _token, place, domain, category, subcategory) {
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            _token: _token,
            'domain': domain,
            'category': category,
            'subcategory': subcategory,
        },
        success: function (response) {
            place.html("");
            response[0].forEach(element => {
                element.forEach(el => place.append(el));
            });
        }
    });
}
