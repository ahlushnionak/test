@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h1>Users Management - Show User</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('users.index') }}"><i class="fa fa-table"></i>Users Management</a></li>
            <li class="active">Show User</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $user->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    {{ $user->email }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Roles:</strong>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <span class="label label-success">{{ $v }}</span>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection