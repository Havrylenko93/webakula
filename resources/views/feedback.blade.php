<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Feedback</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/jquery.paulund_modal_box.js') }}"></script>

</head>
<body>
<a href="#" id="modal" class="paulund_modal"></a>
<p id="main_title">Отзывы:</p>

@foreach ($comments as $comment)
    <div style="border-style: solid; border-width: 2px;">
        <img src="img/{{$comment->avatar}}" style="width:150px; height: 150px;"/>
        <p>{{$comment->name}}</p>
        <span>{{Carbon\Carbon::parse($comment->time)->format('d-m-Y')}}</span>
        <div>{{$comment->text}}</div>
    </div>

    <br/>
@endforeach
{{ $comments->links() }}

<form encoding="multipart/form-data" class="comment-form need-valid form border" method="POST" enctype="multipart/form-data" target="reviewsFrame" action="/saveComment" id="saveComment">
            <div class="sub-title">Оставить отзыв</div>
            <div class="inp-row">
                <p>Имя *</p>
                <input type="text" name="name" id="name" value="" placeholder="" class="required">
            </div><div class="inp-row">
                <p>E-mail *</p>
                <input type="text" name="email" id="email" value="" placeholder="" class="required email">
            </div>
            <div class="inp-row">
                <p>Отзыв *</p>
                <textarea name="text" id="review" placeholder="" class="required" rows="24" cols="80"></textarea>
            </div>
            <div style="display: none;">
                <input type="text" name="valid_human" value="">
            </div>
            <div class="fileform"> Прикрепить фото <input type="file" id="upload" name="file" accept="image/jpeg,image/png" onchange="getName(this.value);">
            </div>
            <div id="fileformlabel">
            </div>
    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
            <button class="button" id="" name="" onclick="modal();">Отправить</button></form>

        </form>
<iframe id="reviewsFrame" name="reviewsFrame" height="0" width="0" frameborder="2" scrolling="no" style="display:none;"></iframe>
</body>
</html>
