$(document).on('click', '#btn-login-admin', function (e) {
    e.preventDefault();
    let form = new FormData();
    form.append('email', $('input[name=email]').val());
    form.append('password', $('input[name=password]').val());
    form.append('_token', $('input[name=_token]').val());
    form.append('remember', $('input[name=remember]:checked').val());
    let url = $('#admin-login').attr('action');
    $.ajax({
        type: "POST",
        dataType: "json",
        url: url,
        data: form,
        processData: false,
        contentType: false,
        success: function (data) {
            if (data.errors) {
                $.each(data.errors, function (key, value) {
                    toastr.error(value);
                });
            } else {
                if (data.status === 'true') {
                    window.location.reload();
                } else {
                    toastr.error(data.message);
                }
            }
        }
    });
});
