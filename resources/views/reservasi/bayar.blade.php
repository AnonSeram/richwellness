<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pembayaran</title>
    
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: #f7f9fb;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            text-align: center;
            background: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            max-width: 500px;
            width: 100%;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .order-info {
            text-align: left;
            margin-bottom: 30px;
        }

        .order-info p {
            margin: 6px 0;
            font-size: 14px;
            color: #555;
        }

        .order-info p span {
            font-weight: 600;
            color: #222;
        }

        #pay-button {
            padding: 12px 30px;
            font-size: 16px;
            background-color: #00b894;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        #pay-button:hover {
            background-color: #019874;
            transform: translateY(-2px);
        }

        #pay-button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .note {
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detail Pembayaran</h1>

        <div class="order-info">
            <p><span>Nama Tamu:</span> {{ $dataReservasi->nama_tamu }}</p>
            <p><span>Email:</span> {{ $dataReservasi->email }}</p>
            <p><span>No. HP:</span> {{ $dataReservasi->no_hp }}</p>
            <p><span>Tipe Kamar:</span> {{ $dataReservasi->tipe_kamar }}</p>
            <p><span>Jumlah Kamar:</span> {{ $dataReservasi->jumlah_kamar }}</p>
            <p><span>Check-in:</span> {{ \Carbon\Carbon::parse($dataReservasi->tgl_check_in)->format('d M Y') }}</p>
            <p><span>Check-out:</span> {{ \Carbon\Carbon::parse($dataReservasi->tgl_check_out)->format('d M Y') }}</p>
            <p><span>Total Harga:</span> Rp{{ number_format($dataReservasi->harga, 0, ',', '.') }}</p>
        </div>

        <button id="pay-button">Bayar Sekarang</button>
        <div class="note">Klik tombol untuk melanjutkan pembayaran</div>
    </div>

    <script>
        var snapToken = "{{ $snapToken }}";
        var kodeBooking = "{{ $kode_booking }}";
        var payButton = document.getElementById('pay-button');

        if (!snapToken) {
            payButton.disabled = true;
            Swal.fire({
                icon: 'error',
                title: 'Token Tidak Tersedia',
                text: 'Silakan coba lagi atau hubungi admin.'
            });
        } else {
            payButton.addEventListener('click', function () {
                window.snap.pay(snapToken, {
                    onSuccess: function (result) {
                        console.log(result);
                        Swal.fire({
                            icon: 'success',
                            title: 'Pembayaran Berhasil!',
                            text: 'Terima kasih, pembayaran kamu sudah kami terima.',
                            confirmButtonText: 'Lihat Bukti Pembayaran'
                        }).then(() => {
                            window.location.href = "{{ url('cetak-bukti') }}/" + kodeBooking;
                        });
                    },
                    onPending: function (result) {
                        console.log(result);
                        Swal.fire({
                            icon: 'info',
                            title: 'Menunggu Pembayaran',
                            text: 'Silakan selesaikan pembayaran sesuai instruksi.',
                        });
                    },
                    onError: function (result) {
                        console.log(result);
                        Swal.fire({
                            icon: 'error',
                            title: 'Pembayaran Gagal',
                            text: 'Silakan coba lagi atau gunakan metode lain.',
                        });
                    }
                });
            });
        }
    </script>
</body>
</html>
