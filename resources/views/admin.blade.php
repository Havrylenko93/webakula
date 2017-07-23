<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />

</head>
<body>
<table border="1|0" style="width: 100%">
    <th>id</th><th>name</th><th>avatar</th><th>date</th><th>text</th><th>action</th>


@foreach ($comments as $comment)
    <tr>
        <td>
            {{$comment->id}}
        </td>
        <td>
            {{$comment->name}}
        </td>
        <td>
            <img src="img/{{$comment->avatar}}" style="width:100px; height: 100px;"/>
        </td>
        <td>
            {{Carbon\Carbon::parse($comment->time)->format('d-m-Y')}}
        </td>
        <td>
            {{$comment->text}}
        </td>
        <td>
            @if ($comment->visible == 1)
                <a href="admin/unpublish/{{$comment->id}}" > unpublish</a>
            @else ($comment->visible == 0)
                <a href="admin/publish/{{$comment->id}}" >publish</a>
            @endif
                <a href="admin/delete/{{$comment->id}}" > | delete</a>
        </td>
    </tr>

@endforeach
</table>
{{ $comments->links() }}
</body>
</html>
