@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
    }

    .modal-dialog {
        max-width: 700px;
    }

    .modal-content {
        border-radius: 16px;
        border: none;
        padding: 25px;
        background-color: #ffffff;
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
    }

    .modal-header {
        border-bottom: none;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 0;
    }

    .modal-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: #333;
    }

    .close {
        background-color: transparent;
        border: none;
        font-size: 1.3rem;
        color: #888;
        transition: 0.3s ease;
        border-radius: 50%;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .close:hover {
        background-color: #f0f0f0;
        color: #333;
    }

    .modal-body {
        padding-top: 20px;
    }

    .modal-footer {
        border-top: none;
        justify-content: center;
    }

    .star-rating {
        font-size: 2.3rem;
        display: flex;
        justify-content: center;
        gap: 12px;
        margin-bottom: 20px;
    }

    .star-rating span {
        cursor: pointer;
        color: #e0e0e0;
        transition: transform 0.2s ease, color 0.2s ease;
    }

    .star-rating span:hover,
    .star-rating .active {
        color: #f1c40f;
        transform: scale(1.2);
    }

    .form-control {
        border-radius: 10px;
        font-size: 1rem;
    }

    .btn-minimal {
        border-radius: 8px;
        padding: 8px 20px;
        font-weight: 500;
        font-size: 0.95rem;
    }

    .btn-success {
        background-color: #28a745;
        border: none;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .btn-warning {
        background-color: #ffc107;
        border: none;
    }

    .btn-warning:hover {
        background-color: #e0a800;
    }

    .btn-secondary {
        background-color: #e9ecef;
        color: #333333;
        border: none;
    }

    .btn-secondary:hover {
        background-color: #ced4da;
    }

    .btn-primary {
        background-color: #286090;
        border: none;
    }

    .btn-primary:hover {
        background-color: #204d74;
    }
</style>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white" style="background-color: #286090;">
                    <h4 class="mb-0 font-weight-bold">Riwayat Pemesanan Kamar</h4>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if($pemesanans->isEmpty())
                        <div class="alert alert-info text-center">
                            <i class="fas fa-info-circle mr-2"></i> Anda belum memiliki riwayat pemesanan kamar.
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Tamu</th>
                                        <th>Tipe Kamar</th>
                                        <th>Check In/Out</th>
                                        <th>Durasi</th>
                                        <th>Jumlah Kamar</th>
                                        <th>Total Harga</th>
                                        <th>Status Pembayaran</th>
                                        <th>Review</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pemesanans as $pesanan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pesanan->nama_tamu }}</td>
                                        <td>{{ $pesanan->tipe_kamar }}</td>
                                        <td>
                                            <div>{{ \Carbon\Carbon::parse($pesanan->tgl_check_in)->format('d M Y') }}</div>
                                            <div class="text-muted small">s/d</div>
                                            <div>{{ \Carbon\Carbon::parse($pesanan->tgl_check_out)->format('d M Y') }}</div>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($pesanan->tgl_check_in)->diffInDays($pesanan->tgl_check_out) }} Malam</td>
                                        <td>{{ $pesanan->jumlah_kamar }}</td>
                                        <td>Rp {{ number_format($pesanan->harga, 0, ',', '.') }}</td>
                                        <td>{{ $pesanan->status_pembayaran }}</td>
                                        <td>
                                                @if($pesanan->status_pembayaran === 'Sudah Bayar')
                                                    @if(!$pesanan->rating)
                                                        <!-- Tombol Review Baru -->
                                                        <button class="btn btn-success btn-sm btn-minimal" data-toggle="modal" data-target="#reviewModal{{ $pesanan->id }}">Review</button>

                                                        <!-- Modal Review Baru -->
                                                        <div class="modal fade" id="reviewModal{{ $pesanan->id }}" tabindex="-1" role="dialog">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <form method="POST" action="{{ route('ratings.update', $pesanan->id) }}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <input type="hidden" name="pemesanan_id" value="{{ $pesanan->id }}">
                                                                    <input type="hidden" name="rating" id="editRatingInput{{ $pesanan->id }}">

                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Beri Ulasan Anda</h5>
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        </div>
                                                                        <div class="modal-body text-center">
                                                                            <div class="star-rating" id="editStarContainer{{ $pesanan->id }}">
                                                                                @for ($i = 1; $i <= 5; $i++)
                                                                                    <span data-value="{{ $i }}">★</span>
                                                                                @endfor
                                                                            </div>
                                                                            <textarea name="description" class="form-control mt-3" rows="4" placeholder="Tulis ulasan Anda di sini..." required></textarea>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-success btn-minimal">Kirim</button>
                                                                            <button type="button" class="btn btn-secondary btn-minimal" data-dismiss="modal">Tutup</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <!-- Tombol Edit Review -->
                                                        <button class="btn btn-warning btn-sm btn-minimal" data-toggle="modal" data-target="#editReviewModal{{ $pesanan->id }}">Edit Review</button>

                                                        <!-- Modal Edit -->
                                                        <div class="modal fade" id="editReviewModal{{ $pesanan->id }}" tabindex="-1" role="dialog">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <form method="POST" action="{{ route('ratings.update', $pesanan->rating->id) }}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <input type="hidden" name="pemesanan_id" value="{{ $pesanan->id }}">
                                                                    <input type="hidden" name="rating" id="editRatingInput{{ $pesanan->id }}">

                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Edit Ulasan Anda</h5>
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        </div>
                                                                        <div class="modal-body text-center">
                                                                            <div class="star-rating" id="editStarContainer{{ $pesanan->id }}">
                                                                                @for ($i = 1; $i <= 5; $i++)
                                                                                    <span data-value="{{ $i }}" class="{{ $pesanan->rating->rating >= $i ? 'active' : '' }}">★</span>
                                                                                @endfor
                                                                            </div>
                                                                            <textarea name="description" class="form-control mt-3" rows="4" required>{{ $pesanan->rating->description }}</textarea>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-success btn-minimal">Simpan</button>
                                                                            <button type="button" class="btn btn-secondary btn-minimal" data-dismiss="modal">Tutup</button>
                                                                        </div>
                                                                    </div>  
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @else
                                                        <span class="text-muted">-</span>
                                                    @endif
                                                </td>
                                                    <td>
                                                        @if($pesanan->status_pembayaran === 'Sudah Bayar')
                                                            <a href="{{ route('cetak.bukti', ['kode_booking' => $pesanan->kode_booking]) }}" class="btn btn-primary btn-sm btn-minimal" target="_blank">
                                                                <i class="fas fa-print"></i> Cetak
                                                            </a>
                                                        @else
                                                            <span class="text-muted">Menunggu Pembayaran</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>  

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        document.querySelectorAll('[id^="editStarContainer"]').forEach(container => {
                            const id = container.id.replace('editStarContainer', '');
                            const input = document.getElementById('editRatingInput' + id);
                            const stars = container.querySelectorAll('span');

                            // SET DEFAULT VALUE dari class active
                            const defaultRating = [...stars].filter(s => s.classList.contains('active')).length;
                            input.value = defaultRating;

                            stars.forEach((star, index) => {
                                star.addEventListener('click', () => {
                                    input.value = index + 1;
                                    stars.forEach((s, i) => s.classList.toggle('active', i <= index));
                                });
                            });
                        });
                    });
                    </script>

                @endsection
