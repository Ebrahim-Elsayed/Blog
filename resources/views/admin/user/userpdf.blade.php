<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>
    @foreach($users as $user)
        username: <h1>{{$user->name}}</h1>
        email: <h1>{{$user->email}}</h1>
    @endforeach
</body>
</html>