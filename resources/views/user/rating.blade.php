<!-- ======= Testimonials Section ======= -->
<section id="penilaian" class="testimonials section-bg">
  <div class="container">
    <div class="section-title" data-aos="fade-up">
      <h2>Penilaian</h2>
    </div>

    <!-- Form Rating -->
    <div class="rating-box" data-aos="fade-up" data-aos-delay="100">
      <h3>Beri Penilaian Anda</h3>
      <div class="star-rating" id="star-container">
        <span data-value="1">★</span>
        <span data-value="2">★</span>
        <span data-value="3">★</span>
        <span data-value="4">★</span>
        <span data-value="5">★</span>
      </div>
      <textarea id="review-text" rows="4" placeholder="Tulis ulasan Anda di sini..."></textarea>
      <button id="submit-rating">Kirim Penilaian</button>
    </div>

    <!-- Existing Ratings -->
    <div class="existing-ratings" id="existing-ratings">
      <h3>Penilaian Sebelumnya:</h3>
      <div id="ratings-list">
        <!-- Penilaian yang sudah ada akan ditampilkan di sini -->
      </div>
    </div>
  </div>

  <style>
    .rating-box {
      background: #fff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      margin: 40px auto;
      max-width: 600px;
      text-align: center;
    }

    .star-rating {
      font-size: 2rem;
      color: #ccc;
      margin: 10px 0;
      cursor: pointer;
    }

    .star-rating .active {
      color: gold;
    }

    #review-text {
      width: 100%;
      margin: 10px 0;
      padding: 10px;
      border-radius: 8px;
      border: 1px solid #ccc;
      resize: vertical;
    }

    #submit-rating {
      background: #28a745;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s;
    }

    #submit-rating:hover {
      background: #218838;
    }

    .rating-item {
      background: #f9f9f9;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 8px;
    }

    .rating-stars {
      color: gold;
    }
  </style>

  <script>
    let selectedRating = 0;

    // Event listener untuk memilih rating
    document.addEventListener('DOMContentLoaded', function () {
      document.querySelectorAll('#star-container span').forEach((star, index) => {
        star.addEventListener('click', () => {
          selectedRating = index + 1;
          document.querySelectorAll('#star-container span').forEach((s, i) => {
            s.classList.toggle('active', i < selectedRating);
          });
        });
      });

      // Kirim rating ke backend
      document.getElementById('submit-rating').addEventListener('click', () => {
        const description = document.getElementById('review-text').value;

        if (selectedRating === 0 || !description.trim()) {
          alert('Mohon isi rating dan deskripsi terlebih dahulu.');
          return;
        }

        fetch('http://127.0.0.1:8000/api/ratings', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
          },
          body: JSON.stringify({
            rating: selectedRating,
            description: description
          })
        })
        .then(res => res.json())
        .then(() => {
          alert('Terima kasih atas penilaian Anda!');
          selectedRating = 0;
          document.getElementById('review-text').value = '';
          document.querySelectorAll('#star-container span').forEach(s => s.classList.remove('active'));

          // Ambil data terbaru
          fetchRatings();
        })
        .catch(err => {
          console.error(err);
          alert('Terjadi kesalahan saat mengirim penilaian.');
        });
      });

      // Ambil rating yang sudah ada
      function fetchRatings() {
        fetch('http://127.0.0.1:8000/api/ratings')
          .then(res => res.json())
          .then(data => {
            displayRatings(data);
          })
          .catch(err => {
            console.error(err);
            alert('Terjadi kesalahan saat mengambil data rating.');
          });
      }

      function displayRatings(ratings) {
        const ratingsList = document.getElementById('ratings-list');
        ratingsList.innerHTML = '';

        ratings.forEach(rating => {
          const ratingElement = document.createElement('div');
          ratingElement.classList.add('rating-item');
          ratingElement.innerHTML =
            `<div class="rating-stars">${'★'.repeat(rating.rating)}${'☆'.repeat(5 - rating.rating)}</div>
             <p>${rating.description}</p>`;
          ratingsList.appendChild(ratingElement);
        });
      }

      // Panggil saat halaman dimuat
      fetchRatings();
    });
  </script>
</section>
