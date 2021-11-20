@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Creer une nouvelle categorie</div>
                <div class="card-body">
                    <a href="{{ url('/admin/category') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <br />
                    <br />

                    @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <form method="POST" action="{{ url('/admin/category') }}" accept-charset="UTF-8"
                        class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @include ('admin.category.form', ['formMode' => 'create'])

                    </form>

                    <div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myLargeModalLabel">Ajouter un type catégori </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ url('/admin/type-category') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group {{ $errors->has('nom') ? 'has-error' : ''}}">
                                            <label for="nom" class="control-label">{{ 'Nom' }} <span class="text-red">*</span></label>
                                            <input class="form-control" name="nom" type="text" id="nom"
                                                value="{{ isset($type_categorie->nom) ? $type_categorie->nom : ''}}">
                                            {!! $errors->first('nom', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                                            <label for="description" class="control-label">{{ 'Description' }} <span class="text-red">*</span></label>
                                            <textarea class="form-control" rows="5" name="description" type="textarea"
                                                id="description">{{ isset($type_categorie->description) ? $type_categorie->description : ''}}</textarea>
                                            {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="modal-footer">
                                            <div class="form-group">
                                                <input class="btn btn-primary" type="submit" value="Create">
                                            </div>
                                        </div>




                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
