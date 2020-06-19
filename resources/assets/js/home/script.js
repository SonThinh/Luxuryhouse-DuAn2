$(window).on('load', function () {
    $('.preloader').fadeOut(1000);
    setTimeout(function () {
        let divHeight = $('#header').height();
        $('.banner').css('margin-top', divHeight + 'px');
        $('.top-banner').css('margin-top', divHeight + 'px');
        $('.container').css('margin-top', divHeight + 'px');
        $('footer').css('margin-top', divHeight + 'px');
    }, 500);
});
$(".slider > div:gt(0)").hide();

setInterval(function () {
    $('.slider > div:first')
        .fadeOut(1000)
        .next()
        .fadeIn(1000)
        .end()
        .appendTo('.slider');
}, 5000);
$(document).ready(function () {
    $(".scroll").click(function (event) {
        event.preventDefault();
        $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
    });
    $().UItoTop({easingType: 'easeOutQuart'});
    //toggle
    $('.toggle-house-status').change(function () {
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
    $('.toggle-book-status').change(function () {
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
    //search
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
    //max price
    let max = $('input[name=max]').val();
    $(".price-slider").slider({
        range: true,
        min: 0,
        max: max,
        values: [0, max],
        slide: function (event, ui) {
            $("#price-min").val(ui.values[0]);
            $("#price-max").val(ui.values[1]);
        }
    });

    $("#price-min").val($(".price-slider").slider("values", 0));
    $("#price-max").val($(".price-slider").slider("values", 1));

    $("#price-min").change(function () {
        $("#price-slider").slider('values', 0, $(this).val());
    });
    $("#price-max").change(function () {
        $("#price-slider").slider('values', 1, $(this).val());
    });
    //datatable
    $('#dataTable').DataTable({
        "language": {
            "processing": "Đang xử lý...",
            "lengthMenu": "Xem _MENU_ mục",
            "emptyTable": "Trống",
            "zeroRecords": "Không tìm thấy dòng nào phù hợp",
            "info": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
            "infoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
            "infoFiltered": "(được lọc từ _MAX_ mục)",
            "infoPostFix": "",
            "search": "Tìm:",
            "url": "",
            "paginate": {
                "first": "Đầu",
                "previous": "Trước",
                "next": "Tiếp",
                "last": "Cuối"
            }
        }
    });
});

toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "200",
    "hideDuration": "2000",
    "timeOut": "1000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};
let getDates = function (startDate, endDate) {
    let dates = [],
        currentDate = startDate,
        addDays = function (days) {
            let date = new Date(this.valueOf());
            date.setDate(date.getDate() + days);
            return date;
        };
    while (currentDate <= endDate) {
        dates.push(currentDate);
        currentDate = addDays.call(currentDate, 1);
    }
    return dates;
};
let reverseDate = function (str) {
    return str.split('/').reverse().join('/');
};

$(function () {
    let today = new Date(moment());
    let min_night = $('input[name=max_date]').val();
    let i;
    let ListDate = [];
    let checkin_booked = [];
    let checkout_booked = [];
    let check_in = [];
    let check_out = [];
    //disable//
    let date_checkIn = $("input[name='checkin_booked[]']").map(function () {
        return $(this).val();
    }).get();
    let date_checkOut = $("input[name='checkout_booked[]']").map(function () {
        return $(this).val();
    }).get();
    for (i = 0; i < date_checkIn.length; i++) {
        checkin_booked.push(reverseDate(date_checkIn[i]));
    }
    for (i = 0; i < date_checkOut.length; i++) {
        checkout_booked.push(reverseDate(date_checkOut[i]));
    }
    for (i = 0; i < checkin_booked.length; i++) {
        let list = moment(checkin_booked[i]);
        check_in.push(list);
    }
    for (i = 0; i < checkout_booked.length; i++) {
        let list = moment(checkout_booked[i]);
        check_out.push(list);
    }

    for (i = 0; i < check_in.length; i++) {
        let dates = getDates(check_in[i], check_out[i]);
        dates.forEach(function (date) {
            let dateList = moment(date).format('DD/MM/YYYY');
            ListDate.push(dateList);
        });
    }
    //end-disable//
    let lastDate = [];
    let startDate = [];
    let start_date;
    checkout_booked.forEach(function (date) {
        lastDate = moment(date).startOf('day').add(1, 'day');
        startDate.push(lastDate);
    });
    start_date = startDate[0];
    // for (i = 0; i < startDate.length; i++) {
    //     if (moment() === startDate[i]) {
    //         start_date = startDate[i];
    //     }
    // }
    // console.log(start_date)
    // console.log(startDate)
    // console.log(check_in)

    $('input[name=date_search]').daterangepicker({
        opens: 'center',
        minDate: today,
        autoApply: true,
        locale: {
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Chọn",
            "cancelLabel": "Hủy",
            "fromLabel": "Từ",
            "toLabel": "Đến",
            "daysOfWeek": [
                "CN",
                "2",
                "3",
                "4",
                "5",
                "6",
                "7"
            ],
            "monthNames": [
                "Tháng 1",
                "Tháng 2",
                "Tháng 3",
                "Tháng 4",
                "Tháng 5",
                "Tháng 6",
                "Tháng 7",
                "Tháng 8",
                "Tháng 9",
                "Tháng 10",
                "Tháng 11",
                "Tháng 12"
            ],
            "firstDay": 1
        },
    });
    $('input[name=date_book]').daterangepicker({
        opens: 'center',
        autoApply: true,
        minDate: today,
        startDate: start_date,
        endDate: moment(start_date).startOf('day').add(min_night, 'day'),
        isInvalidDate: function (ele) {
            let currDate = moment(ele._d).format('DD/MM/YYYY');
            return ListDate.indexOf(currDate) !== -1;
        },
        locale: {
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Chọn",
            "cancelLabel": "Hủy",
            "fromLabel": "Từ",
            "toLabel": "Đến",
            "daysOfWeek": [
                "CN",
                "2",
                "3",
                "4",
                "5",
                "6",
                "7"
            ],
            "monthNames": [
                "Tháng 1",
                "Tháng 2",
                "Tháng 3",
                "Tháng 4",
                "Tháng 5",
                "Tháng 6",
                "Tháng 7",
                "Tháng 8",
                "Tháng 9",
                "Tháng 10",
                "Tháng 11",
                "Tháng 12"
            ],
            "firstDay": 1
        },
    }, function (start, end, label) {
        $('input[name=check_in]').val(start.format('DD/MM/YYYY'));
        $('input[name=check_out]').val(end.format('DD/MM/YYYY'));
    });
});
let loadFile = function (event) {
    let old = document.getElementById('img-old');
    if (old) {
        old.remove();
        let reader = new FileReader();
        reader.onload = function () {
            let output = document.getElementById('output');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    } else {
        let reader = new FileReader();
        reader.onload = function () {
            let output = document.getElementById('output');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
};

function previewIDImages() {
    let $preview = $('#preview_id_card').empty();
    if (this.files) $.each(this.files, readAndPreview);

    function readAndPreview(i, file) {
        if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
            return alert(file.name + " Không phải hình ảnh");
        }
        let reader = new FileReader();
        $(reader).on("load", function () {
            $preview.append($("<img/>", {src: this.result, height: 100}));
        });
        reader.readAsDataURL(file);

    }
}

$('#id_card_image').on("change", previewIDImages);

function previewBLImages() {
    let $preview = $('#preview_business_license').empty();
    if (this.files) $.each(this.files, readAndPreview);

    function readAndPreview(i, file) {
        if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
            return alert(file.name + " Không phải hình ảnh");
        }
        let reader = new FileReader();
        $(reader).on("load", function () {
            $preview.append($("<img/>", {src: this.result, height: 100}));
        });
        reader.readAsDataURL(file);

    }
}

$('#business_license_image').on("change", previewBLImages);

function previewHouseImages() {
    let $preview = $('#preview_house').empty();
    if (this.files) $.each(this.files, readAndPreview);

    function readAndPreview(i, file) {
        if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
            return alert(file.name + " Không phải hình ảnh");
        }
        let reader = new FileReader();
        $(reader).on("load", function () {
            $preview.append($("<img/>", {src: this.result, width: 165, height: 100}));
        });
        reader.readAsDataURL(file);

    }
}

$('#house_image').on("change", previewHouseImages);

$('select[name="selectCity"]').change(function (e) {
    e.preventDefault();
    let city_id = $('select[name="selectCity"]').val();
    let token = $("input[name='_token']").val();
    let url = $('select[name="selectCity"]').data('url');
    console.log(url);
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

$(document).on('click', '#btn-showPrice', function () {
    let checkin;
    let checkout;
    $('input[name=check_in]').val() === '' ? checkin = $('input[name=date_book]').data('daterangepicker').startDate.format('DD/MM/YYYY') : checkin = $('input[name=check_in]').val();
    $('input[name=check_out]').val() === '' ? checkout = $('input[name=date_book]').data('daterangepicker').endDate.format('DD/MM/YYYY') : checkout = $('input[name=check_out]').val();
    $('input[name=check_in_nav]').val(checkin);
    $('input[name=check_in_clone]').val(checkin);
    $('input[name=check_out_nav]').val(checkout);
    $('input[name=check_out_clone]').val(checkout);
    let check_in = moment(checkin, 'DD/MM/YYYY')
    let check_out = moment(checkout, 'DD/MM/YYYY')
    let days_range = check_out.diff(check_in, 'days');
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
});

$(document).on('click', '.close-btn-notify', function () {
    $(this).parents('.inf-bill').remove();
});
$(document).on('click', '#btn-host', function () {
    toastr.info('Đang đợi duyệt!')
});
