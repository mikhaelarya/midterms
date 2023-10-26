<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Form</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>
<body>

    <form action="{{route('submit')}}" method="post" enctype="multipart/form-data">
        @csrf

        <h1>Form</h1>
        <label for="itemname">Item Name</label>
        <input type="text" name="itemname" id="itemname" placeholder="Item Name">
        @error('itemname')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="description">Description</label>
        <input type="text" name="description" id="description" placeholder="description">
        @error('description')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="Amount">Amount</label>
        <input type="text" name="amount" id="amount" placeholder="Amount">
        @error('amount')
            <div class="error">{{ $message }}</div>
        @enderror

        <div class="dropdown">
            <button class="dropbtn">Item Type</button>
            <div class="dropdown-content">
                @foreach($type as $c)
                    <a onclick=func({{$c->name}}, itemtype)>{{$c->name}}</a>
                @endforeach
            </div>
        </div>
        <input type="text" name="itemtype" id="itemtype">

        <div class="dropdown">
            <button class="dropbtn">Item Condition</button>
            <div class="dropdown-content">
                @foreach($condition as $c)
                    <a onclick=func({{$c->name}}, itemcondition)>{{$c->name}}</a>
                @endforeach
            </div>
        </div>
        <input type="text" name="itemcondition" id="itemcondition">

        <label for="picture">Your Picture</label>
        <input type="file" name="picture" id="picture" accept="image/*">
        @error('picture')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit" name="submit">Submit</button>
        
        
    </form>
</body>
</html>

<script>
    function func(name, id) {
        document.getElementById(id).value = name;
    }
</script>