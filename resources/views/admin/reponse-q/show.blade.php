@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">ReponseQ {{ $reponseq->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/reponse-q') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/reponse-q/' . $reponseq->id . '/edit') }}" title="Edit ReponseQ"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/reponseq' . '/' . $reponseq->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete ReponseQ" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $reponseq->id }}</td>
                                    </tr>
                                    <tr><th> Reponse </th><td> {{ $reponseq->Reponse }} </td></tr><tr><th> Note </th><td> {{ $reponseq->note }} </td></tr><tr><th> Statut </th><td> {{ $reponseq->statut }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
