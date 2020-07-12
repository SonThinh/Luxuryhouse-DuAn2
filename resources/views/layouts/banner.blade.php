<!--banner-->
<div class="banner py-3">
    <div class="container">
        <div class="row p-3">
            <div class="search col-sm-12 col-md-4">
                <p class="title">Tìm kiếm</p>
                <form action="{{route('search')}}" method="GET" autocomplete="off">
                    <div class="form-group" style="display: grid;">
                        <label for="search-input" class="form-label"><i class="fas fa-location"></i> Địa điểm</label>
                        <input type="text" class="form-control" id="search-input" name="location"
                               placeholder="Địa điểm cần tìm">
                    </div>
                    <div class="form-group">
                        <label for="date-search" class="form-label"><i class="fal fa-calendar-alt"></i> Lịch
                            trình</label>
                        <input type="text" name="date_search" class="form-control" autocomplete="off"
                               id="date-search"/>
                    </div>
                    <div class="form-group ">
                        <label for="n_person" class="form-label"><i class="fas fa-users"></i> Số người</label>
                        <input type="number" class="form-control" min="1" max="30" id="n_person" name="n_person"
                               value="1">
                    </div>
                    <div class="form-btn">
                        <input type="submit"
                               class="btn btn-block btn-lux" id="search-btn" value="Tìm kiếm">
                    </div>
                </form>
            </div>
            <div class="slider col-sm-12 col-md-8">
                @foreach($events as $event)
                    @php
                            $image = json_decode($event->image);
                    @endphp
                    <div>
                        <img src="{{asset(isset($image->image_path) ? $image->image_path : '')}}"
                             alt="{{$event->types}}">
                    </div>
                @endforeach
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--//banner-->
