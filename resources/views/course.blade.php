<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <p>{{$name}}</p>
        @foreach ($records as $key => $record)
            @if ($record['id'] == $courseID)
                <p>{{ $record['text'] }}</p>
            @endif
        @endforeach
    </div>
</body>
</html>