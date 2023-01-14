<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('css/reset.css')}}">
  <title>todoapp</title>
  <style>
    body {
      background-color: rgb(37, 0, 142);
    }

    .todo_list {
      box-sizing: border-box;
      border-radius: 10px 10px;
      background-color: #FFFFFF;
      width: 550px;
      margin-top: 250px;
      margin-left: 230px;

    }

    h1 {
      margin-left: 30px;
      padding-top: 30px;
    }

    .content {
      margin-left: 28px;
      margin-top: -10px;
      width: 400px;
      height: 35px;
      border: 1px solid lightgray;
      border-radius: 5px;

    }

    .create {
      background-color: #FFFFFF;
      border: 2px solid orchid;
      border-radius: 5px;
      font-weight: bold;
      color: orchid;
      width: 60px;
      height: 40px;
      margin-left: 30px;

    }

    .list {
      vertical-align: middle;
      width: 500px;
    }

    .title {
      border: 1px solid lightgray;
      width: 180px;
      height: 25px;
    }

    .update {
      border: 2px solid darkorange;
      border-radius: 5px;
      font-weight: bold;
      color: darkorange;
      background-color: #FFFFFF;
      width: 60px;
      height: 35px;
    }

    .delete {
      border: 2px solid cyan;
      border-radius: 5px;
      font-weight: bold;
      color: cyan;
      background-color: #FFFFFF;
      width: 60px;
      height: 35px;

    }
  </style>
</head>

<body>
  <section>
    <div class="todo_list">
      <h1>Todo List</h1>
      <form action="/create" method="POST">
        @csrf
        <input type="text" class="content" name="content" value="">
        <button type="submit" class="create">追加</button>
      </form>
      <table class="list">
        <tr>
          <th>作成日</th>
          <th>タスク名</th>
          <th>更新</th>
          <th>削除</th>
        </tr>
        @foreach($todos as $todo)
        <tr>
          <form action="/update" method="POST">
            @csrf
            <td>{{$todo->updated_at}}</td>
            <p><input type="hidden" name="id" value="{{$todo->id}}"></p>
            <td><input type="text" class="title" name="content" value="{{ $todo->content }}"></td>
            <td><button type="submit" class="update">更新</button></td>
          </form>
          <form action="/delete" method="POST">
            @csrf
            <p><input type="hidden" name="id" value="{{$todo->id}}"></p>
            <td><input class="delete" type="submit" name="de_button" value="削除"></td>
          </form>
        </tr>
        @endforeach
      </table>
    </div>
  </section>
</body>

</html>