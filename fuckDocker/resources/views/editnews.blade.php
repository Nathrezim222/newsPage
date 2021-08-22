@extends('layout')

@section('title') Редактировать @endsection

@section('main_content')

    <div class="container">
        <h2>Редактировать новость</h2>
        @foreach($reviews as $el)
            @if($el->idowner==Auth::user()->id and $el->id==$id)
                <div class="alert alert-warning">
                    <form method="post" action="/review/edit">
                    @csrf  <!-- токен для безопасной отправки -->
                        <input type="email" name="email" id="email" placeholder="Введите почту" class="form-control" value="{{$el->email}}"><br>
                        <input type="text" name="subject" id="subject" placeholder="Введите отзыв" class="form-control" value="{{$el->subject}}"><br>
                        <input type="hidden" name="idnews" value="{{$el->id}}">
                        <textarea name="message" id="message" cols="30" rows="10" class="form-control"
                                  placeholder="Введите сообщение">{{$el->message}}</textarea><br>
                        <button type="submit" class="btn btn-success">Редактировать</button>

                    </form>
                    <form action="/review/delete" method="post" style="float: right; margin-top: -40px;">
                    @csrf  <!-- токен для безопасной отправки -->
                        <input type="hidden" name="idnews" value="{{$el->id}}">
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>

                </div>
            @endif
        @endforeach
    </div>
@endsection
