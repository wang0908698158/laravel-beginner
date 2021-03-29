<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>Profile</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div>
        
        <p>目標: {{ $name }} </p>
    </div>
    <div>
        @if (count($records))
            <ul class="list-group">
                @foreach ($records as $key => $record)
                    <li>    
                        <a href = profile\{{ $key }} >{{ $record['id'] }}</a> <br>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
    
</body>

<script>
    $(function() {
        let $result = $('.result');
        $('.profileBtn').click(function(e) {
            $.ajax({
                url: '/api/profile/info',
                dataType: 'json',
                success: function(data) {
                    $result.html(data);
                },
                error: function(xhr) {
                    alert(xhr.message);
                }
            });
        });
    });
</script>
</html>