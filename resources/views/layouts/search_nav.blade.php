<form action="#" method="get">
    <div class="filter ">
        <div class="place">
            <h3>Khu vực</h3>
            <ul>
                @foreach($districts as $district)
                    @if($district->city_id == $city->id)
                        <li>
                            <input type="checkbox" value="{{$district->id}}"> {{$district->name}}
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="price">
            <h3>Giá</h3>
            <ul>
                <li>
                    <input type="checkbox"> đ 0-500,000
                </li>
                <li>
                    <input type="checkbox"> đ 500,000-1,000,000
                </li>
                <li>
                    <input type="checkbox"> đ 1,000,000-2,000,000
                </li>
                <li>
                    <input type="checkbox"> đ 2,000,000-3,000,000
                </li>
                <li>
                    <input type="checkbox"> đ 3,000,000-5,000,000
                </li>
                <li>
                    <input type="checkbox"> đ 5,000,000-10,000,000
                </li>
                <li>
                    <input type="checkbox"> > đ 10,000,000
                </li>
            </ul>
        </div>
        <div class="home-type">
            <h3>Loại chỗ ở</h3>
            <ul>
                @foreach($types as $type)
                    <li>
                        <input type="checkbox" value="{{$type->key}}"> {{$type->name}}
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="trip-type">
            <h3>Loại chuyến đi</h3>
            <ul>
                @foreach($trips as $trip)
                    <li>
                        <input type="checkbox" value="{{$trip->id}}"> {{$trip->name}}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <input type="submit" class="btn btn-block btn-primary" value="Tìm kiếm">
</form>
