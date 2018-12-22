@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                @foreach ($data as $key => $categorie)
                    @if(!$categorie->children->isEmpty() and !$categorie->faqs->isEmpty())
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="{{ $categorie->id }}">
                                <h4 class="panel-title">
                                    <a
                                            role="button"
                                            data-toggle="collapse"
                                            data-parent="#accordion"
                                            href="#collapse{{ $categorie->id }}"
                                            aria-expanded="true"
                                            aria-controls="collapse{{ $categorie->id }}"
                                    >
                                        {{ $categorie->name }}
                                    </a>
                                </h4>
                            </div>
                            <div
                                    id="collapse{{ $categorie->id }}"
                                    class="panel-collapse collapse"
                                    role="tabpanel"
                                    aria-labelledby="{{ $categorie->id }}"
                            >
                                <div class="panel-body">
                                    @foreach($categorie->faqs as $faq)
                                        <dl>
                                            <dt>{{ $faq->question }}</dt>
                                            <dd>{{ $faq->answer }}</dd>
                                        </dl>
                                    @endforeach
                                </div>
                                <div class="panel-group" id="accordion_{{ $categorie->id }}" role="tablist" aria-multiselectable="true">
                                    @foreach ($categorie->children as $key => $children)
                                        @if(!$children->faqs->isEmpty())
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="{{ $children->id }}">
                                                    <h4 class="panel-title">
                                                        <a
                                                                role="button"
                                                                data-toggle="collapse"
                                                                data-parent="#accordion_{{ $categorie->id }}"
                                                                href="#collapse{{ $children->id }}"
                                                                aria-expanded="true"
                                                                aria-controls="collapse{{ $children->id }}"
                                                        >
                                                            {{ $categorie->name.' / '.$children->name }}
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div
                                                        id="collapse{{ $children->id }}"
                                                        class="panel-collapse collapse"
                                                        role="tabpanel"
                                                        aria-labelledby="{{ $children->id }}"
                                                >
                                                    <div class="panel-body">
                                                        @foreach($children->faqs as $faq)
                                                            <dl>
                                                                <dt>{{ $faq->question }}</dt>
                                                                <dd>{{ $faq->answer }}</dd>
                                                            </dl>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endsection
