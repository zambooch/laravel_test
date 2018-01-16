@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row-fluid">
            @include('common.errors')
            <div class="span2"></div>
            <div class="span8">

                <form action="" method="post" class="form-horizontal" style="margin-bottom: 50px;">
                    <div class="alert alert-error">
                        Ola
                    </div>

                    <div class="control-group">
                <textarea style="width: 100%; height: 50px;" type="password" id="inputText"
                          placeholder="Введите сообщение"
                          data-cip-id="inputText"></textarea>
                    </div>
                    <div class="control-group">
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </div>
                </form>


                <div class="well">
                    <h5>Eugene:</h5>
                    wtf
                </div>

                <div class="well">
                    <h5>Mikle:</h5>
                    netest
                </div>

                <div class="well">
                    <h5>Tony:</h5>
                    test
                </div>

                <div class="well">
                    <h5>Andre:</h5>
                    test2
                </div>
            </div>
        </div>
    </div>
@stop
