<div id="form-update-user" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">Thông tin thành viên</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="POST" class="mt-3" id="update-user"
                      autocomplete="off" enctype="multipart/form-data"
                      action="{{route('users.dashboard.updateUser',[$user->id])}}"
                >
                    @csrf
                    @php
                        $image = json_decode($user->avatar);
                    @endphp
                    <div class="form-group">
                        <label>
                            <input name="avatar" type="file" accept="image/*" onchange="loadFile(event)"
                                   class="d-none">
                            @isset($image)
                                <img id="img-old" src="{{asset($image->image_path)}}" alt="avatar"
                                     style="width: 25%"/>
                                <img id="output" alt=""
                                     style="width: 50%;"/>
                            @else
                                <img id="img-old" alt=""
                                     src="{{asset('../resources/assets/images/avatar/avatar-default.png')}}"
                                     style="width: 50%;"/>
                                <img id="output" alt=""
                                     style="width: 50%;"/>
                            @endisset
                        </label>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" disabled
                               value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Tên"
                               value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="address" placeholder="Địa chỉ"
                               value="{{$user->address}}">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="date" name="birth" placeholder="Ngày sinh"
                               value="{{$user->birth}}">
                    </div>
                    <div class="form-group">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" value="nam"
                                       @if($user->gender === 'nam') checked @endif>Nam
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" value="nữ"
                                       @if($user->gender === 'nữ') checked @endif>Nữ
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" value="khác"
                                       @if($user->gender === 'khác') checked @endif>Khác
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="tel" name="phone" placeholder="Số điện thoại"
                               value="{{$user->phone}}">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="google" placeholder="Google"
                               value="{{$user->google}}">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="fb" placeholder="Facebook"
                               value="{{$user->facebook}}">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="description" rows="5"
                                  placeholder="Mô tả về bản thân">{{$user->description}}</textarea>
                    </div>
                    <div class="modal-footer d-grid btn-form-n-btn">
                        <input class="btn btn-block btn-primary m-auto" type="submit" id="btn-update-user" value="Cập nhật">
                        <button type="button" class="btn btn-block btn-danger m-auto" data-dismiss="modal">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

