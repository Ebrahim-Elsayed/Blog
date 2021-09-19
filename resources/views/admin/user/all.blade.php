@extends('layouts.parent')

@section("title") All users @endsection

@section("sectionname") All Users @endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">users Table</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <tr>
                                <th> ID</th>
                                <th> Name</th>
                                <th> Email </th>
                                <th> created at </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $increment = 1 ?>
                            @foreach($users as $user)
                            <tr>
                                <td> <?php echo $increment++ ?> </td>
                                <td> {{$user->name}} </td>
                                <td> {{$user->email}}</td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                                <td class="">
                                    <a href="{{route('user.show' , $user->id )}}" class="btn btn-info">show</a>
                                    <a href="{{route('user.edit' , $user->id )}}" class="btn btn-warning">edit</a>
                                    <!-- <a href="" class="btn btn-danger">delete</a> -->
                                    <form method="post" action="{{route('user.destroy' , $user->id )}}" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">DELETE</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="{{route('user.create')}}" class="btn btn-warning">Add user</a>
                <a href="{{route('userpdf')}}" class="btn btn-info">export as pdf</a>
            </div>
        </div>
    </div>
@endsection

