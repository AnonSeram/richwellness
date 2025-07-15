@extends('layouts.app')

@section('content')
<div class="container">
    <h2 style="font-weight:600;">Keranjang Pembayaran</h2>
    @forelse ($keranjang as $item)
        <div class="card mb-3 p-3">
            <h4>Kode Booking: {{ $item->kode_booking }}</h4>
            <p>Nama Tamu: {{ $item->nama_tamu }}</p>
            <p>Total: Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
            <a href="{{ route('lanjutkan.pembayaran', ['kode_booking' => $item->kode_booking]) }}" class="btn btn-success">
                Lanjutkan Pembayaran
            </a>
        </div>
    @empty
        <p>Tidak ada reservasi yang belum dibayar.</p>
    @endforelse
</div>
@endsection
