<!DOCTYPE html>
<html>
<head>
    <title>Generate PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style></style>
</head>
<body>
    <h2>{{ $title }}</h2>
    <p>{{ $date }}</p>
    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</p> --}}

    <table class="table table-striped table-bordered" style="width:100%">
        <tr>
            <th>S.No.</th>
            <th width="80%">Question</th>
            <th width="5%"></th>
        </tr>
        @foreach($questions as $key => $q)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$q->question}}</td>
            <td></td>
        </tr>
        @endforeach
    </table>

</body>
</html>
