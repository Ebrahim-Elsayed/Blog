@extends('layouts.parent')

@section("title") Show user @endsection

@section("sectionname") Show User @endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Show User</h4>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating text-warning fw-bold">ID</label>
                                    <input type="text" class="form-control" value="{{$user->id}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group ">
                                    <label class="bmd-label-floating text-warning fw-bold">Username</label>
                                    <input type="text" class="form-control" value="{{$user->name}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating text-warning fw-bold">Email address</label>
                                    <input type="email" class="form-control" value="{{$user->email}}" disabled>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('user.index')}}" class="btn btn-info pull-right">back</a>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
