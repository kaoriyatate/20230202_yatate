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

    section {
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
    <fome action="Todo" method="post">
      @csrf
      <h1>Todo List</h1>
      <input type="text" class="content">
      <input type="submit" class="create" value="追加">
      <table class="list">
        <tr>
          <th>作成日</th>
          <th>タスク名</th>
          <th>更新</th>
          <th>削除</th>
        </tr>
        @foreach ($todos as $todo)
        <tr>
          <td>{{$todo->created_at}}</td>
          <td><input type="text" class="title" value="{{ $todo->content }}"></td>
          <td><input type="submit" class="update" value="更新"></td>
          <td><input type="submit" class="delete" value="削除"></td>
        </tr>
        @endforeach
      </table>
      </form>
  </section>

</body>

</html>
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

    section {
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
      margin: auto;
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
    <fome action="Todo" method="post">
      @csrf
      <h1>Todo List</h1>
      <input type="text" class="content">
      <input type="submit" class="create" value="追加">
      <table class="list">
        <tr>
          <th>作成日</th>
          <th>タスク名</th>
          <th>更新</th>
          <th>削除</th>
        </tr>
        @foreach ($todos as $todo)
        <tr>
          <td>{{$todo->created_at}}</td>
          <td><input type="text" class="title" value="{{ $todo->content }}"></td>
          <td><input type="submit" class="update" value="更新"></td>
          <td><input type="submit" class="delete" value="削除"></td>
        </tr>
        @endforeach
      </table>
      </form>
  </section>

</body>

</html>