@extends('layouts.app')

@section('content')
    <section class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="display: flex; justify-content: space-between">
                            <h3 class="card-title">Utilisateurs</h3>
                            <a href="{{ url('/admin/formateur/create') }}" class="btn btn-success btn-sm" title="Add New Formateur">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>avatar</th>
                                            <th>Role</th>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Email</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="container" style="width: 60px;">
                                                    <a href="{{ url('storage/' . $item->avatar) }}" data-toggle="lightbox">
                                                        <img src="{{$item->avatar}}"
                                                            class="img-fluid mb-2 img-circle img-bordered-sm"
                                                            alt="">
                                                    </a>
                                                </div>
                                            </td>
<!--                                             <td>{{ $item->avatar }}</td>
 -->                                            <td>{{ $item->_role }}</td>
 -->                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->prenom }}</td>
                                            <td><a href="mailto:{{$item->email}}"><strong>{{$item->email}}</strong></a></td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                        <i class="dw dw-more"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list px-4">
                                                        <a href="{{ url('/admin/formateur/' . $item->id) }}" title="Detail Utilisateur"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                        <a href="{{ url('/admin/formateur/' . $item->id . '/edit') }}" title="Modifier Utilisateur"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></button></a>
                                                        <form method="POST" action="{{ url('admin/formateur/$user->id') }}" accept-charset="UTF-8" style="display:inline">
                                                            {{ method_field('DELETE') }}
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete User" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                        </form>                                                    
                                                    </div>
                                                </div>
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
    </section>
@endsection
