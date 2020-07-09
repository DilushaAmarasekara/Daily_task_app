<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Update Task</title>
</head>
<body>
<br>
<br>
<br>
    <div class="container">
     <form action="/newupdatetask" method="post">
     {{csrf_field()}}
       <input type="text" class="form-control" name="task" value="{{$taskdata->task}}"><br>
       <input type="hidden" name="id" value="{{$taskdata->id}}">
       <input type="submit" class="btn btn-warning" value="Update">
       &nbsp;&nbsp; <input type="button" class="btn btn-danger" value="Cancel">
     </form>
    </div>
</body>
</html>