@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row-fluid">
            @include('common.errors')
            <div class="span2"></div>
            <div class="span8">

                <form action="{{url('message')}}" method="post" class="form-horizontal" style="margin-bottom: 50px;">
                    {{ csrf_field() }}
                    <div class="alert alert-error">
                        Ola
                    </div>

                    <div class="control-group">
                        <textarea type="text" name="text" id="message-text" class="form-control">
                        </textarea>
                    </div>
                    <div class="control-group">
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </div>
                </form>

                @foreach($messages as $message)
                    <div class="well">
                        <h5>{{$message->user->name}}</h5>
                        {{$message->text}}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
