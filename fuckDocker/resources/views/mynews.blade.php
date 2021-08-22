@extends('layout')

@section('title') Мои новости @endsection

@section('main_content')

    <div class="container">
        <h2>Мои новости</h2>
        @foreach($reviews as $el)
            @if($el->idowner==Auth::user()->id)
                <div class="alert alert-warning">
                    <h3>{{$el->id}} | {{$el->subject}}</h3>
                    <b>{{$el->email}}</b>
                    <p>{{$el->message}}</p>

                    <a href="/editnews/{{$el->id}}">Редактировать</a>
                </div>
            @endif
        @endforeach
    </div>
@endsection
