<form action="" method="post" class="form-horizontal"
      style="margin-bottom: 50px;">
    {{ csrf_field() }}
    <div class="control-group">
        @if(!$message)
            <textarea type="text" name="text" id="messageText" class="form-control"></textarea>
        @else
            <textarea type="text" name="text" id="messageText" class="form-control"
                      data-id="{{$message->id}}">{{$message->text}}
            </textarea>
        @endif
    </div>
    <br>
</form>