<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <title>AdminLTE 3 | Input Transaksi</title>
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
                            <h1 class="m-0">Input Transaksi</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Input Transaksi</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="container">
                <div class="row">
                    <div class="col-7">
                        <div class="card">

                            <div class="card-header">
                                <h4>Daftar Menu</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="card-columns">
                                        @foreach ($data as $item)
                                            <div class="card">
                                                <img src="{{ asset('foto/' . $item->foto) }}" class="card-img-top"
                                                    alt="">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $item->nama_menu }}</h5>
                                                    <p class="card-text">{{ $item->harga }}</p>
                                                </div>
                                                <div class="card-footer">
                                                    {{-- <a href="{{ url('input-menu/' . $item->id) }}"
                                                        class="btn btn-primary">Show</a> --}}
                                                    <a href="" class="btn btn-primary" id="keranjang-modal"
                                                        data-attr="{{ url('input-menu/' . $item->id) }}"
                                                        data-toggle="modal" data-target="#exampleModal">Tambahkan</a>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="card">

                            <div class="card-header">
                                <h4>Keranjang</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('menu-transaksi') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="" class="form-label">Kode Invoice</label>
                                        <input type="text" name="" id="" class="form-control"
                                            value="{{ $invoice }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Nama pelanggan</label>
                                        <input type="text" name="" id="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Nomor Meja</label>
                                        <select class="form-control select2" name="no_meja"
                                            aria-label="Default select example">
                                            <option selected>Pilih Meja</option>
                                            @foreach ($meja as $item)
                                                <option value="{{ $item->id }}">{{ $item->nomor_meja }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama Menu</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($cart))

                                                @foreach ($cart as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item['nama_menu'] }}</td>
                                                        <td>{{ $item['qty'] }}</td>
                                                        <td>{{ $item['harga'] }}</td>

                                                        <td>
                                                            <a href="{{ route('delete-menu-cart', $item['row_id']) }}"
                                                                class="btn btn-danger">Hapus</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>

                                    <div class="row justify-content-between">
                                        @if (isset($cart))
                                            <div class="col-4">
                                                Jumlah: {{ count($cart) }}
                                            </div>
                                            <div class="col-5">

                                                Total harga: {{ $total_harga }}
                                            </div>
                                        @endif
                                    </div>


                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal Keranjang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('menu-cart') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="" class="form-label">Nama Menu</label>
                                <input type="text" name="nama_menu" id="nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Qty</label>
                                <input type="number" name="qty" id="qty" class="form-control" value="1">
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Harga</label>
                                <input type="text" name="harga" id="harga" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tambahkan ke keranjang</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

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

    <script>
        $(document).ready(function() {
            var harga;

            $('body').on('click', '#keranjang-modal', function(event) {
                event.preventDefault();
                let hrefs = $(this).attr('data-attr');
                axios.get(hrefs)
                    .then(function(response) {
                        harga = response.data.harga;
                        $('#nama').val(response.data.nama_menu);
                        $('#harga').val(response.data.harga);
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            });

            $('#qty').change(function() {
                $hasil = harga * $('#qty').val();
                $('#harga').val($hasil);
            });

            $('#exampleModal').on('hidden.bs.modal', function(e) {
                $('#exampleModal').modal('hide');
                $('#qty').val('0');
                $('#harga').val('0');
            });
        });
    </script>
</body>

</html>
