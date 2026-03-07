@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="todo__message">
  @if(session('message')) <!-- セッションに値(message)の保存があれば表示 -->
  <div class="todo__message--success"> <!-- メッセージ 背景色など-->
    {{ session('message')}} 
  </div>
  @endif
  @if($errors->any()) <!-- エラーがある場合-->
  <div class="todo__message--error">
    <ul>
      @foreach($errors->all() as $error) <!-- エラーを一覧表示 -->
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
</div>

<div class="todo__content">
  <form class="create-form" action="/todos" method="post"> <!--アイテム（作成フォームと一覧）の配置と幅設定-->
    @csrf
    <div class="create-form__item"> <!--作成フォーム幅設定-->
      <input class="create-form__item-input" type="text" name="content"> <!--作成フォームサイズや枠設定-->
    </div>
    <div class="create-form__button">
      <button class="create-form__button-submit">作成</button>
    </div>
  </form>
  <div class="todo-table"> <!--テーブル幅と余白設定-->
    <table class="todo-table__inner">
      <tr class="todo-table__row"> <!--行に枠線を指定-->
        <th class="todo-table__header">Todo</th>
      </tr>
      @foreach ($todos as $todo) <!--todoの数だけ行を表示-->
      <tr class="todo-table__row"> <!--行に枠線を指定-->
        <td class="todo-table__item"> 
          <form class="update-form" action="/todos/update" method="post"> <!--Todo＋更新ボタンを横並びに設定-->
            @method('PATCH') <!--ToDoを書き換える-->
            @csrf
            <div class="update-form__item"> <!--Todoの幅を指定-->
              <input class="update-form__item-input" type="text" name="content" value="{{ $todo['content'] }}"> 
              <input type="hidden"  name="id" value="{{ $todo['id'] }}"> <!--書き換えたToDo idの取得-->
            </div>
            <div class="update-form__button">
              <button class="update-form__button-submit">更新</button>
            </div>
          </form>
        </td>
        <td class="todo-table__item">
          <form class="delete-form" action="/todos/delete" method="post">
            @method('DELETE')
            @csrf
            <div class="delete-form__button">
              <input type="hidden"  name="id" value="{{ $todo['id'] }}"> <!--削除するToDo idの取得-->
              <button class="delete-form__button-submit">削除</button>
            </div>
          </form>
        </td>
      </tr>
      @endforeach
   </table>
  </div>
</div>
@endsection