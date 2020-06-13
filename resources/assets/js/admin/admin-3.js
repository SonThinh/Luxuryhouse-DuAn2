$(document).ready(function () {
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
$(function () {
    $('.toggle-class').change(function () {
        let h_status = $(this).prop('checked') == true ? 1 : 0;
        let house_id = $(this).data('id');
        let url = $(this).data('url');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: url,
            data: {status: h_status, id: house_id},
            success: function (data) {
                toastr.success(data.success);
            }
        });
    })
});
