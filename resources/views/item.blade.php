<div>
    @foreach($item as $i)
        {{$item->name}}
        {{$item->description}}
        {{$item->amount}}
        <img src="{{$item->image}}" alt="" srcset="">
        {{$item->item_type}}
        {{$item->item_condition}}

        <br><br>
    @endforeach
</div>
