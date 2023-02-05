@extends('layouts.default')

  @yield('title')
    <div class="todo_list">
      <h1>タスク検索</h1>
      <ul class="log_out">
        @if(Auth::check())
        <li> {{$user->name}}でログイン中</li>
        @endif
        <form action="{{route('logout')}}" method="POST">
        @csrf
        <li><input class="logaut" type="submit" name="log_button" value="ログアウト"></li>
        </form>
      </ul>
      <form action="/home/find" method="POST">
        @csrf
        <input type="text" class="content" name="content" value="">
        <select class="form-control" id="tag_id" name="tag_id">
        @foreach ($tags as $tag)
        <option value="{{ $tag->tag_id }}"> {{ $tag->tag_category }}</option>
        @endforeach
        </select>
        <button type="submit" class="create">検索</button>
      </form>
        
        @yield('list')
  
  <button type="submit" class="back" name="action" value="back">戻る</button>       
