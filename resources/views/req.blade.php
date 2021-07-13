<!DOCTYPE html>
<html lang="HR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Jela </title>
        <style>
            .w-5{
                display: none;
            }
        </style>

    </head>
    <body >
        @foreach($dishes as $dish)
        <p>{{$dish}}</p>
        <br>
        @endforeach
        @if($pagination)
        {{ $dishes->links() }}
        @endif
    </body>
</html>
