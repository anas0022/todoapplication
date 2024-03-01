<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('CSS/home.css')}}">
</head>
<body>
<ul>
        @foreach ($todos as $todo)
            <div class="ite" style=" ">
            <div class="items" style="     ">
                <p id="task-date" style=" 
   ">{{ $todo->date }} </p><div class="else" style="   "> <p id="real">{{ $todo->todo_list }} </p>
   <div class="butt" style="">
                <form class="delete" action="{{ route('todo.delete', ['id' => $todo->id]) }}" method="POST" style=" ">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" >Delete</button>
                </form>
                <form class="edit" action="edit"  style="  ">
                    @csrf 
               
                    <button type="submit" style="width:80%;">Edit</button>
                </form></div>
            </div></div></div>
        @endforeach
    </ul>
</body>
</html>