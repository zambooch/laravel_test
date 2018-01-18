@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row-fluid">
            @include('common.errors')
            <div class="span2"></div>
                <div class="alert alert-danger my-alert">

                </div>
            @if (!Auth::guest())
                <div class="span8">
                    <form id="create-form" action="{{url('message')}}" method="post" class="form-horizontal"
                          style="margin-bottom: 50px;">
                        {{ csrf_field() }}
                        <div class="control-group">
                            <textarea type="text" name="text" id="message-text" class="form-control"></textarea>
                        </div>
                        <br>
                        <div class="control-group">
                            <button type="button" class="btn btn-primary create-message">Отправить</button>
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
