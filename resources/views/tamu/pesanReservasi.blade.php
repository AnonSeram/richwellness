@extends("layouts.app")

@section("content")
<div class="container py-5">
    <div class="card shadow-lg border-0 rounded-5 p-5" style="background: #fdfefe; font-family: "Segoe UI", sans-serif;">
        <h2 class="mb-4 text-center fw-bold" style="color: #7AA2E3; font-size: 2rem;">{{ __("messages.room_booking") }}</h2>

        <div class="mb-4 text-center">
            <button id="step1Btn" class="btn step-btn me-2" style="background-color: #7AA2E3; color: white;">
                <span id="step1Indicator">1. {{ __("messages.select_room") }}</span>
            </button>
            <button class="btn step-btn" disabled id="step2Btn">
                2. {{ __("messages.fill_data") }}
            </button>
        </div>

        {{-- STEP 1 --}}
        <div id="step1">
            <div class="d-flex justify-content-center flex-wrap gap-4">
                @foreach($dataKamar as $row)
                <div class="card kamar-card shadow border-0 rounded-4 px-3 py-2" style="width: 18rem;"
                    data-id="{{ $row->id }}" data-harga="{{ $row->harga }}" data-tipe="{{ $row->tipe_kamar }}">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold text-uppercase text-primary-emphasis">{{ $row->tipe_kamar }}</h5>
                        <p class="card-text">Rp {{ number_format($row->harga, 0, ",", ".") }} / {{ __("messages.per_night") }}</p>
                        <p class="card-text">{{ $row->jumlah_kamar }} {{ __("messages.rooms_available") }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-4">
                <button id="nextToStep2" class="btn btn-next-step">{{ __("messages.continue_to_data_entry") }}</button>
                </button>
            </div>
        </div>

        {{-- STEP 2 --}}
        <div id="step2" style="display: none;">
            @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <strong>{{ __("messages.oops_problem") }}</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="mb-3">
                <button type="button" id="backToStep1" class="btn btn-outline-secondary">← {{ __("messages.back_to_select_room") }}</button>
            </div>

            <form method="POST" action="{{ route("pesanReservasi.store") }}">
                @csrf
                <input type="hidden" name="tipe_kamar" id="inputTipeKamar">
                <input type="hidden" name="harga_per_malam" id="inputHargaKamar">

                <div class="row g-4">
                    <div class="col-md-7">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">{{ __("messages.guest_name") }}</label>
                                <input type="text" class="form-control" name="nama_tamu" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label">{{ __("messages.email") }}</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label">{{ __("messages.phone_number") }}</label>
                                <input type="text" class="form-control" name="no_hp" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">{{ __("messages.id_passport") }}</label>
                                <input type="text" class="form-control" name="nik" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label">{{ __("messages.number_of_rooms") }}</label>
                                <input type="number" class="form-control" name="jumlah_kamar" id="jumlahKamar" value="1" min="1" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label">{{ __("messages.check_in_date") }}</label>
                                <input type="date" class="form-control" name="tgl_check_in" id="tglCheckIn" min="{{ date("Y-m-d") }}" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label">{{ __("messages.check_out_date") }}</label>
                                <input type="date" class="form-control" name="tgl_check_out" id="tglCheckOut" min="{{ date("Y-m-d") }}" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label">{{ __("messages.payment_method") }}</label>
                                <select name="metode_pembayaran" class="form-select">
                                    <option value="online">{{ __("messages.pay_online") }}</option>
                                    <option value="offline">{{ __("messages.pay_on_site") }}</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-pesan mt-4 px-4 py-2">{{ __("messages.book_now") }}</button>
                    </div>

                    <div class="col-md-5">
                        <div class="card bg-light border-0 shadow rounded-4">
                            <div class="card-body">
                                <h5 class="mb-3 fw-bold text-center">{{ __("messages.booking_summary") }}</h5>
                                <p><strong>{{ __("messages.room_type") }}:</strong> <span id="summaryTipe">-</span></p>
                                <p><strong>{{ __("messages.price_per_night") }}:</strong> Rp <span id="summaryHarga">0</span></p>
                                <p><strong>{{ __("messages.duration") }}:</strong> <span id="summaryDurasi">0</span> {{ __("messages.nights") }}</p>
                                <p><strong>{{ __("messages.number_of_rooms") }}:</strong> <span id="summaryJumlah">1</span></p>
                                <hr>
                                <h5 class="text-primary fw-bold">{{ __("messages.total") }}: Rp <span id="summaryTotal">0</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .btn-next-step {
        background: linear-gradient(135deg, #7AA2E3, #5e8bd1);
        border: none;
        color: #fff;
        padding: 0.75rem 2.5rem;
        font-size: 1.1rem;
        font-weight: 600;
        border-radius: 25px;
        box-shadow: 0 4px 12px rgba(122, 162, 227, 0.3);
        transition: all 0.3s ease-in-out;
    }

    .btn-next-step:hover {
        background: linear-gradient(135deg, #5e8bd1, #3f6fb5);
        box-shadow: 0 6px 18px rgba(90, 135, 210, 0.4);
        transform: translateY(-2px);
    }

    .btn-next-step:focus {
        outline: none;
        box-shadow: 0 0 0 4px rgba(122, 162, 227, 0.3);
    }
    
    .kamar-card {
        border: 2px solid #dee2e6;
        border-radius: 20px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        background-color: #ffffff;
    }

    .kamar-card:hover {
        border-color: #7AA2E3;
        background-color: #eef4fc;
        box-shadow: 0 0 20px rgba(122, 162, 227, 0.3);
    }

    .kamar-card.selected {
        border-color: #7AA2E3 !important;
        background-color: #e0ecfc;
    }

    .step-btn {
        border-radius: 25px;
        padding: 0.6rem 1.4rem;
        font-weight: 600;
        border: none;
        background-color: #ced4da;
        color: #212529;
        transition: background 0.3s ease;
    }

    .step-btn.active {
        background: linear-gradient(135deg, #7AA2E3, #5e8bd1);
        color: white;
    }

    #nextToStep2 {
        transition: all 0.3s ease-in-out;
        background: linear-gradient(135deg, #7AA2E3, #5e8bd1);
        color: white;
        border: none;
    }

    #nextToStep2:hover {
        background: linear-gradient(135deg, #5e8bd1, #3f6fb5);
        box-shadow: 0 0 10px rgba(122, 162, 227, 0.4);
    }

    .btn-pesan {
        background: linear-gradient(135deg, #7AA2E3, #5e8bd1);
        border: none;
        color: #fff;
        padding: 0.75rem 2.5rem;
        font-size: 1.1rem;
        font-weight: 600;
        border-radius: 25px;
        box-shadow: 0 4px 12px rgba(122, 162, 227, 0.3);
        transition: all 0.3s ease-in-out;
    }

     .btn-pesan:hover {
        background: linear-gradient(135deg, #5e8bd1, #3f6fb5);
        box-shadow: 0 6px 18px rgba(90, 135, 210, 0.4);
        transform: translateY(-2px);
    }

     .btn-pesan:focus {
        outline: none;
        box-shadow: 0 0 0 4px rgba(122, 162, 227, 0.3);
    }

</style>

<script>
    let selectedCard = null;

    document.querySelectorAll(".kamar-card").forEach(card => {
        card.addEventListener("click", function () {
            if (selectedCard) selectedCard.classList.remove("selected");
            this.classList.add("selected");
            selectedCard = this;

            const tipe = this.dataset.tipe;
            const harga = parseInt(this.dataset.harga);
            const id = this.dataset.id;

            document.getElementById("inputTipeKamar").value = id;
            document.getElementById("inputHargaKamar").value = harga;
            document.getElementById("summaryTipe").innerText = tipe;
            document.getElementById("summaryHarga").innerText = harga.toLocaleString();
            hitungTotal();
        });
    });

    document.getElementById("nextToStep2").addEventListener("click", function () {
        if (!selectedCard) {
            alert("{{ __("messages.please_select_room_type") }}");
            return;
        }

        document.getElementById("step1").style.display = "none";
        document.getElementById("step2").style.display = "block";

        document.getElementById("step2Btn").classList.add("active");
        document.getElementById("step1Indicator").innerText = "✔ {{ __("messages.select_room") }}";
    });

    document.getElementById("backToStep1").addEventListener("click", function () {
        document.getElementById("step2").style.display = "none";
        document.getElementById("step1").style.display = "block";

        document.getElementById("step2Btn").classList.remove("active");
        document.getElementById("step1Indicator").innerText = "1. {{ __("messages.select_room") }}";
    });

    function hitungTotal() {
        const harga = parseInt(document.getElementById("inputHargaKamar").value || 0);
        const jumlah = parseInt(document.getElementById("jumlahKamar").value || 1);
        const inDate = new Date(document.getElementById("tglCheckIn").value);
        const outDate = new Date(document.getElementById("tglCheckOut").value);
        let durasi = (outDate - inDate) / (1000 * 60 * 60 * 24);
        if (durasi < 1 || isNaN(durasi)) durasi = 0;

        const total = harga * jumlah * durasi;
        document.getElementById("summaryJumlah").innerText = jumlah;
        document.getElementById("summaryDurasi").innerText = durasi;
        document.getElementById("summaryTotal").innerText = total.toLocaleString();
    }

    ["jumlahKamar", "tglCheckIn", "tglCheckOut"].forEach(id => {
        document.getElementById(id).addEventListener("input", hitungTotal);
    });
</script>
@endsection


