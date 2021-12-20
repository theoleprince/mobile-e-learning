
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Questions Du Cours N° {{ $idquestion }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/question') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="#" title="Ajouter Question" data-toggle="modal" data-target="#bd-example-modal-lg">
                            <button class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Ajouter Question</button>
                       </a>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center pt-auto pb-auto">
                                        <th>#</th><th>Question</th><th>Pts</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($question as $item)
                                        <tr style="background-color: blue-sky">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->question }}</td>
                                            <td>{{ $item->nbre_point }}</td>
                                            <td>
                                                @if(Auth::user()->hasPermission('formations-delete'))
                                                <form method="POST" action="{{ url('admin/question/'. $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm deleted_element" title="Delete Formation" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Modal Enregistrement --}}
    <div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Ajouter un secteur d'activité </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('/admin/question') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('question') ? 'has-error' : ''}}">
                            <label for="question" class="control-label">{{ 'Question' }}</label>
                            <textarea class="form-control" rows="5" name="question" type="textarea" id="question" >{{ isset($question->question) ? $question->question : ''}}</textarea>
                            {!! $errors->first('question', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('nbre_point') ? 'has-error' : ''}}">
                            <label for="nbre_point" class="control-label">{{ 'Nbre Point' }}</label>
                            <input class="form-control" name="nbre_point" type="number" id="nbre_point" max="20" value="{{ isset($question->nbre_point) ? $question->nbre_point : ''}}" >
                            {!! $errors->first('nbre_point', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('cours_id') ? 'has-error' : ''}}" hidden>
                            <label for="cours_id" class="control-label">{{ 'Choix du cours' }}</label>
                            <input readonly class="form-control" name="cours_id" value="{{ $idquestion }}" >
                            {!! $errors->first('cours_id', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('created_id') ? 'has-error' : ''}}" hidden>
                            <label for="created_id" class="control-label">{{ 'Created Id' }}</label>
                            <input class="form-control" name="created_id" type="number" id="created_id" value="{{ Auth::user()->id }}" readonly>
                            {!! $errors->first('created_id', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="modal-footer">
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="modal-secteur" value="{{ 'Creer' }}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
