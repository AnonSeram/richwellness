@extends("layouts.app")

@section("content")
<div class="container">
    <h2 style="font-weight:600;">{{ __("messages.payment_cart") }}</h2>
    @forelse ($keranjang as $item)
        <div class="card mb-3 p-3">
            <h4>{{ __("messages.booking_code") }}: {{ $item->kode_booking }}</h4>
            <p>{{ __("messages.guest_name") }}: {{ $item->nama_tamu }}</p>
            <p>{{ __("messages.total") }}: Rp {{ number_format($item->harga, 0, ",", ".") }}</p>
            <a href="{{ route("lanjutkan.pembayaran", ["kode_booking" => $item->kode_booking]) }}" class="btn btn-success">
                {{ __("messages.continue_payment") }}
            </a>
        </div>
    @empty
        <p>{{ __("messages.no_unpaid_reservations") }}</p>
    @endforelse
</div>
@endsection


