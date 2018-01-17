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

                    <div class="messages">
                        @include('message/_list', ['messages'=>$messages])
                    </div>
                </div>
            @endif
        </div>
    </div>
    @include('message/update_modal')
@stop
