@extends('../layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Client</span>
                                <span class="info-box-number">
                                    {{ $totalclient }}
                                </span>
                            </div>

                        </div>

                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Designer</span>
                                <span class="info-box-number">{{ $totaldesigner }}</span>
                            </div>

                        </div>

                    </div>


                    <div class="clearfix hidden-md-up"></div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Content Writer</span>
                                <span class="info-box-number">{{ $totalcontentwriter }}</span>
                            </div>

                        </div>

                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">New Members</span>
                                <span class="info-box-number">2,000</span>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">SELAMAT DATANG</h3>
                            </div>

                            <div class="card-body">
                                <h5>APLIKASI MANAJEMEN TUGAS TRIVELA GRAFIKA</h5>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">PROFIL DATA TRIVELA GRAFIKA</h3>
                            </div>

                            <div class="card-body">
                                <h5></h5>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">AGENDA POST</h3>
                            </div>

                            <div class="card-body">
                                <table id="dashboard" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Client</th>
                                            <th>No Telp Client</th>
                                            <th>Email Client</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">CONTENT</h3>
                            </div>

                            <div class="card-body">
                                <table id="content" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Konten</th>
                                            <th>Nama Client</th>
                                            <th>Designer</th>
                                            <th>Jadwal Post</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- /.content-wrapper -->
@endsection

@section('js')
    <script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
        $('body').ready(function() {
            $('#dashboard').DataTable({
                processing: true,
                serverSide: true, //aktifkan server-side
                autoWidth: false,
                ajax: {
                    url: "{{ route('leader.client') }}",
                    type: 'GET'
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nama_client',
                        name: 'nama_client'
                    },
                    {
                        data: 'telp',
                        name: 'telp'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },

                ],
                order: [
                    [0, 'asc']
                ]
            });
            $('#content').DataTable({
                processing: true,
                serverSide: true, //aktifkan server-side
                autoWidth: false,
                ajax: {
                    url: "{{ route('leader.datacontent') }}",
                    type: 'GET'
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nama_projek',
                        name: 'nama_projek'
                    },
                    {
                        data: 'client',
                        name: 'client'
                    },
                    {
                        data: 'designer',
                        name: 'designer',
                        render: function(data) {
                            return '<span class="badge badge-primary "> ' + data + '</span>'
                        }
                    },


                    {
                        data: 'jadwal_post',
                        name: 'jadwal_post'
                    },

                ],
                order: [
                    [0, 'asc']
                ]
            });
        });
    </script>
@endsection
