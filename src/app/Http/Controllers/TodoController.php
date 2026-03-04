<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::where('user_id', Auth::id())->get(); //ユーザーidごとのデータ取得
        return view('index', compact('todos'));
    }

    public function store(TodoRequest $request){
        $todo = $request->only(['content']);
        Todo::create([
            'content' => $request->content,
            'user_id' => auth()->id(), // Todo作成時にuser_idを保存
        ]);

        return redirect('/')->with('message','Todoを作成しました');
    }
    
    public function update(TodoRequest $request){
        $todo = $request->only(['content']);
        Todo::find($request->id)->update($todo);

        return redirect('/')->with('message','Todoを更新しました');

    }

    public function destroy(Request $request){
        Todo::find($request->id)->delete();
        return redirect('/')->with('message','Todoを削除しました');
    }

}
