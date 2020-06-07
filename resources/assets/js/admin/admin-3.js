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
