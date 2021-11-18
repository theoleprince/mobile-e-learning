@if(Auth::user()->hasRole(['administrator','superadministrator','formateur']))
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">E-Learning</span>
    </a>

    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('dist/img/user2-160x160.jpg')}}"
                    src="{{ url(isset(Auth::user()->avatar) ? 'storage/' . Auth::user()->avatar : 'photo.jfif') }}"
                    class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{url('/admin/profil')}}" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-close">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Formations
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Auth::user()->hasPermission('formations-create'))
                        <li class="nav-item">
                            <a href="{{url('admin/formation/create')}}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Ajouter</p>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('admin/formation')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Consulter</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview menu-close">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Cours
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Auth::user()->hasPermission('cours-create'))
                        <li class="nav-item">
                            <a href="{{url('admin/cours/create')}}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Ajouter</p>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('admin/cours')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Consulter</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview menu-close">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Phases
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Auth::user()->hasPermission('phases-create'))
                        <li class="nav-item">
                            <a href="{{url('admin/phase/create')}}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Ajouter</p>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('admin/phase')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Consulter</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview menu-close">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Question
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Auth::user()->hasPermission('questions-create'))
                        <li class="nav-item">
                            <a href="{{url('admin/question/create')}}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Ajouter</p>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('admin/question')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Consulter</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview menu-close">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Reponse Question
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Auth::user()->hasPermission('repsonse-qs-create'))
                        <li class="nav-item">
                            <a href="{{url('admin/reponse-q/create')}}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Ajouter</p>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('admin/reponse-q')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Consulter</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview menu-close">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Commentaire
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Auth::user()->hasPermission('commentaires-create'))
                        <li class="nav-item">
                            <a href="{{url('admin/commentaire/create')}}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Ajouter</p>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('admin/commentaire')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Consulter</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview menu-close">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Reponse Comments
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Auth::user()->hasPermission('reponse-cs-create'))
                        <li class="nav-item">
                            <a href="{{url('admin/reponse-c/create')}}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Ajouter</p>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('admin/reponse-c')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Consulter</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview menu-close">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Utilisateurs
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview menu-close">
                            <a href="#" class="nav-link">
                                &nbsp;&nbsp;<i class="nav-icon fas fa-user"></i>
                                <p>
                                    Apprenants
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if(Auth::user()->hasPermission('users-create'))
                                <li class="nav-item">
                                    <a href="{{url('admin/user/create')}}" class="nav-link">
                                        &nbsp;&nbsp;<i class="fas fa-plus nav-icon"></i>
                                        <p>Ajouter</p>
                                    </a>
                                </li>
                                @endif
                                <li class="nav-item">
                                    <a href="{{url('admin/user')}}" class="nav-link">
                                        &nbsp;&nbsp;<i class="far fa-circle nav-icon"></i>
                                        <p>Consulter</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview menu-close">
                            <a href="#" class="nav-link">
                                &nbsp;&nbsp;<i class="nav-icon fas fa-user"></i>
                                <p>
                                    Formateurs
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if(Auth::user()->hasPermission('users-create'))
                                <li class="nav-item">
                                    <a href="{{url('admin/formateur/create')}}" class="nav-link">
                                        &nbsp;&nbsp;<i class="fas fa-plus nav-icon"></i>
                                        <p>Ajouter</p>
                                    </a>
                                </li>
                                @endif
                                <li class="nav-item">
                                    <a href="{{url('admin/formateur')}}" class="nav-link">
                                        &nbsp;&nbsp;<i class="far fa-circle nav-icon"></i>
                                        <p>Consulter</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview menu-close">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Type Categories
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('admin/type-category/create')}}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Ajouter</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/type-category')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Consulter</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview menu-close">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Categories
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('admin/category/create')}}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Ajouter</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/category')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Consulter</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview menu-close">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Video
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('admin/video/create')}}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Ajouter</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/video')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Consulter</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview menu-close">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            createur
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('admin/createur/create')}}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Ajouter</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('admin/createur')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Consulter</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <hr>
                <li class="nav-item">
                    <a href="{{url('user/formation')}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Formation
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('user/cours')}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Cours
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <hr>
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Widgets
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Layout Options
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">6</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/layout/top-nav.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Top Navigation</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Top Navigation + Sidebar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/boxed.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Boxed</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fixed Sidebar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/fixed-topnav.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fixed Navbar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/fixed-footer.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fixed Footer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Collapsed Sidebar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">EXAMPLES</li>
                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Calendar
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/gallery.html" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Gallery
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
@endif