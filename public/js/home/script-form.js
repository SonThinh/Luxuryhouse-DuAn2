$('#btn-login').on('click', function (e) {
    e.preventDefault();
    let form = new FormData();
    form.append('email', $('input[name=email]').val());
    form.append('password', $('input[name=password]').val());
    form.append('remember', $('input[name=remember]:checked').val());
    form.append('_token', $('input[name=_token]').val());
    let url = $(this).attr('action');
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        processData: false,
        contentType: false,
        data: form,
        success: function (data) {
            if (data.errors) {
                $.each(data.errors, function (key, value) {
                    toastr.error(value);
                });
            } else {
                if (data.status === 'true') {
                    toastr.success(data.message);
                    setTimeout(
                        function () {
                            window.location.replace(data.url);
                        }, 1000);
                } else {
                    toastr.error(data.message);
                }
            }
        }
    });
});
$('#btn-reg').on('click', function (e) {
    e.preventDefault();
    let form = new FormData();
    form.append('email', $('input[name=email]').val());
    form.append('phone', $('input[name=phone]').val());
    form.append('password', $('input[name=password]').val());
    form.append('password_confirmation', $('input[name=password_confirmation]').val());
    form.append('_token', $('input[name=_token]').val());
    let url = $(this).attr('action');
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        processData: false,
        contentType: false,
        data: form,
        success: function (data) {
            if (data.errors) {
                $.each(data.errors, function (key, value) {
                    toastr.error(value);
                });
            } else {
                if (data.status === 'true') {
                    toastr.success(data.message);
                    setTimeout(
                        function () {
                            window.location.replace(data.url);
                        }, 1000);
                } else {
                    toastr.error(data.message);
                }
            }
        }
    });
});
$('#btn-update-user').on('click', function (e) {
    e.preventDefault();
    let form = new FormData();
    form.append('avatar', $('input[name=avatar]')[0].files[0]);
    form.append('name', $('input[name=name]').val());
    form.append('address', $('input[name=address]').val());
    form.append('birth', $('input[name=birth]').val());
    form.append('gender', $('input[name=gender]:checked').val());
    form.append('phone', $('input[name=phone]').val());
    form.append('google', $('input[name=google]').val());
    form.append('fb', $('input[name=fb]').val());
    form.append('description', $('textarea[name=description]').val());
    form.append('_token', $('input[name=_token]').val());
    let url = $('#update-user').attr('action');
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        processData: false,
        contentType: false,
        data: form,
        success: function (data) {
            if (data.errors) {
                $.each(data.errors, function (key, value) {
                    toastr.error(value);
                });
            } else {
                if (data.status === 'true') {
                    toastr.success(data.message);
                    setTimeout(
                        function () {
                            window.location.replace(data.url);
                        }, 1000);
                } else {
                    toastr.error(data.message);
                }
            }
        }
    });
});
$('#btn-change-pass').on('click', function (e) {
    e.preventDefault();
    let form = new FormData();
    form.append('password', $('input[name=password]').val());
    form.append('password_confirmation', $('input[name=password_confirmation]').val());
    form.append('_token', $('input[name=_token]').val());
    let url = $(this).attr('action');
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        processData: false,
        contentType: false,
        data: form,
        success: function (data) {
            if (data.errors) {
                $.each(data.errors, function (key, value) {
                    toastr.error(value);
                });
            } else {
                if (data.status === 'true') {
                    toastr.success(data.message);
                    setTimeout(
                        function () {
                            window.location.replace(data.url);
                        }, 1000);
                } else {
                    toastr.error(data.message);
                }
            }
        }
    });
});
$('#btn-reg-host').on('click', function (e) {
    e.preventDefault();
    let form = new FormData();
    form.append('id_card', $('input[name=id_card]').val());
    form.append('imgIdCard', $('input[name=imgIdCard]')[0].files[0]);
    form.append('business_license', $('input[name=business_license]').val());
    form.append('imgBL', $('input[name=imgBL]')[0].files[0]);
    form.append('_token', $('input[name=_token]').val());
    let url = $(this).attr('action');
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: url,
        processData: false,
        contentType: false,
        data: form,
        success: function (data) {
            if (data.errors) {
                $.each(data.errors, function (key, value) {
                    toastr.error(value);
                });
            } else {
                if (data.status === 'true') {
                    toastr.success(data.message);
                    setTimeout(
                        function () {
                            window.location.replace(data.url);
                        }, 1000);
                } else {
                    toastr.error(data.message);
                }
            }
        }
    });
});
// $('#btn-agree-add-house').on('click', function (e) {
//     e.preventDefault();
//     let form = new FormData();
//     console.log($('input[name=house_utilities]').val())
//     if (undefined !== $('input[name=house_image]').files && $('input[name=house_image]').files.length) {
//     } else {
//
//     }
//     for (let i = 0; i < $('input[name=house_image]').files.length; i++) {
//         form.append("house_image[]", $('input[name=house_image]').files[i]);
//     }
//     form.append('host', $('input[name=host]').val());
//     form.append('name', $('input[name=name]').val());
//     form.append('house_type', $('input[name=house_type]:checked').val());
//     form.append('house_number', $('input[name=house_number]:checked').val());
//     form.append('selectCity', $('select[name=selectCity]').val());
//     form.append('selectCity', $('select[name=selectAreas]').val());
//     form.append('n_bed', $('input[name=n_bed]').val());
//     form.append('n_bath', $('input[name=n_bath]').val());
//     form.append('n_room', $('input[name=n_room]').val());
//     form.append('max_guest', $('input[name=max_guest]').val());
//     form.append('description', $('textarea[name=description]').val());
//     form.append('house_utilities[]', $('input[name=house_utilities]').val());
//     form.append('trip_type', $('input[name=trip_type]').val());
//     form.append('cancel_rules', $('textarea[name=cancel_rules]').val());
//     form.append('attention', $('textarea[name=attention]').val());
//     form.append('check_in', $('input[name=check_in]').val());
//     form.append('check_out', $('input[name=check_out]').val());
//     form.append('m_to_t', $('input[name=m_to_t]').val());
//     form.append('f_to_s', $('input[name=f_to_s]').val());
//     form.append('exGuest_fee', $('input[name=exGuest_fee]').val());
//     form.append('min_night', $('input[name=min_night]').val());
//     console.log(form)
// });
$('#btn-comment').on('click', function (e) {
    e.preventDefault();
    let form = new FormData();
    form.append('comment', $('input[name=comment]').val());
    form.append('_token', $('input[name=_token]').val());
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: $('#comment').attr('action'),
        processData: false,
        contentType: false,
        data: form,
        success: function (data) {
            if (data.status === 'true') {
                toastr.success(data.message);
                setTimeout(
                    function () {
                        window.location.replace(data.url);
                    }, 1000);
            } else {
                toastr.error(data.message);
            }
        }
    });
});
