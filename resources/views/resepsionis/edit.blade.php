@extends('resepsionis.layout')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Data Reservasi</h4>
                        <form class="forms-sample" method="post" action="{{ route('dataReservasiResep.update', $dataReservasiResep->id) }}">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="nama_tamu">Nama Tamu</label>
                                <input type="text" class="form-control @error('nama_tamu') is-invalid @enderror" id="nama_tamu" placeholder="Edit nama tamu" name="nama_tamu" value="{{ old('nama_tamu', $dataReservasiResep->nama_tamu) }}" required>
                                @error('nama_tamu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Edit email" name="email" value="{{ old('email', $dataReservasiResep->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tipe_kamar">Tipe Kamar</label>
                                <input type="text" class="form-control @error('tipe_kamar') is-invalid @enderror" id="tipe_kamar" placeholder="Edit tipe kamar" name="tipe_kamar" value="{{ old('tipe_kamar', $dataReservasiResep->tipe_kamar) }}" required>
                                @error('tipe_kamar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nik">NIK / Passport</label>
                                <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" placeholder="Edit NIK / Passport" name="nik" value="{{ old('nik', $dataReservasiResep->nik) }}" required>
                                @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tgl_check_in">Check In</label>
                                <input type="date" class="form-control @error('tgl_check_in') is-invalid @enderror" id="tgl_check_in" name="tgl_check_in" value="{{ old('tgl_check_in', $dataReservasiResep->tgl_check_in) }}" required>
                                @error('tgl_check_in')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tgl_check_out">Check Out</label>
                                <input type="date" class="form-control @error('tgl_check_out') is-invalid @enderror" id="tgl_check_out" name="tgl_check_out" value="{{ old('tgl_check_out', $dataReservasiResep->tgl_check_out) }}" required>
                                @error('tgl_check_out')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg mr-2">Submit</button>
                            <a class="btn btn-dark btn-lg" href="/dataReservasiResep">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
