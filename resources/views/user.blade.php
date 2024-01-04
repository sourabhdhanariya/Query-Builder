<h1>User Detail</h1>
@foreach ($data as $id=>$user)
<h3>Name:{{$user->name}}</h3>
<h3>Email:{{$user->email}}</h3>
<h3>Password:{{$user->password}}</h3>
    
@endforeach