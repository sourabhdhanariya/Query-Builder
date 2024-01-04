<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>Upadte user User</h1>
                <form action="{{ route('update.user', $data->id )}}" method="POST">
                   @csrf
                    <div class="mb-3">
                        <label >Name</label>
                        <input type="text" value="{{$data->name}}" class="form-control" placeholder="Enter Name" name="name">    
                    </div>  
                    <div class="mb-3">
                        <label >Email</label>
                        <input type="email" value="{{$data->email}}" class="form-control" placeholder="Enter Email" name="email">    
                    </div>  
                    <div class="mb-3">
                        <label >Password</label>
                        <input type="password" value="{{$data->password}}" class="form-control" placeholder="Enter Password" name="password">    
                    </div>   
                    <button type="submit" class="btn btn-primary">Submit</button>   
                </form>
            </div>
        </div>
    </div>
</body>
</html>