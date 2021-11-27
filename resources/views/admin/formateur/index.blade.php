@extends('layouts.app')

@section('content')
<!-- Default box -->
<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="display: flex; justify-content: space-between">
                    <h3 class="card-title">Utilisateurs</h3>
                    <a href="{{ url('/admin/formateur/create') }}" class="btn btn-success btn-sm"
                        title="Add New Formateur">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                </div>
                <div class="card-body">
                    <div class="row d-flex align-items-stretch">
                        @foreach($user as $item)
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                <div class="card bg-light">
                                <div class="card-header text-muted border-bottom-0">
                                    {{ $item->name }}
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead"><b>{{ $item->name }} {{ $item->prenom }}</b></h2>
                                            <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span><strong>{{$item->email}}</strong></li>
                                            </ul>
                                        </div>
                                        <div class="col-5 text-center">
                                            <img src="{{ url(isset($item->avatar) ? 'storage/' . $item->avatar : 'photo.jfif') }}"class="img-circle img-fluid" style="width:150px;margin-top: -40px; height:150px; border: 2px purple solid">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                    <a href="#" class="btn btn-sm bg-teal">
                                        <i class="fas fa-comments"></i>
                                    </a>
                                    <a href="{{ url('/admin/formateur/' . $item->id . '/edit') }}"
                                        title="Modifier Utilisateur"><button
                                            class="btn btn-primary btn-sm"><i class="fa fa-edit"
                                                aria-hidden="true"></i></button></a>
                                    <form method="POST" action="{{ url('admin/formateur/'.$user->id) }}"
                                        accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            title="Delete User"
                                            onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="pagination-wrapper"> {!! $user->appends(['search' => Request::get('search')])->render() !!} </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
    {{-- <div class="card-footer">
      <nav aria-label="Contacts Page Navigation">
        <ul class="pagination justify-content-center m-0">
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">4</a></li>
          <li class="page-item"><a class="page-link" href="#">5</a></li>
          <li class="page-item"><a class="page-link" href="#">6</a></li>
          <li class="page-item"><a class="page-link" href="#">7</a></li>
          <li class="page-item"><a class="page-link" href="#">8</a></li>
        </ul>
      </nav>
    </div>
    <!-- /.card-footer -->
  </div> --}}
@endsection
