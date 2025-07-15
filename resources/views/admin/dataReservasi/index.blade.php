@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">Data Reservasi</h4>
                
                <!-- Form Pencarian -->
                <form action="{{ route('dataReservasi.cari') }}" method="GET" class="mb-4">
                    <div class="row justify-content-md-center">
                        <div class="col col-lg-4">
                            <input type="text" class="form-control" name="cari" value="{{ request('cari') }}" placeholder="Cari Nama Tamu">
                        </div>
                        <div class="col-md-auto">
                            <button type="submit" class="btn btn-warning">
                                <i class="mdi mdi-magnify"></i> Cari
                            </button>
                        </div>
                    </div>
                </form>
                
                <!-- Form Filter Tanggal -->
                <form action="{{ route('dataReservasi.filter') }}" method="GET" class="mb-4">
                    <div class="row justify-content-md-center">
                        <div class="col col-lg-2">
                            <input type="date" class="form-control" name="fromdate" value="{{ request('fromdate') }}">
                        </div>
                        <div class="col col-lg-2">
                            <input type="date" class="form-control" name="todate" value="{{ request('todate') }}">
                        </div>
                        <div class="col-md-auto">
                            <button type="submit" class="btn btn-warning">
                                <i class="mdi mdi-filter"></i> Filter
                            </button>
                        </div>
                    </div>
                </form>
                
                <!-- Tabel Data -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Tamu</th>
                                <th>Email</th>
                                <th>Tipe Kamar</th>
                                <th>NIK/Passport</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Kode Booking</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($dataReservasi as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->nama_tamu }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->tipe_kamar }}</td>
                                    <td>{{ $row->nik }}</td>
                                    <td>{{ \Carbon\Carbon::parse($row->tgl_check_in)->format('d M Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($row->tgl_check_out)->format('d M Y') }}</td>
                                    <td>{{ $row->kode_booking }}</td>
                                    <td>
                                        <div id="status_{{ $row->id }}"
                                            class="badge 
                                                @if($row->status_pembayaran === 'Belum Bayar') 
                                                    badge-danger 
                                                @else 
                                                    badge-success 
                                                @endif"
                                            onclick="changeStatus(this, {{ $row->id }})"
                                            style="cursor: pointer">
                                            {{ $row->status_pembayaran }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('dataReservasi.edit', $row->id) }}" 
                                               class="btn btn-sm btn-info" title="Edit">
                                                <i class="mdi mdi-pencil"></i>
                                            </a>
                                            <form action="{{ route('dataReservasi.destroy', $row->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" 
                                                        onclick="return confirm('Apakah Anda yakin menghapus data ini?')"
                                                        title="Hapus">
                                                    <i class="mdi mdi-delete"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center">Tidak ada data reservasi</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                    <!-- Pagination -->
                    @if($dataReservasi->hasPages())
                        <div class="mt-4">
                            {{ $dataReservasi->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk Update Status -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function changeStatus(element, id) {
        var currentStatus = element.innerText.trim();
        var newStatus = currentStatus === 'Belum Bayar' ? 'Sudah Bayar' : 'Belum Bayar';
        
        $.ajax({
            url: '/update-status/' + id,
            type: 'PUT',
            data: {
                status_pembayaran: newStatus,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    // Update tampilan
                    element.innerText = newStatus;
                    element.classList.remove('badge-danger', 'badge-success');
                    element.classList.add(newStatus === 'Belum Bayar' ? 'badge-danger' : 'badge-success');
                    
                    // Notifikasi sukses
                    alert('Status berhasil diubah');
                }
            },
            error: function(xhr) {
                alert('Terjadi kesalahan: ' + xhr.responseJSON.message);
            }
        });
    }
</script>
@endsection