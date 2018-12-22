@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h1>FAQ Management</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('faq.index') }}"><i class="fa fa-table"></i>FAQ Management</a></li>
            <li class="active">FAQ Management</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                @can('faq-create')
                    <a class="btn btn-success" href="{{ route('faq.create') }}">Create New Item</a>
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
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Category</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($data as $key => $faq)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $faq->question }}</td>
                        <td>{{ $faq->answer }}</td>
                        @if ($faq->categories->parent_id === null)
                            <td>{{ $faq->categories->name }}</td>
                        @else
                            <td>{{ $categories[$faq->categories->parent_id]->name }} / {{ $faq->categories->name }}</td>
                        @endif
                        <td>
                            <a class="btn btn-info" href="{{ route('faq.show',$faq->id) }}">Show</a>
                            @can('faq-edit')
                                <a class="btn btn-primary" href="{{ route('faq.edit',$faq->id) }}">Edit</a>
                            @endcan
                            @can('faq-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['faq.destroy', $faq->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
@endsection
