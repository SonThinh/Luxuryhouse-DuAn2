$(function () {
    $('input[name="datetimes"]').daterangepicker({
        timePicker: true,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(32, 'hour'),
        locale: {
            format: 'DD/MM hh:mm A'
        }
    });
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
            $.each(response.data, function(key, value){
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
})
