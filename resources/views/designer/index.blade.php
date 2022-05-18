@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        {{-- MODAL Tambah --}}
        <div class="modal fade" id="upload">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Upload Design</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="javascript:void(0)" enctype="multipart/form-data" id="formupload" method="POST">
                            <input type="hidden" id="id">
                            <label for="">Upload File Design</label>
                            <input type="file" name="file" class="form-control">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- MODAL Tambah --}}
        <div class="modal fade" id="modal-lihat">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Detail Design</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="" id="pict" alt="">
                    </div>
                    <div class="modal-footer justify-content-between">
                        {{-- <button type="button" id="update" class="btn btn-primary btn-block">Update</button> --}}
                        <button type="button" class="hapus btn btn-danger btn-block">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- MODAL Edit --}}
        <div class="modal fade" id="modal-edit">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Konten</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="formeditKonten">
                            <div class="form-group">
                                <label for="">Nama Klien</label>
                                <select name="namaklien" id="namaklien1" class="form-control select2"
                                    data-placeholder="Pilih Client" style="width: 100%;">
                                    @php
                                        $cw = App\Client::all();
                                    @endphp
                                    @foreach ($cw as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_client }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Projek</label>
                                <input type="text" name="namaprojek" id="namaprojek1" class="form-control"
                                    placeholder="masukan email">
                            </div>
                            <div class="form-group">
                                <label for="">Designer</label>
                                <select name="designer[]" id="designer1" class="form-control select2" multiple="multiple"
                                    data-placeholder="Pilih Designer" style="width: 100%;">
                                    @php
                                        $cw = App\Designer::all();
                                    @endphp
                                    @foreach ($cw as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Jadwal</label>
                                <input type="date" name="jadwal" id="jadwal1" placeholder="masukan password"
                                    class="form-control">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updateKonten">Update</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Konten</h3>

                </div>
                <div class="card-body">
                    <table id="tablekonten" class="table table-bordered table-hover ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Konten</th>
                                <th>Nama Client</th>
                                <th>Designer</th>
                                <th>File Konten</th>
                                <th>Deadline Pengerjaan</th>
                                <th width="10">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
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
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });


        $('body').ready(function() {
            $('#tablekonten').DataTable({
                processing: true,
                serverSide: true, //aktifkan server-side
                autoWidth: false,
                ajax: {
                    url: "{{ route('designer.konten') }}",
                    type: 'GET'
                },
                columnDefs: [{
                        "targets": 3, // your case first column
                        "className": "text-center",
                        "width": "4%",

                    },
                    {
                        "targets": 4, // your case first column
                        "className": "text-center",

                    },
                    {
                        "targets": 5, // your case first column
                        "className": "text-center",

                    },
                    {
                        "targets": 6, // your case first column
                        "className": "text-center",

                    }
                ],
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
                            return '<h2 style="font-size:1rem;" class="badge badge-primary "> ' +
                                data + '</h2>'
                        }
                    },


                    {
                        data: 'file',
                        name: 'file'
                    },
                    {
                        data: 'jadwal_post',
                        name: 'jadwal_post',
                        "render": function(data) {
                            var date = new Date(data);
                            var month = date.getMonth() + 1;
                            return (month.length > 1 ? month : "0" + month) + "/" + date
                                .getDate() +
                                "/" + date.getFullYear();
                        }
                    },

                    {
                        data: 'action',
                        name: 'action'
                    },
                ],
                order: [
                    [0, 'asc']
                ]
            });
        });
        $("#formupload").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var id = $('.upload').attr('data-id')
            $.ajax({
                type: 'POST',
                url: '{{ url('designer/uploaddesign') }}/' + id,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    this.reset();
                    Swal.fire(
                        'Design Berhasil Ditambahkan!',
                        'Terima Kasih!',
                        'success')
                    $('#tablekonten').DataTable().draw(false)
                    $('#upload').modal('hide')
                    console.log(data);
                },
                error: function(data) {
                    console.log(data);
                }
            })
        })

        function editKonten(id) {
            $("#modal-edit").modal('show')
            $.ajax({
                type: 'GET',
                url: '{{ url('contentwriter/kontenEdit') }}/' + id,
                dataType: 'JSON',
                success: function(response) {
                    console.log(response.kntn)
                    kntn = response.kntn;
                    var designer = response.kntn.id_designer.split(',');
                    $("#id").val(kntn.id);
                    $('[name=namaklien1]').val(kntn.nama_client);
                    $("#namaprojek1").val(kntn.nama_projek);
                    $("#jadwal1").val(kntn.jadwal_post);
                    $("#designer1").val(designer).trigger('change.select2').select2({})
                }
            })
        }

        function lihatKonten(id) {
            $("#modal-lihat").modal('show')
            $.ajax({
                type: 'GET',
                url: '{{ url('designer/getdesign') }}/' + id,
                dataType: 'JSON',
                success: function(response) {
                    $.each(response, function(key, value) {
                        $("#modal-lihat").css("text-align", "center");
                        $("#pict").attr("src", value.file).css("width", "60%");
                        $(".hapus").on("click", function() {
                            var id = value.id
                            hapusKonten(id)
                        })
                    });
                }
            })
        }

        $("#updateKonten").click(function() {
            var id = $("#id").val();
            var data = $('#formeditKonten').serialize();
            $.ajax({
                type: 'POST',
                url: '{{ url('contentwriter/updateKonten') }}/' + id,
                data: data,
                // dataType: 'JSON',
                success: function(response) {
                    console.log(response)
                    $('#modal-edit').modal('hide')
                    Swal.fire(
                        'Update Konten Berhasil!',
                        'Terima Kasih!',
                        'success')
                    $('#tablekonten').DataTable().draw(false)
                }
            })
        })


        function hapusKonten($id) {
            Swal.fire({
                title: 'Apakah Anda Yakin Akan Menghapus Design Ini?',
                // text: "Silahkan periksa kembali data progress kegiatan, apakah data yang anda masukkan sudah benar?!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal'
            }).then((result) => {
                var id = id;
                console.log(id)
                if (result.value) {
                    window.location.href = "{{ url('designer/hapusDesign') }}/" + $id;
                }
            })
        }
    </script>
    <script>
        function konfirmasiDesign($id) {
            Swal.fire({
                title: 'Apakah anda yakin ingin Menkonfirmasi tugas tersebut?',
                icon: 'question',
                iconHtml: '?',
                confirmButtonText: 'ya',
                cancelButtonText: 'tidak',
                showCancelButton: true,
                showCloseButton: true
            }).then((result) => {
                if (result.value) {
                    window.location.href = "{{ url('designer/konfirmasi') }}/" + $id;
                }
            })
        }
    </script>
@endsection
