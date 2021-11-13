@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Video {{ $video->id }}</div>
                <div class="card-body">

                    <a href="{{ url('/admin/video') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/video/' . $video->id . '/edit') }}" title="Edit video"><button
                            class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            Edit</button></a>

                    <form method="POST" action="{{ url('admin/video' . '/' . $video->id) }}" accept-charset="UTF-8"
                        style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete video"
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
                                    <td>{{ $video->id }}</td>
                                </tr>
                                <tr>
                                    <th> Nom </th>
                                    <td> {{ $video->nom }} </td>
                                </tr>
                                <tr>
                                    <th> Description </th>
                                    <td> {{ $video->description }} </td>
                                </tr>
                                <tr>
                                    <th> categorie </th>
                                    <td> {{ $video->_nom }} </td>
                                </tr>
                                <tr>
                                    <th> Video </th>
                                    <td> <video controls width="400" height="300" class="mt-2 card-img-top"
                                            alt="{{ $video->nom }}">
                                            <source src="{{ url('storage/' . $video->video) }}" />
                                        </video> </td>
                                    <td>
                                </tr>
                                <tr>
                                    <th> Minutes </th>
                                    <td> {{ $video->minute }} </td>
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