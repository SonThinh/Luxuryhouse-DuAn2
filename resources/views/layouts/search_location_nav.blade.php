<form action="{{route('search')}}" method="GET" autocomplete="off">
    <div class="row">
        <div class="col-md-4">
            <input type="text" class="form-control" id="search-input" name="location" placeholder="Địa điểm cần tìm"
                   value="{{isset($location) ? $location : ''}}">
        </div>
        <div class="col-md-4">
            <input type="text" name="date_search" class="form-control" autocomplete="off"
                   id="date-search" value="{{$date_search}}">
        </div>
        <div class="col-md-2">
            <input type="number" class="form-control" min="1" max="30" name="n_person" value="{{$n_person}}">
        </div>
        <div class="col-md-2">
            <input type="submit"
                   class="btn btn-block btn-lux" id="search-btn" value="Tìm kiếm">
        </div>
    </div>
</form>
