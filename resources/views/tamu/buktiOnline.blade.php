<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Logo -->
    <link href="assets/homepage/img/favicon.png" rel="icon">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Cetak Reservasi - Rich Wellness</title>
    <style>
        .img-fluid {
            max-width: 500px;
        }

        #countdown {
            font-size: 1.0rem;
            font-weight: normal;
            color: #000;
            position: relative;
            margin-top: 10px;
            text-align: center;
            top: 10px;
            left: 550px;
            right: 550px;
            z-index: 100;
        }
        .info {
            text-align: center; /* Menengahkan teks */
        }
        .harga {
            font-size: 1.2rem; /* Besarkan ukuran font harga */
            font-weight: bold;
            text-align: center; /* Menengahkan teks harga */
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <a href="/" class="text-light text-decoration-none">
                    <button type="button" class="btn btn-success mb-3 text-light"><i
                            class="fa-solid fa-right-from-bracket"></i></button>
                </a>
                <div class="alert alert-success mb-3" role="alert">
                    Pemesanan Berhasil, Silahkan Lakukan Pembayaran
                </div>
                <div id="countdown"></div>
                <div class="info">
                    <p><strong>Kode Booking :</strong> {{ $post->kode_booking }}</p>
                </div>
                <div class="harga">
                    <p><strong>Harga :</strong> Rp {{ number_format($post->harga, 0, ',', '.') }}</p>
                </div>
                <div class="text-center mb-3">
                    <img src="/nyoba/images/fasilitas/QR.png" alt="QR Code" class="img-fluid">
                </div>
                <div class="text-center">
                    <a href="/cetak" class="btn btn-primary">Sudah Melakukan Pembayaran</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script>
        var countDownDate = new Date(new Date().getTime() + 60 * 60 * 1000).getTime();

        function updateCountdown() {
            var now = new Date().getTime();
            var distance = countDownDate - now;
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("countdown").innerHTML = "Waktu Tersisa: " + hours + "j " + minutes + "m " + seconds + "d ";

            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown").innerHTML = "Waktu pembayaran telah habis.";
            }
        }

        updateCountdown();
        var x = setInterval(updateCountdown, 1000);
    </script>
</body>

</html>
