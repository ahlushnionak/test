@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h1>Roles Management</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('roles.index') }}"><i class="fa fa-table"></i>Roles Management</a></li>
            <li class="active">Roles Management</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                @can('role-create')
                    <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
                @endcan
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                            @can('role-edit')
                                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                            @endcan
                            @can('role-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </table>

            {!! $roles->render() !!}
        </div>
    </section>
@endsection