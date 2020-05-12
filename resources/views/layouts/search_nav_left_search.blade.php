<form action="{{route('searchHouses')}}" method="get">
    <input type="hidden" name="location" value="{{$location}}">
    <input type="hidden" name="check_in" value="{{$checkin}}">
    <input type="hidden" name="check_out" value="{{$checkout}}">
    <input type="hidden" name="n_person" value="{{$n_person}}">
    <div class="filter ">
        @isset($cities)
            @if($cities->count() != 0)
                <div class="place">
                    <h3>Khu vực</h3>
                    <ul>
                        @foreach($cities as $city)
                            @foreach($districts as $district)
                                @if($district->city_id == $city->id)
                                    <li>
                                        <input type="radio" id="radioDistrict" name="district"
                                               value="{{$district->id}}"> {{$district->name}}
                                    </li>
                                @endif
                            @endforeach
                        @endforeach
                    </ul>
                </div>
            @endif
        @endisset
        <div class="price">
            <h3>Giá</h3>
            <div class="price-slider">
                <div id="price-slider"></div>
                <div class="price-box">
                    <div class="mr-1">
                        <span class="left-currency">đ</span>
                        <input type="text" name="price_min" id="price-min" class="form-control">
                    </div>
                    <div class="ml-1">
                        <span class="right-currency">đ</span>
                        <input type="text" name="price_max" id="price-max" class="form-control">
                    </div>

                </div>
            </div>
            <input type="hidden" disabled name="max" value="{{$max_price}}">
        </div>
        <div class="home-type">
            <h3>Loại chỗ ở</h3>
            <ul>
                @foreach($types as $type)
                    <li>
                        <input type="radio" name="house_type" value="{{$type->key}}"> {{$type->name}}
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="trip-type">
            <h3>Loại chuyến đi</h3>
            <ul>
                @foreach($trips as $trip)
                    <li>
                        <input type="radio" name="trip_type" value="{{$trip->key}}"> {{$trip->name}}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <input type="submit" class="btn btn-block btn-primary" value="Tìm kiếm">
</form>
