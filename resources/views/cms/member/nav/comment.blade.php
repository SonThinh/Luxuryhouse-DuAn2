<div id="form-comment" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">Bình luận về chỗ ở</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="POST" class="mt-3" id="comment"
                      autocomplete="off"
                      action="{{route('users.postComment',['id'=>auth()->id(),'code'=>$booking->code])}}"
                >
                    @csrf
                    <div class="form-group">
                        <label class="w-100">
                            <input type="text" class="form-control" name="comment">
                        </label>
                    </div>
                    <div class="modal-footer d-grid btn-form-n-btn">
                        <input class="btn btn-block btn-primary m-auto" type="submit" id="btn-comment"
                               value="Đăng bình luận">
                        <button type="button" class="btn btn-block btn-danger m-auto" data-dismiss="modal">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

