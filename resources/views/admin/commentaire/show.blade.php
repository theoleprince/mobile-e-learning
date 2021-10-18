@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Commentaire {{ $commentaire->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/commentaire') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/commentaire/' . $commentaire->id . '/edit') }}" title="Edit Commentaire"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/commentaire' . '/' . $commentaire->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Commentaire" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $commentaire->id }}</td>
                                    </tr>
                                    <tr><th> Commentaire </th><td> {{ $commentaire->commentaire }} </td></tr>
                                    <tr><th> Phase </th><td> {{ $commentaire->_titre }} </td></tr>
                                    <tr><th> Personne Ayant Posté </th><td> {{ $commentaire->_name.' '.$commentaire->_prenom }} (<a href="mailto:{{$commentaire->_email}}"><strong>{{$commentaire->_email}}</strong></a>)</td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
