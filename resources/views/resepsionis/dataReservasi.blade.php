@extends('resepsionis.layout')

@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">Data Reservasi</h4>
                <form action="/dataReservasi/cari" method="GET">
                    <div class="row justify-content-md-center mb-4">
                        <div class="col col-lg-4">
                            <input type="text" class="form-control" name="cari" value="{{ old('cari') }}"
                                placeholder="Cari Nama Tamu">
                        </div>
                        <div class="col-md-auto">
                            <button type="submit" class="btn btn-warning">&nbsp;<i class="mdi mdi-filter"></i></button>
                        </div>
                    </div>
                </form>
                <form action="/dataReservasi/filter" method="GET">
                    <div class="row justify-content-md-center mb-4">
                        <div class="col col-lg-2">
                            <input type="date" class="form-control" name="fromdate" value="{{ old('fromdate') }}">
                        </div>
                        <div class="col-md-auto">
                            <button type="submit" class="btn btn-warning">&nbsp;<i class="mdi mdi-filter"></i></button>
                        </div>
                        <div class="col col-lg-2">
                            <input type="date" class="form-control" name="todate" value="{{ old('todate') }}">
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> No. </th>
                                <th> Nama Tamu </th>
                                <th> Email </th>
                                <th> Tipe Kamar </th>
                                <th> NIK / Passport </th>
                                <th> Check In </th>
                                <th> Check Out </th>
                                <th> Kode Booking </th>
                                <th> Status </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataReservasi as $row)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {{ $row->nama_tamu }} </td>
                                    <td> {{ $row->email }} </td>
                                    <td> {{ $row->tipe_kamar }} </td>
                                    <td> {{ $row->nik }} </td>
                                    <td> {{ $row->tgl_check_in }} </td>
                                    <td> {{ $row->tgl_check_out }} </td>
                                    <td> {{ $row->kode_booking }} </td>
                                    <td>
                                        <div id="status_{{ $row->id }}"
                                            class="badge @if($row->status_pembayaran === 'Belum Bayar') badge-outline-danger @else badge-outline-success @endif"
                                            onclick="changeStatus(this, {{ $row->id }})">
                                            {{ $row->status_pembayaran }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="badge bg-info border-0">
                                            <a href="{{ route('dataReservasi.edit', $row->id) }}"><i
                                                    class="mdi mdi-pencil mdi-15px text-white"></i></a>
                                        </div>
                                        &nbsp;
                                        <form action="{{ route('dataReservasi.destroy', $row->id) }}" method="post"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="badge bg-danger border-0"
                                                onclick="return confirm('Apakah Anda yakin?')"><i
                                                    class="mdi mdi-delete mdi-15px text-white"></i></button>
                                        </form>
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
<script>
    function changeStatus(button, id) {
        var currentStatus = button.innerHTML.trim();
        var newStatus = currentStatus === 'Belum Bayar' ? 'Sudah Bayar' : 'Belum Bayar';

        // Kirim permintaan ke server
        $.ajax({
            url: '/update-status/' + id,
            type: 'PUT',
            data: { status_pembayaran: newStatus, _token: '{{ csrf_token() }}' },
            success: function (response) {
                if (response.success) {
                    var newBadgeClass = newStatus === 'Belum Bayar' ? 'badge-outline-danger' : 'badge-outline-success';
                    button.innerHTML = newStatus;
                    button.classList.remove('badge-outline-danger', 'badge-outline-sucess');
                    button.classList.add(newBadgeClass);
                }
            }
        });
    }
</script>
@endsection