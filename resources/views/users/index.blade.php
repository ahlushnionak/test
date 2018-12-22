@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h1>Users Management</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('users.index') }}"><i class="fa fa-table"></i>Users Management</a></li>
            <li class="active">Users Management</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                @can('user-create')
                    <a class="btn btn-success" href="{{ route('users.create') }}">Create New User</a>
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
                    <th>Email</th>
                    <th>Roles</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($data as $key => $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    <span class="label label-success">{{ $v }}</span>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                            @can('user-edit')
                                <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                            @endcan
                            @can('user-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </table>

            {!! $data->render() !!}
        </div>
    </section>
@endsection
