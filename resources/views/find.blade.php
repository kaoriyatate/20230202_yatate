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
  <form action="/home/search" method="GET">
    <input type="text" class="content" name="keyword" value="">
    <select class="form-control" id="tag_id" name="tag_id">
      @foreach ($tags as $tag)
      <option value="" hidden></option>
      <option value="{{ $tag->id }}" @if(isset($todo->tag_id) && ($todo->tag_id === $tag->id)) selected @endif>{{ $tag->category }}</option>
      <option value=""></option>
      @endforeach
    </select>
    <button type="submit" class="create">検索</button>
  </form>

  @yield('list')


