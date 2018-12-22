@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h1>FAQ Management - Edit Item</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('faq.index') }}"><i class="fa fa-table"></i>FAQ Management</a></li>
            <li class="active">Edit Item</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <a class="btn btn-primary" href="{{ route('faq.index') }}"> Back</a>
                </div>
            </div>
        </div>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {!! Form::model($faq, ['method' => 'PATCH','route' => ['faq.update', $faq->id]]) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Question:</strong>
                    {!! Form::text('question', null, array('placeholder' => 'Question','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Answer:</strong>
                    {!! Form::text('answer', null, array('placeholder' => 'Answer','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category:</strong>
                    {!! Form::select('category_id', $categories,$category, array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
@endsection
