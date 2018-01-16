@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row-fluid">
            @include('common.errors')
            <div class="span2"></div>
            @if (!Auth::guest())
                <div class="span8">
                    <form action="{{url('message')}}" method="post" class="form-horizontal"
                          style="margin-bottom: 50px;">
                        {{ csrf_field() }}
                        <div class="control-group">
                            <textarea type="text" name="text" id="message-text" class="form-control"></textarea>
                        </div>
                        <br>
                        <div class="control-group">
                            <button type="submit" class="btn btn-primary">Отправить</button>
                        </div>
                    </form>

                    @foreach($messages as $message)
                        <div class="well">
                            <h5 class="message-author">{{$message->user->name}}</h5>
                            <p>{{$message->text}}</p>
                            @if($message->user_id == Auth::user()->id)
                                <button id="deleteMessage" class="btn btn-danger message-btn" data-id="{{$message->id}}">Удалить</button>
                                {{$message->created_at}}
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@stop
