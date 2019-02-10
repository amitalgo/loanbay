<html>
    <head>
        <title>LoanBay - @yield('title')</title>
        <!-- Bootstrap Core CSS -->
        <link href="{{asset('css/lib/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="{{asset('css/helper.css')}}" rel="stylesheet">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap-toggle.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/file-explore.css') }}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">

        <style>
            .alertify{
                position: fixed;
                z-index: 99999;
                right: 22px;
                top: 62px;
                min-width: 200px;
                text-align: center;
                color:#fee;
            }
            .r{
                background-color: #f05050 !important;
                border: 1px solid #f05050 !important;
            }
            .s{
                background-color: #5fbeaa !important;
                border: 1px solid #5fbeaa !important;
            }
           .top-pdn{ margin-top: 15px;}

            @media (min-width: 768px) {
                .col-md-6 {
                    -webkit-box-flex: 0;
                    -ms-flex: 0 0 50%;
                    flex: 0 0 50%;
                    max-width: 50%;
                    float: left;
                }
            }
            .search-table .table thead th{border-bottom: none;}
            .search-table .table td, .table th{padding: .6rem;}
            .search-table tbody tr td:last-child{ text-align: left;}
            .search-table .table > tbody > tr > td{ line-height: 22px;}
            .search-table{
                margin-top:10% !important;
            }

            .search-box input:focus{
                box-shadow:none;
                border:2px solid #eeeeee;
            }
            .search-list{
                background: #fff;

            }
            .search-list h4{color:#fff; font-size:16px;
                padding: 2%;
                margin-bottom: 0%;

            }
            .search-list h5{ color:#fff;
                margin-bottom: 0%; font-size:12px;
                padding: 2%;
            }
            .bg_colo{ background: #056073; width:100%; float:left; padding: 1% 0;}
        </style>



        @stack('styles')
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
        <!--[if lt IE 9]>
        <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="header">
            @include('admin.includes.header')
        </div>
        @section('sidebar')
            <div class="left-sidebar">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-home"></i>Dashboard </a></li>
                            <li><a href="#" class="waves-effect"><i class="fa fa-user-plus"></i> <span>Pages</span> </a>
                                <ul class="list-unstyled">
                                    @if($pages)
                                        @foreach($pages as $page)
                                            <li><a href="{{ route('page.edit',['id'=>$page->getId()]) }}">{{ $page->getTitle() }}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                            <li class="nav-label">Content Management</li>
                            <li class="item2" id="layout_3" role="presentation">
                                <a href="{{ route('cpt.index')  }}" aria-expanded="false">
                                    <i class="icon-item2 fa fa-book"></i>
                                    <span>CPT</span>
                                </a>
                            </li>

                            @if($cpts)
                                @foreach($cpts as $cpt)
                                    <li><a href="#" class="waves-effect"><i class="fa fa-user-plus"></i> <span>{{$cpt->getTitle()}}</span> </a>
                                        <ul class="list-unstyled">
                                            <li class="active">
                                                <a href="{{url('admin/cptui/add/'.$cpt->getSlug())}}" class="active">Add New</a>
                                            </li>
                                            <li>
                                                <a href="{{url('admin/cptui/list/'.$cpt->getSlug())}}" class="active">List</a>
                                            </li>
                                        </ul>
                                    </li>
                                @endforeach
                            @endif

                            <li class="nav-label">Manage Questionaries</li>
                            <li class="item2" id="layout_3" role="presentation">
                                <a href="{{ route('question.index') }}" aria-expanded="false">
                                    <i class="icon-item2 fa fa-users"></i>
                                    <span>Questionaries</span>
                                </a>
                            </li>


                            <li class="nav-label">Manage Users</li>
                            <li class="item2" id="layout_3" role="presentation">
                                <a href="{{ url('admin/user') }}" aria-expanded="false">
                                    <i class="icon-item2 fa fa-users"></i>
                                    <span>Users</span>
                                </a>
                            </li>
                            {{--<li class="item2" id="layout_3" role="presentation">--}}
                                {{--<a href="{{ url('admin/userRoleDetail') }}" aria-expanded="false">--}}
                                    {{--<i class="icon-item2 fa fa-cogs"></i>--}}
                                    {{--<span>User Roles Details</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            <li class="nav-label">General</li>
                            <li class="item2" id="layout_3" role="presentation">
                                <a href="{{ url('admin/enquiries') }}" aria-expanded="false">
                                    <i class="icon-item2 fa fa-envelope"></i>
                                    <span>Enquiries</span>
                                </a>
                            </li>
                            {{--<li class="item2" id="layout_3" role="presentation">--}}
                                {{--<a href="#" aria-expanded="false">--}}
                                    {{--<i class="icon-item2 fa fa-wrench"></i>--}}
                                    {{--<span>Email Configuration</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="item2" id="layout_3" role="presentation">--}}
                                {{--<a href="#" aria-expanded="false">--}}
                                    {{--<i class="icon-item2 fa fa-bell"></i>--}}
                                    {{--<span>Notifications</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            <li class="nav-label">Manage Admin</li>
                            <li class="item2" id="layout_3" role="presentation">
                                <a href="{{ url('admin/role') }}" aria-expanded="false">
                                    <i class="icon-item2 fa fa-cogs"></i>
                                    <span>Roles</span>
                                </a>
                            </li>
                            <li class="item2" id="layout_3" role="presentation">
                                <a href="{{url('admin/sub-admin')}}" aria-expanded="false">
                                    <i class="icon-item2 fa fa-user-secret"></i>
                                    <span>Admin</span>
                                </a>
                            </li>

                            {{--Masters--}}
                            <li class="nav-label">Manage Master</li>
                            <li class="item2" id="layout_3" role="presentation">
                                <a href="{{url('admin/document-type')}}" aria-expanded="false">
                                    <i class="icon-item2 fa fa-user-secret"></i>
                                    <span>Document Type</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- End Sidebar navigation -->
                </div>
                <!-- End Sidebar scroll-->
            </div>
        @show
        <div class="page-wrapper">
            @yield('content')
            <!-- footer -->
            <footer class="footer">
                @include('admin.includes.footer')
            </footer>
            <!-- End footer -->
        </div>
        <!-- All Jquery -->
        <script src="{{asset('js/lib/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="{{asset('js/lib/bootstrap/js/popper.min.js')}}"></script>
        <script src="{{asset('js/lib/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('js/bootstrap-toggle.js') }}"></script>
        <!-- slimscrollbar scrollbar JavaScript -->
        <script src="{{asset('js/jquery.slimscroll.js')}}"></script>
        <!--Menu sidebar -->
        <script src="{{asset('js/sidebarmenu.js')}}"></script>
        <!--stickey kit -->
        <script src="{{asset('js/lib/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>

        <!--Custom JavaScript -->
        <script src="{{asset('js/custom.min.js')}}"></script>
        <!-- Common Javascript -->
        <script src="{{asset('js/common.js')}}"></script>

        {{--Datatables--}}
        <script src="{{asset('js/lib/datatables/datatables.min.js')}}"></script>
        <script src="{{asset('js/lib/datatables/datatables-init.js')}}"></script>

        {{--File Explore--}}
        <script src="{{ asset('js/file-explore.js') }}"></script>

        {{-- Select 2 --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

        {{-- Tiny MCE Editor --}}
{{--        <script src="{{ asset('js/ckeditor.js') }}"></script>--}}
        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

        {{--JQuery Validation--}}
        <script src="{{ asset('js/jquery-validate.js') }}"></script>

        @stack('scripts')

        <script>
            $(".select2").select2();
        </script>
    </body>
</html>