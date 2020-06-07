$(function () {
    let max_date = parseInt($('input[name=max_date]').val());
    $("#txtCheckin").datepicker({
        beforeShowDay: DisableDates,
        minDate: "today",
        dateFormat: "dd-mm-yy",
        dayNamesMin: ['CN', '2', '3', '4', '5', '6', '7'],
        monthNames: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
        onSelect: function (date) {
            let date2 = $('#txtCheckin').datepicker('getDate');
            date2.setDate(date2.getDate() + max_date);
            $('#txtCheckout').datepicker('setDate', date2);
            $('#txtCheckout').datepicker('option', 'minDate', date2);
        }
    });
    $('#txtCheckout').datepicker({
        dateFormat: "dd-mm-yy",
        beforeShowDay: DisableDates,
        dayNamesMin: ['CN', '2', '3', '4', '5', '6', '7'],
        monthNames: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
        onClose: function () {
            let dt1 = $('#txtCheckin').datepicker('getDate');
            let dt2 = $('#txtCheckout').datepicker('getDate');
            if (dt2 <= dt1) {
                let minDate = $('#txtCheckout').datepicker('option', 'minDate');
                $('#txtCheckout').datepicker('setDate', minDate);
            }
        }
    });
    let checkin = $('input[name=checkin_booked]').val();
    let checkout = $('input[name=checkout_booked]').val();
    let disabledDates = [''];
    if (checkin !== 0 && checkout !== 0) {
        disabledDates = dateList(checkin, checkout);

        function dateList(from, to) {
            let getDate = function (date) {
                let m = date.getMonth(), d = date.getDate();
                return date.getFullYear() + '-' + (m < 10 ? '0' + m : m) + '-' + (d < 10 ? '0' + d : d);
            };
            let fs = from.split('-'), startDate = new Date(fs[0], fs[1], fs[2]), result = [getDate(startDate)],
                start = startDate.getTime(), ts, end;

            if (typeof to == 'undefined') {
                end = new Date().getTime();
            } else {
                ts = to.split('-');
                end = new Date(ts[0], ts[1], ts[2]).getTime();
            }
            while (start < end) {
                start += 86400000;
                startDate.setTime(start);
                result.push(getDate(startDate));
            }
            return result;
        }
    }

    function DisableDates(date) {
        let string = jQuery.datepicker.formatDate('yy-mm-dd', date);
        return [disabledDates.indexOf(string) === -1]
    }
});
var loadFile = function (event) {
    var old = document.getElementById('img-old');
    if (old) {
        old.remove();
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('output');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    } else {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('output');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
};

function previewIDImages() {
    var $preview = $('#preview_id_card').empty();
    if (this.files) $.each(this.files, readAndPreview);

    function readAndPreview(i, file) {
        if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
            return alert(file.name + " Không phải hình ảnh");
        }
        var reader = new FileReader();
        $(reader).on("load", function () {
            $preview.append($("<img/>", {src: this.result, height: 100}));
        });
        reader.readAsDataURL(file);

    }
}

$('#id_card_image').on("change", previewIDImages);

function previewBLImages() {
    var $preview = $('#preview_business_license').empty();
    if (this.files) $.each(this.files, readAndPreview);

    function readAndPreview(i, file) {
        if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
            return alert(file.name + " Không phải hình ảnh");
        }
        var reader = new FileReader();
        $(reader).on("load", function () {
            $preview.append($("<img/>", {src: this.result, height: 100}));
        });
        reader.readAsDataURL(file);

    }
}

$('#business_license_image').on("change", previewBLImages);

function previewHouseImages() {
    var $preview = $('#preview_house').empty();
    if (this.files) $.each(this.files, readAndPreview);

    function readAndPreview(i, file) {
        if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
            return alert(file.name + " Không phải hình ảnh");
        }
        var reader = new FileReader();
        $(reader).on("load", function () {
            $preview.append($("<img/>", {src: this.result, height: 100}));
        });
        reader.readAsDataURL(file);

    }
}

$('#house_image').on("change", previewHouseImages);


