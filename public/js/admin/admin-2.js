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
                    toastr.success(data.message);
                    setTimeout(function () {
                        window.location.replace(data.url);
                    }, 1000);
                } else {
                    toastr.error(data.message);
                }
            }
        }
    });
});
$(document).on('click', '#btn-city', function (e) {
    e.preventDefault();
    let form = new FormData();
    form.append('city_name', $('input[name=city_name]').val());
    form.append('image_city', $('input[name=image_city]')[0].files[0]);
    form.append('_token', $('input[name=_token]').val());
    form.append('city_description', $('textarea[name=city_description]').val());
    let url = $(this).attr('action');
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
                    toastr.success(data.message);
                    setTimeout(function () {
                        window.location.replace(data.url);
                    }, 1000);
                } else {
                    toastr.error(data.message);
                }
            }
        }
    });
});
$(document).on('click', '#btn-area', function (e) {
    e.preventDefault();
    let form = new FormData();
    form.append('city_name', $('input[name=city_name]:checked').val());
    form.append('area_name', $('input[name=area_name]').val());
    form.append('_token', $('input[name=_token]').val());
    let url = $(this).attr('action');
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
                    toastr.success(data.message);
                    setTimeout(function () {
                        window.location.replace(data.url);
                    }, 1000);
                } else {
                    toastr.error(data.message);
                }
            }
        }
    });
});
$(document).on('click', '#btn-trip-type', function (e) {
    e.preventDefault();
    let form = new FormData();
    form.append('name', $('input[name=name]').val());
    form.append('key', $('input[name=key]').val());
    form.append('_token', $('input[name=_token]').val());
    let url = $(this).attr('action');
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
                    toastr.success(data.message);
                    setTimeout(function () {
                        window.location.replace(data.url);
                    }, 1000);
                } else {
                    toastr.error(data.message);
                }
            }
        }
    });
});
$(document).on('click', '#btn-utility', function (e) {
    e.preventDefault();
    let form = new FormData();
    form.append('symbol', $('input[name=symbol]').val());
    form.append('key', $('input[name=key]').val());
    form.append('icon', $('input[name=icon]').val());
    form.append('_token', $('input[name=_token]').val());
    let url = $(this).attr('action');
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
                    toastr.success(data.message);
                    setTimeout(function () {
                        window.location.replace(data.url);
                    }, 1000);
                } else {
                    toastr.error(data.message);
                }
            }
        }
    });
});
$(document).on('click', '#btn-event', function (e) {
    e.preventDefault();
    let form = new FormData();
    form.append('key', $('input[name=key]').val());
    form.append('image_event', $('input[name=image_event]')[0].files[0]);
    form.append('link', $('input[name=link]').val());
    form.append('_token', $('input[name=_token]').val());
    let url = $(this).attr('action');
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
                    toastr.success(data.message);
                    setTimeout(function () {
                        window.location.replace(data.url);
                    }, 1000);
                } else {
                    toastr.error(data.message);
                }
            }
        }
    });
});
