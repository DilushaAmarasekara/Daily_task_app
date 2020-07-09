<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Tasks</title>
</head>
<body>
    
<div class="container">
  <div class ="text-center">
   <h1>Daily Tasks</h1>
    <div class="row">
      <div class="col-md-12">

       @foreach($errors->all() as $error)

       <div class="alert alert-danger" role="alert">
            {{$error}}
       </div>

       @endforeach

       <form method="POST" action="/saveTask">
         {{csrf_field()}}
        <input type="text" class="form-control" name="task" placeholder="Enter your task here"></br>
        <button type="submit" class="btn btn-primary">SAVE</button>
        <button type="button" class="btn btn-warning">CLEAR</button></br></br>

       </form>
        <table class="table table-dark">
            <th>Id</th>
            <th>Task</th>
            <th>Completed</th>
            <th>Action</th>
            <th></th>
            @foreach($tasks as $task)
            <tr>
                <td>{{$task->id}}</td>
                <td>{{$task->task}}</td>
                <td>
                @if($task->isdeleted)
                 <button class="btn btn-success">Completed</button>
                @else
                 <button class="btn btn-warning">Not Completed</button>              
                @endif
                </td>
                <td>
                @if(!$task->isdeleted)
                 <a href="/markscompleted/{{$task->id}}" class="btn btn-primary">Mark as Completed</a>
                @else
                <a href="/marksnotcompleted/{{$task->id}}" class="btn btn-danger">Mark as not Completed</a>
                @endif
                </td>
                <td>
                <a href="/delete/{{$task->id}}" class="btn btn-danger">Delete</a>
                <a href="/update/{{$task->id}}" class="btn btn-success">Update</a>
                </td>
            </tr>
            @endforeach
        </table>
      </div>
      </div>
    </div>
   </div>
 </div>   

</body>
</html>