@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h1>Categories Management</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('categories.index') }}"><i class="fa fa-table"></i>Categories Management</a></li>
            <li class="active">Categories Management</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                @can('categories-create')
                    <a class="btn btn-success" href="{{ route('categories.create') }}">Create New Categorie</a>
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
                @foreach ($data as $key => $categorie)
                    @if($categorie->parent_id === null)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $categorie->name }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('categories.show',$categorie->id) }}">Show</a>
                                @can('categories-edit')
                                    <a class="btn btn-primary" href="{{ route('categories.edit',$categorie->id) }}">Edit</a>
                                @endcan
                                @can('categories-delete')
                                    {!! Form::open(['method' => 'DELETE','route' => ['categories.destroy', $categorie->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                @endcan
                            </td>
                        </tr>
                        @foreach ($categorie->children as $key => $children)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $categorie->name.' / '.$children->name }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('categories.show',$children->id) }}">Show</a>
                                    @can('categories-edit')
                                        <a class="btn btn-primary" href="{{ route('categories.edit',$children->id) }}">Edit</a>
                                    @endcan
                                    @can('categories-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['categories.destroy', $children->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @endif
                @endforeach
            </table>
        </div>
    </section>
@endsection
