
<div class="form-group col-12 col-lg-5">
    <label>Price</label>
    <div class="input-group">
        <input type="number" step="1" class="global-price form-control form-control-solid" placeholder="€€€">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button">Set price</button>
        </div>
    </div>
    <span class="form-text text-muted">This value updates every values on the below tables</span>
</div>
@foreach ($calendars as $number => $calendar)
    <table class="table">
        <thead>
            <tr>
                <th colspan="4"><h4>Listing {{$number}}</h4></th>
            </tr>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Guesty Price</th>
                <th scope="col">Status</th>
                <th scope="col">New Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($calendar as $item)
                <tr>
                    <td>{{$item['date']}}</td>
                    <td>€ {{$item['price']}}</td>
                    <td> <span class="label label-light-{{App\Noms\Status::color($item['status'])}} label-inline mt-2">{{ucfirst($item['status'])}}</span></td>
                    <td>
                        @if(ucfirst($item['status']) == App\Noms\Status::AVAILABLE)
                            <input class="new-price form-control form-control-solid w-25" placeholder="€€€"  type="number" step="1" name="{{$item['date']."_".$item['listingId']}}">
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endforeach
<div class="form-group col-12 col-lg-5">
    <label>Price</label>
    <div class="input-group">
        <input type="number" step="1" class="global-price form-control form-control-solid" placeholder="€€€">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button">Set price</button>
        </div>
    </div>
    <span class="form-text text-muted">This value updates every values on the above tables</span>
</div>
