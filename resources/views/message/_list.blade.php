@foreach($messages as $message)
    <div class="well">
        <h5 class="message-author">{{$message->user->name}}</h5>
        <p>{{$message->text}}</p>
        @if($message->user_id == Auth::user()->id)
            <button class="btn btn-primary message-btn message-btn-update change-message-btn"
                    data-toggle="modal" data-target="#updateModal"  data-id="{{$message->id}}">Изменить
            </button>
            <button class="btn btn-danger message-btn delete-message"
                    data-id="{{$message->id}}">Удалить
            </button>
            {{$message->created_at}}
        @endif
    </div>
@endforeach
