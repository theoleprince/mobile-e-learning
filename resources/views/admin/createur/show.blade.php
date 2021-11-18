@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Type category {{ $createur->id }}</div>
                <div class="card-body">

                    <a href="{{ url('/admin/createur') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/createur/' . $createur->id . '/edit') }}" title="Edit createur"><button
                            class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            Edit</button></a>

                    <form method="POST" action="{{ url('admin/createur' . '/' . $createur->id) }}"
                        accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete type category"
                            onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                aria-hidden="true"></i> Delete</button>
                    </form>
                    <br />
                    <br />

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $createur->id }}</td>
                                </tr>
                                <tr>
                                    <th> spetiality </th>
                                    <td> {{ $createur->spetiality }} </td>
                                </tr>
                                <tr>
                                    <th> etape </th>
                                    <td> {{ $createur->etape }} </td>
                                </tr>

                                <tr>
                                    <th> Description </th>
                                    <td> {{ $createur->description }} </td>
                                </tr>
                                <tr>
                                    <th> reponse_etape </th>
                                    <td> {{ $createur->reponse_etape }} </td>
                                </tr>
                                <tr>
                                    <th> Video </th>
                                    <td> <video controls width="400" height="300" class="mt-2 card-img-top"
                                            alt="{{ $createur->spetiality }}">
                                            <source src="{{ url('storage/' . $createur->video) }}" />
                                        </video> </td>
                                    <td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection