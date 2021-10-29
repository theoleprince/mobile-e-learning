@extends('layouts.appClient')

@section('content')
    @php
        $id_question = 1;
    @endphp
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-info card-outline">
                <div class="card-header row">
                    <div class="col-1">
                        <a href="{{url('/user/cours')}}" class="btn btn-warning row">
                            <i class="fas fa-arrow-left">Retour</i>
                        </a>
                    </div>
                    <div class="col-11">
                        <h2 class="card-title" style="margin-left: 40%">
                            <i class="fas fa-edit"></i>
                            Evaluation
                        </h2>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/user/reponse-q') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @forelse ($question as $item)
                            <div class="car">

                                <div class="row">
                                    <div class="col-12">
                                        <div>
                                            <p><b>N°{{ $loop->iteration }}:</b>{{$item->question}}&hellip;({{$item->nbre_point}} pts)</p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group {{ $errors->has('question') ? 'has-error' : ''}}">
                                            <textarea class="form-control" placeholder="Reponse à la question N°{{ $loop->iteration }}" rows="2" name={{"Reponse" . $id_question}} required type="textarea" id="Reponse" >{{ isset($reponseq->Reponse) ? $reponseq->Reponse : ''}}</textarea>
                                            {!! $errors->first('Reponse', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="form-group {{ $errors->has('question_id') ? 'has-error' : ''}}" hidden>
                                            <input class="form-control" name={{"question_id" . $id_question}} type="text" id="question_id" value=" {{$item->id}}" >
                                            {!! $errors->first('question_id', '<p class="help-block">:message</p>') !!}
                                        </div>
                                        <div class="form-group {{ $errors->has('created_id') ? 'has-error' : ''}}" hidden>
                                            <label for="created_id" class="control-label">{{ 'Created Id' }}</label>
                                            <input class="form-control" name={{"created_id" . $id_question}} type="number" id="created_id" readonly value="{{ Auth::user()->id }}" >
                                            {!! $errors->first('created_id', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modal-xl">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                    <h4 class="modal-title">{{$item->question}}</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>

                                                    </p>
                                                </div>
                                        </div>
                                    <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            </div>
                            <hr>
                            @php
                                $id_question++;
                            @endphp
                        @empty
                            Les questions ne sont pas encore prévu
                        @endforelse
                            <div class="form-group">
                                <input class="btn btn-success swalDefaultSuccess" type="submit" value="Envoyer">
                            </div>
                            <input class="form-control" name="valeurId" type="hidden" id="question_id" value={{$id_question}} >
                    <div class="row">
                        <div class="text-muted mt-3 col-5">
                            Répondez aux questions posé
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                                voir mes réponses
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- ./row -->
      </div><!-- /.container-fluid -->

        <div class="modal fade" id="modal-xl">
            <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Extra Large Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <p>One fine body&hellip;</p>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success swalDefaultSuccess" data-dismiss="modal">
                    Submit
                </button>
                </div>
            </div>
            <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
      <!-- /.modal -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>

    <script>
        $(function() {
            var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
            });

            $('.swalDefaultSuccess').click(function() {
            Toast.fire({
                icon: 'success',
                title: ' Vos reponses ont été envoyé avec success.'
            })
            });


            $('.toastrDefaultSuccess').click(function() {
            toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            });
            $('.toastrDefaultInfo').click(function() {
            toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            });
            $('.toastrDefaultError').click(function() {
            toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            });
            $('.toastrDefaultWarning').click(function() {
            toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            });

            $('.toastsDefaultDefault').click(function() {
            $(document).Toasts('create', {
                title: 'Toast Title',
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
            });
            $('.toastsDefaultTopLeft').click(function() {
            $(document).Toasts('create', {
                title: 'Toast Title',
                position: 'topLeft',
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
            });
            $('.toastsDefaultBottomRight').click(function() {
            $(document).Toasts('create', {
                title: 'Toast Title',
                position: 'bottomRight',
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
            });
            $('.toastsDefaultBottomLeft').click(function() {
            $(document).Toasts('create', {
                title: 'Toast Title',
                position: 'bottomLeft',
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
            });
            $('.toastsDefaultAutohide').click(function() {
            $(document).Toasts('create', {
                title: 'Toast Title',
                autohide: true,
                delay: 750,
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
            });
            $('.toastsDefaultNotFixed').click(function() {
            $(document).Toasts('create', {
                title: 'Toast Title',
                fixed: false,
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
            });
            $('.toastsDefaultFull').click(function() {
            $(document).Toasts('create', {
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
                title: 'Toast Title',
                subtitle: 'Subtitle',
                icon: 'fas fa-envelope fa-lg',
            })
            });
            $('.toastsDefaultFullImage').click(function() {
            $(document).Toasts('create', {
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
                title: 'Toast Title',
                subtitle: 'Subtitle',
                image: '../../dist/img/user3-128x128.jpg',
                imageAlt: 'User Picture',
            })
            });
            $('.toastsDefaultSuccess').click(function() {
            $(document).Toasts('create', {
                class: 'bg-success',
                title: 'Toast Title',
                subtitle: 'Subtitle',
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
            });
            $('.toastsDefaultInfo').click(function() {
            $(document).Toasts('create', {
                class: 'bg-info',
                title: 'Toast Title',
                subtitle: 'Subtitle',
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
            });
            $('.toastsDefaultWarning').click(function() {
            $(document).Toasts('create', {
                class: 'bg-warning',
                title: 'Toast Title',
                subtitle: 'Subtitle',
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
            });
            $('.toastsDefaultDanger').click(function() {
            $(document).Toasts('create', {
                class: 'bg-danger',
                title: 'Toast Title',
                subtitle: 'Subtitle',
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
            });
            $('.toastsDefaultMaroon').click(function() {
            $(document).Toasts('create', {
                class: 'bg-maroon',
                title: 'Toast Title',
                subtitle: 'Subtitle',
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
            });
        });
    </script>
@endsection

