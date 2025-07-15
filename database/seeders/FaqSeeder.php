<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faq::insert([
            // Indonesian FAQs
            [
                'language' => 'id',
                'question' => 'Apa itu Rich Wellness?',
                'answer' => 'Rich Wellness adalah destinasi wellness tourism di Yogyakarta yang menawarkan pengalaman kesehatan holistik seperti yoga, meditasi, spa, dan rekreasi.'
            ],
            [
                'language' => 'id',
                'question' => 'Apa pesan sambutan dari Rich Wellness?',
                'answer' => 'Selamat datang di Rich Wellness, pusat kesehatan dan kebugaran di Hotel The Rich Jogja. Jelajahi fasilitas modern dan program kesehatan kami untuk meningkatkan kualitas hidup Anda.'
            ],
            [
                'language' => 'id',
                'question' => 'Apa saja paket unggulan di Rich Wellness?',
                'answer' => 'Serenity Retreat, Renewal Journey, Harmony Experience, dan Ultimate Wellness.'
            ],
            [
                'language' => 'id',
                'question' => 'Apa saja jenis kamar yang tersedia?',
                'answer' => 'Single Room, Double Room, Twin Room, dan Family Room.'
            ],
            [
                'language' => 'id',
                'question' => 'Fasilitas apa saja yang tersedia?',
                'answer' => 'Swimming Pool, SPA, Fitness Center, Sauna, Breakfast, Parking Lot, Lunch, Wifi.'
            ],
            [
                'language' => 'id',
                'question' => 'Apa saja rekomendasi wisata di Yogyakarta?',
                'answer' => 'HeHa Sky View, Waduk Sermo, Pantai Parangtritis, Mangunan, Bukit Bintang, Merapi Park, Sungai Mudal, Candi Prambanan, Benteng Vredeburg, Jalan Malioboro.'
            ],
            // English FAQs
            [
                'language' => 'en',
                'question' => 'What is Rich Wellness?',
                'answer' => 'Rich Wellness is a wellness tourism destination in Yogyakarta offering holistic health experiences such as yoga, meditation, spa, and recreation.'
            ],
            [
                'language' => 'en',
                'question' => 'What is the welcome message from Rich Wellness?',
                'answer' => 'Welcome to Rich Wellness, the center for health and fitness at The Rich Jogja Hotel. Explore our modern facilities and health programs to improve your quality of life.'
            ],
            [
                'language' => 'en',
                'question' => 'What are the featured packages at Rich Wellness?',
                'answer' => 'Serenity Retreat, Renewal Journey, Harmony Experience, and Ultimate Wellness.'
            ],
            // Follow-up English FAQs
            [
                'language' => 'en',
                'question' => 'What room types are available?',
                'answer' => 'Single Room, Double Room, Twin Room, and Family Room.'
            ],
            [
                'language' => 'en',
                'question' => 'What facilities are available?',
                'answer' => 'Swimming Pool, SPA, Fitness Center, Sauna, Breakfast, Parking Lot, Lunch, Wifi.'
            ],
            [
                'language' => 'en',
                'question' => 'What are the recommended tourist attractions in Yogyakarta?',
                'answer' => 'HeHa Sky View, Waduk Sermo, Parangtritis Beach, Mangunan, Bukit Bintang, Merapi Park, Mudal River, Prambanan Temple, Vredeburg Fort, Malioboro Street.'
            ],
            // Follow-up Indonesian FAQs
            [
                'language' => 'id',
                'question' => 'Apa saja yang termasuk dalam paket Serenity Retreat?',
                'answer' => 'Paket Serenity Retreat mencakup akses pusat kebugaran, sesi yoga pagi, dan terapi spa.'
            ],
            [
                'language' => 'id',
                'question' => 'Apa perbedaan Renewal Journey dan Harmony Experience?',
                'answer' => 'Renewal Journey berdurasi 5 hari dengan yoga restoratif dan hidangan sehat, sedangkan Harmony Experience berdurasi seminggu dengan aktivitas rekreasi tambahan.'
            ],
            [
                'language' => 'id',
                'question' => 'Apakah Family Room cocok untuk anak-anak?',
                'answer' => 'Ya, Family Room memiliki tempat tidur besar dan kecil serta ruang yang lebih luas, cocok untuk keluarga dengan anak-anak.'
            ],
            [
                'language' => 'id',
                'question' => 'Apakah fasilitas SPA harus reservasi dulu?',
                'answer' => 'Disarankan melakukan reservasi terlebih dahulu untuk memastikan ketersediaan layanan SPA.'
            ],
            [
                'language' => 'id',
                'question' => 'Apakah ada makanan vegetarian di restoran?',
                'answer' => 'Ya, tersedia pilihan menu vegetarian dan sehat di restoran kami.'
            ],
            [
                'language' => 'id',
                'question' => 'Bagaimana cara menuju HeHa Sky View dari hotel?',
                'answer' => 'Anda dapat menggunakan transportasi online atau rental mobil, perjalanan sekitar 45 menit dari hotel.'
            ],
            // Follow-up English FAQs
            [
                'language' => 'en',
                'question' => 'What is included in the Serenity Retreat package?',
                'answer' => 'The Serenity Retreat package includes fitness center access, morning yoga sessions, and spa therapy.'
            ],
            [
                'language' => 'en',
                'question' => 'What is the difference between Renewal Journey and Harmony Experience?',
                'answer' => 'Renewal Journey is a 5-day package with restorative yoga and healthy meals, while Harmony Experience is a week-long package with additional recreational activities.'
            ],
            [
                'language' => 'en',
                'question' => 'Is the Family Room suitable for children?',
                'answer' => 'Yes, the Family Room has large and small beds and a larger space, suitable for families with children.'
            ],
            [
                'language' => 'en',
                'question' => 'Do I need to book the SPA in advance?',
                'answer' => 'It is recommended to make a reservation in advance to ensure SPA service availability.'
            ],
            [
                'language' => 'en',
                'question' => 'Are vegetarian meals available at the restaurant?',
                'answer' => 'Yes, our restaurant offers vegetarian and healthy menu options.'
            ],
            [
                'language' => 'en',
                'question' => 'How do I get to HeHa Sky View from the hotel?',
                'answer' => 'You can use online transportation or car rental; the trip takes about 45 minutes from the hotel.'
            ],
            // Tambahan dari index.blade.php
            [
                'language' => 'id',
                'question' => 'Apa itu wellness tourism di Rich Wellness?',
                'answer' => 'Wellness tourism adalah bentuk perjalanan yang bertujuan untuk meningkatkan kesejahteraan fisik, mental, dan emosional selama liburan. Di Rich Wellness, Anda dapat menikmati yoga, meditasi, terapi spa, dan aktivitas rekreasi yang mendukung kesehatan, dengan lokasi strategis di Yogyakarta.'
            ],
            [
                'language' => 'en',
                'question' => 'What is wellness tourism at Rich Wellness?',
                'answer' => 'Wellness tourism is a type of travel aimed at improving physical, mental, and emotional well-being during holidays. At Rich Wellness, you can enjoy yoga, meditation, spa therapy, and recreational activities that support health, in a strategic location in Yogyakarta.'
            ],
            [
                'language' => 'id',
                'question' => 'Apa saja detail dari paket Serenity Retreat?',
                'answer' => 'Rasakan kedamaian sejati dalam liburan singkat ini. Termasuk akses ke pusat kebugaran, sesi yoga pagi, dan terapi spa yang menenangkan untuk memulihkan energi Anda.'
            ],
            [
                'language' => 'en',
                'question' => 'What are the details of the Serenity Retreat package?',
                'answer' => 'Experience true peace in this short getaway. Includes access to the fitness center, morning yoga sessions, and relaxing spa therapy to restore your energy.'
            ],
            [
                'language' => 'id',
                'question' => 'Apa saja detail dari paket Renewal Journey?',
                'answer' => 'Mulailah perjalanan peremajaan dengan akses ke pusat kebugaran, yoga restoratif, terapi pijat, dan hidangan sehat selama lima hari.'
            ],
            [
                'language' => 'en',
                'question' => 'What are the details of the Renewal Journey package?',
                'answer' => 'Start your rejuvenation journey with access to the fitness center, restorative yoga, refreshing massage therapy, and healthy meals for five days.'
            ],
            [
                'language' => 'id',
                'question' => 'Apa saja detail dari paket Harmony Experience?',
                'answer' => 'Dapatkan akses penuh ke fasilitas kebugaran, yoga pagi, terapi spa, dan aktivitas rekreasi selama seminggu.'
            ],
            [
                'language' => 'en',
                'question' => 'What are the details of the Harmony Experience package?',
                'answer' => 'Get full access to fitness facilities, morning yoga, spa therapy, and recreational activities for a week.'
            ],
            [
                'language' => 'id',
                'question' => 'Apa saja detail dari paket Ultimate Wellness?',
                'answer' => 'Termasuk akses eksklusif ke pusat kebugaran, berbagai sesi yoga dan meditasi, terapi spa, serta paket makanan sehat selama sepuluh hari.'
            ],
            [
                'language' => 'en',
                'question' => 'What are the details of the Ultimate Wellness package?',
                'answer' => 'Includes exclusive access to the fitness center, various yoga and meditation sessions, spa therapy, and healthy meal packages for ten days.'
            ],
            [
                'language' => 'id',
                'question' => 'Apa saja rekomendasi layanan kesehatan di Yogyakarta?',
                'answer' => 'Poliklinik Mata RSUP Dr. Sardjito, Klinik Kulit RS. Panti Rapih, Klinik Ginjal RS. PKU Jogja, Klinik Jantung RSUP Dr. Sardjito.'
            ],
            [
                'language' => 'en',
                'question' => 'What are the recommended health services in Yogyakarta?',
                'answer' => 'Eye Clinic at RSUP Dr. Sardjito, Skin Clinic at RS. Panti Rapih, Kidney Clinic at RS. PKU Jogja, Heart Clinic at RSUP Dr. Sardjito.'
            ],
            [
                'language' => 'id',
                'question' => 'Bagaimana cara menghubungi Rich Wellness?',
                'answer' => 'Email: hotline@richwellness.com, Telepon: (0274) 5305888, Lokasi: The Rich Jogja Hotel, Yogyakarta.'
            ],
            [
                'language' => 'en',
                'question' => 'How to contact Rich Wellness?',
                'answer' => 'Email: hotline@richwellness.com, Phone: (0274) 5305888, Location: The Rich Jogja Hotel, Yogyakarta.'
            ]
        ]);
    }
}