$('select[name="selectCity"]').change(function (e) {
    e.preventDefault();
    let city_id = $(this).val();
    let token = $("input[name='_token']").val();
    let url = $(this).data('url');
    $.ajax({
        url: url,
        method: 'POST',
        data: {city_id: city_id, _token: token},
        success: function (response) {
            $("select[name='selectAreas']").html('');
            $.each(response.data, function (key, value) {
                $("select[name='selectAreas']").append(
                    "<option value=" + value.id + ">" + value.name + "</option>"
                );
            });
        }
    });

});
$('input[name="agree"]').click(function () {
    if ($(this).prop("checked") == true) {
        $('#btn-dis').hide();
        $('#btn-agree').removeClass('d-none');
    } else {
        $('#btn-dis').show();
        $('#btn-agree').addClass('d-none');
    }
});
$(function () {
    $('.toggle-class').change(function () {
        let h_status = $(this).prop('checked') == true ? 1 : 0;
        let house_id = $(this).data('id');
        let url = $(this).data('url');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: url,
            data: {h_status: h_status, id: house_id},
            success: function (data) {
                toastr.success(data.success);
            }
        });
    })
});
$(function () {
    $('.toggle-class').change(function () {
        let status = $(this).prop('checked') == true ? 1 : 0;
        let book_id = $(this).data('id');
        let url = $(this).data('url');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: url,
            data: {status: status, id: book_id},
            success: function (data) {
                toastr.success(data.success);
            }
        });
    })
});
$(document).on('click', '#btn-showPrice', function () {
    if ($('input[name=checkin]').val() === '' && $('input[name=checkout]').val() === '') {
        toastr.error('Vui lòng chọn lịch trình!');
        $("#btn-booking-request").prop('disabled', true);

    } else {
        $("#btn-booking-request").prop('disabled', false);
        let checkin = moment($('input[name=checkin]').val(), 'DD/MM/YYYY');
        let checkout = moment($('input[name=checkout]').val(), 'DD/MM/YYYY');

        $('input[name=check_in]').val($('input[name=checkin]').val());
        $('input[name=check_in_clone]').val($('input[name=checkin]').val());
        $('input[name=check_out]').val($('input[name=checkout]').val());
        $('input[name=check_out_clone]').val($('input[name=checkout]').val());

        let days_range = checkout.diff(checkin, 'days');
        $('input[name=dates_range]').val(days_range);
        $("#hire_dates").append("Giá cho thuê " + days_range + " đêm");
        let price = parseInt($('input[name=price]').val());
        let n_person;
        let max_guest = parseInt($('input[name=max_guest]').val());
        let total;
        let extra_guest = parseInt($('input[name=Ex_guest]').val());
        let price_days_range = price * days_range;
        $('input[name=price_hire_dates]').val(price_days_range);
        $('input[name=n_person]').change(function () {
            if (this.getAttribute('value') === this.value) {
                n_person = $('input[name=n_person]').val();
                total = price_days_range;
                $('input[name=total]').val(total);
            } else {
                n_person = parseInt(this.value);
                if (n_person > max_guest) {
                    total = price_days_range + extra_guest * (n_person - max_guest);
                    $('#fee_extra_guest').show();
                    $('input[name=Ex_fee]').val(extra_guest * (n_person - max_guest));
                } else {
                    $('#fee_extra_guest').hide();
                    total = price_days_range;
                }
                $('input[name=total]').val(total);
            }
        }).change();
    }
});
$("#check-in").datepicker({
    minDate: "today",
    dateFormat: "dd-mm-yy",
    dayNamesMin: ['CN', '2', '3', '4', '5', '6', '7'],
    monthNames: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
    onSelect: function (date) {
        let date2 = $('#check-in').datepicker('getDate');
        date2.setDate(date2.getDate());
        $('#check-out').datepicker('setDate', date2);
        $('#check-out').datepicker('option', 'minDate', date2);
    }
});
$('#check-out').datepicker({
    dateFormat: "dd-mm-yy",
    dayNamesMin: ['CN', '2', '3', '4', '5', '6', '7'],
    monthNames: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
    onClose: function () {
        let dt1 = $('#check-in').datepicker('getDate');
        let dt2 = $('#check-out').datepicker('getDate');
        if (dt2 <= dt1) {
            let minDate = $('#check-out').datepicker('option', 'minDate');
            $('#check-out').datepicker('setDate', minDate);
        }
    }
});
$(document).ready(function ($) {
    let city = new Bloodhound({
        remote: {
            url: '/Luxuryhouse-DuAn2/public/search-city/name?value=%QUERY%',
            wildcard: '%QUERY%'
        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });
    let house = new Bloodhound({
        remote: {
            url: '/Luxuryhouse-DuAn2/public/search-house/name?value=%QUERY%',
            wildcard: '%QUERY%'
        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });

    $("#search-input").typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    }, [
        {
            source: city.ttAdapter(),
            name: 'cities-name',
            display: function (data) {
                return data.name;
            },
            templates: {
                empty: [],
                header: [
                    '<h3 class="top-list-search">Thành phố</h3>'
                ],
                suggestion: function (data) {
                    return '<p style="color:black;" class="list-group-item">' + data.name + '</p>';
                }
            }
        }, {
            source: house.ttAdapter(),
            name: 'houses-name',
            display: function (data) {
                return data.name;
            },
            templates: {
                empty: [],
                header: [
                    '<h3 class="top-list-search">Nhà, Căn hộ</h3>'
                ],
                suggestion: function (data) {
                    return '<p class="list-group-item" style="color: black">' + data.name + '</p>';
                }
            }
        },
    ]);
});

$(document).ready(function () {
    let max = $('input[name=max]').val();
    $("#price-slider").slider({
        range: true,
        min: 0,
        max: max,
        values: [0, max],
        slide: function (event, ui) {
            $("#price-min").val(ui.values[0]);
            $("#price-max").val(ui.values[1]);
        }
    });

    $("#price-min").val($("#price-slider").slider("values", 0));
    $("#price-max").val($("#price-slider").slider("values", 1));

    $("#price-min").change(function() {
        $("#price-slider").slider('values',0,$(this).val());
    });
    $("#price-max").change(function() {
        $("#price-slider").slider('values',1,$(this).val());
    });
});
$(document).on('change', '#sort-data', function () {
    window.location.replace($(this).val());
});
