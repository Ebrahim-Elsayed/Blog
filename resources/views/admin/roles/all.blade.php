@extends('layouts.parent')

@section("title") All Roles @endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Roles Table</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $increment = 1?>
                            @foreach($roles as $role)
                            <tr>
                                <td> <?php echo $increment++ ?> </td>
                                <td> {{$role->name}} </td>
                                <td class="">
                                    <a href="{{route('role.show' , $role->id )}}" class="btn btn-info">show</a>
                                    <a href="{{route('role.edit' , $role->id )}}" class="btn btn-warning">edit</a>
                                    <!-- <a href="{{route('role.edit' , $role->id )}}" class="btn btn-warning">edit</a> -->
                                    <form method="post" action="{{route('role.destroy' , $role->id )}}" style="display: inline-block;" >
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
                <a class="btn btn-primary" href="{{route('role.create')}}">Add Role</a>
            </div>
        </div>
    </div>


    @endsection
