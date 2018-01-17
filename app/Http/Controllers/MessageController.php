<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MessageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Показать список всех сообщений
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $messages = Message::all()->sortByDesc('id');
        return view('message.index', [
            'messages' => $messages
        ]);
    }

    /**
     * Создание нового сообщения.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'text' => 'required|max:1000|min:1'
        ]);

        $message = new Message;
        $message->text = $request->input('text');
        $message->user_id = $request->user()->id;
        $message->save();
        return redirect('/');
    }

    /**
     * Удаление сообщения
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request)
    {
        $id = $request->get('id');
        $message = Message::where("id", $id)->first();
        if ($message) {
            $this->authorize('destroy', $message);
            $message->delete();
        }
        $messages = Message::all()->sortByDesc('id');

        return view('message._list', [
            'messages' => $messages
        ]);
    }

    /**
     * Рендер формы редактирования конкретного сообщения
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        $id = $request->get('id');
        /** @var Message $message */
        $message = Message::find($id);

        if ($message && $request->has('text')) {
            $this->authorize('update', $message);
            $message->text = $request->input('text');
            $message->save();
        }

        $messages = Message::all()->sortByDesc('id');

        return view('message._list', [
            'messages' => $messages
        ]);
    }

    /**
     * Рендер формы редактирования конкретного сообщения
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateForm(Request $request)
    {
        $id = $request->get('id');
        /** @var Message $message */
        $message = Message::find($id);

        return view('message.update_form', [
            'message' => $message
        ]);
    }

}
