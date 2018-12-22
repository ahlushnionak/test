@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h1>Categories Management - Show Categorie</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('categories.index') }}"><i class="fa fa-table"></i>Categories Management</a></li>
            <li class="active">Show Categorie</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <a class="btn btn-primary" href="{{ route('categories.index') }}"> Back</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $categorie->name }}
                </div>
            </div>
        </div>
    </section>

@endsection