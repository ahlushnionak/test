@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h1>Roles Management - Show Role</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('roles.index') }}"><i class="fa fa-table"></i>Roles Management</a></li>
            <li class="active">Show Role</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $role->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Permissions:</strong>
                    @if(!empty($rolePermissions))
                        @foreach($rolePermissions as $v)
                            <label class="label label-success">{{ $v->name }}</label>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection