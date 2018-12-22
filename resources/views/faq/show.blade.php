@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h1>FAQ Management - Show</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('faq.index') }}"><i class="fa fa-table"></i>FAQ Management</a></li>
            <li class="active">Show</li>
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

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Question:</strong>
                    {{ $faq->question }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Answer:</strong>
                    {{ $faq->answer }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category:</strong>
                    {{ $faq->category->name }}
                </div>
            </div>
        </div>
    </section>

@endsection