<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>AdminLTE 3 | CRUD Menu</title>
    @include('template.head')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('template.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('template.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">CRUD Menu</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <a href="/create-menu" class="btn btn-success">Tambah Data</a>
                    <div class="row g-3 align-items-center mt-2">
                        <div class="col-auto">
                            <form action="/crud-menu" method="GET">
                                <input type="search" id="inputPassword6" name="search" class="form-control"
                                    aria-describedby="passwordHelpInline" placeholder="Search">
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        {{-- @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                           {{ $message}}
                          </div>
                        @endif --}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Menu</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $index => $row)
                                    <tr>
                                        <th scope="row">{{ $index + $data->firstItem() }}</th>
                                        <td>{{ $row->nama_menu }}</td>
                                        <td>
                                            <img src="{{ asset('foto/' . $row->foto) }}" alt="" style="width: 100px">
                                        </td>
                                        <td>{{ $row->harga }}</td>
                                        <td>
                                            <a href="/showdatamenu/{{ $row->id }}" class="btn btn-info">Edit</a>
                                            <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}"
                                                data-nama="{{ $row->nama_menu }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $data->links() }}
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('template.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    @include('template.script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
<script>
    $('.delete').click(function() {
        var menuid = $(this).attr('data-id');
        var nama_menu = $(this).attr('data-nama');
        swal({
                title: "Apakah Kamu Yakin?",
                text: "Akan menghapus menu dengan nama " + nama_menu + " ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/deletemenu/" + menuid + ""
                    swal("Data berhasil dihapus!", {
                        icon: "success",
                    });
                } else {
                    swal("Data tidak jadi dihapus!");
                }
            });
    });
</script>
<script>
    @if (Session::has('success'))
        toastr. success("{{ Session::get('success') }}")
    @endif
</script>

</html>
