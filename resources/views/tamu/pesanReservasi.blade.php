<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="C:\xampp\htdocs\project4mk\public\assets\homepage\img\favicon.png" type="image/png">

    <title>Pesan Reservasi - Rich Wellness</title>

    <!-- Google font -->
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet" type="text/css" />

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="assets/tamu/css/bootstrap.min.css" />

    <!-- Custom stylesheet -->
    <link type="text/css" rel="stylesheet" href="assets/tamu/css/style.css" />

</head>

<body>
    <div class="container">
        <div class="row">
            <!-- Form Container -->
            <div class="col-md-6 form-container">
                <form method="post" action="{{ route('pesanReservasi.store') }}">
                    @csrf
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="nama_tamu">Nama Tamu</label>
                        <input class="form-control" type="text" required placeholder="Input nama" name="nama_tamu"
                            value="{{ old('nama_tamu') }}" autofocus>
                        @error('nama_tamu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" required placeholder="Input email" name="email"
                            value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No. HP</label>
                        <input class="form-control" type="text" required placeholder="Input No.HP" name="no_hp"
                            value="{{ old('no_hp') }}">
                        @error('no_hp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah_kamar">Jumlah Kamar</label>
                        <input class="form-control" type="number" required placeholder="Input jumlah kamar"
                            name="jumlah_kamar" value="{{ old('jumlah_kamar') }}">
                        @error('jumlah_kamar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK/PASPOR</label>
                        <input class="form-control" type="text" required placeholder="Input NIK/PASPOR" name="nik"
                            value="{{ old('nik') }}">
                        @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tipe_kamar">Tipe Kamar</label>
                        <select class="form-control" name="tipe_kamar" id="tipe_kamar" required>
                            <option value="" disabled selected>Pilih Tipe Kamar</option>
                            @foreach($dataKamar as $row)
                                <option value="{{ $row->id }}" data-harga="{{ $row->harga }}">
                                    {{ $row->tipe_kamar }}
                                </option>
                            @endforeach
                        </select>
                        <small id="ketersediaan_kamar" class="form-text text-muted"></small>
                        @error('tipe_kamar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tgl_check_in">Check In</label>
                        <input class="form-control" type="date" required name="tgl_check_in"
                            value="{{ old('tgl_check_in') }}">
                    </div>
                    <div class="form-group">
                        <label for="tgl_check_out">Check Out</label>
                        <input class="form-control" type="date" required name="tgl_check_out"
                            value="{{ old('tgl_check_out') }}">
                    </div>
                    <div class="form-group">
                        <label for="metode_pembayaran">Metode Pembayaran</label>
                        <select class="form-control" id="metode_pembayaran" name="metode_pembayaran">
                            <option value="online">Bayar Online</option>
                            <option value="offline">Bayar Offline</option>
                        </select>
                    </div>
                    <div class="form-btn">
                        <button class="btn btn-primary">PEMBAYARAN</button>
                    </div>
                </form>
            </div>
            <!-- Kamar Container -->
            <div class="col-md-6 kamar-container">
                <div class="section-title">
                    <h2>Daftar Kamar</h2>
                </div>
                <div class="row">
                    @php $counter = 0; @endphp
                    @foreach($dataKamar as $row)
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="icon-box">
                                            <i class="bi bi-house-door-fill"></i>
                                        </div>
                                        <h4 class="card-title">{{ $row->tipe_kamar }}</h4>
                                        <p class="card-text">Harga: Rp. {{ number_format($row->harga, 0, ',', '.') }}</p>
                                        <p class="card-text">Tersedia: {{ $row->jumlah_kamar }} kamar</p>
                                    </div>
                                </div>
                            </div>
                            @php    $counter++; @endphp
                            @if($counter % 2 == 0)
                                </div>
                                <div class="row">
                            @endif
                    @endforeach
                </div>
            </div>
</body>

</html>