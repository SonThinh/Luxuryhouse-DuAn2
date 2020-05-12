<!--banner-->
<div class="banner p-3">
    <div class="container">
        <div class="row p-3">
            <div class="search col-sm-12 col-md-4">
                <p class="title">Tìm kiếm</p>
                <form action="{{route('search')}}" method="GET" autocomplete="off">
                    <div class="form-group" style="display: grid;">
                        <span class="form-label"><i class="fas fa-location"></i> Địa điểm</span>
                        <input type="text" class="form-control" id="search-input" name="location"
                               placeholder="Địa điểm cần tìm">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label><i class="fas fa-arrow-to-right"></i> Check in</label>
                                <input name="check_in" class="form-control" autocomplete="off" id="check-in"
                                       placeholder="dd/mm/YY"/>
                            </div>
                            <div class="col-md-6">
                                <label><i class="fas fa-arrow-alt-from-left"></i> Check out</label>
                                <input name="check_out" class="form-control" autocomplete="off" id="check-out"
                                       placeholder="dd/mm/YY"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <span class="form-label">Số người</span>
                        <input type="number" class="form-control" min="1" max="30" name="n_person" value="1">
                    </div>
                    <div class="form-btn">
                        <input type="submit"
                               class="btn btn-block btn-primary" id="search-btn" value="Tìm kiếm">
                    </div>
                </form>
            </div>
            <div class="slider col-sm-12 col-md-8">
                @foreach($events as $event)
                    @php
                        $image = json_decode($event->image);
                    @endphp
                    <div>
                        <img src="{{asset($image->image_path)}}" alt="{{$event->types}}">
                    </div>
                @endforeach
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--//banner-->
