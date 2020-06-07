<form action="{{route('search')}}" method="GET" autocomplete="off">
    <div class="form-group">
        <div class="row">
            <div class="col-md-4">
                <input type="text" class="form-control" id="search-input" name="location" placeholder="Địa điểm cần tìm" value="{{$city->name}}">
            </div>
            <div class="col-md-2">
                <input name="check_in" class="form-control" autocomplete="off" id="check-in"
                       placeholder="dd/mm/YY"/>
            </div>
            <div class="col-md-2">
                <input name="check_out" class="form-control" autocomplete="off" id="check-out"
                       placeholder="dd/mm/YY"/>
            </div>
            <div class="col-md-2">
                <input type="number" class="form-control" min="1" max="30" name="n_person" value="1">
            </div>
            <div class="col-md-2">
                <input type="submit"
                       class="btn btn-block btn-primary" id="search-btn" value="Tìm kiếm">
            </div>
        </div>
    </div>
</form>
