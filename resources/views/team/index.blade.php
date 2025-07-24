<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Rich Wellness</title>
    <link href="assets/homepage/img/favicon.png" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Raleway:300,400,500,600,700|Poppins:300,400,500,600,700" rel="stylesheet" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .section-title {
            text-align: center;
            margin-bottom: 60px;
            position: relative;
        }
        .section-title h2 {
            font-size: 2.8rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }
        .section-title h2::after {
            content: '';
            position: absolute;
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #99a3e3, #74e9d5);
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }
        .section-title p {
            font-size: 1.1rem;
            color: #6c757d;
            max-width: 800px;
            margin: 0 auto;
        }
        .about-content {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            margin-bottom: 80px;
        }
        .about-content .image-col {
            flex: 1;
            min-width: 300px;
            padding: 20px;
            text-align: center;
        }
        .about-content .image-col img {
            max-width: 100%;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .about-content .text-col {
            flex: 2;
            min-width: 300px;
            padding: 20px;
        }
        .about-content .text-col h3 {
            font-size: 2rem;
            color: #2c3e50;
            margin-bottom: 20px;
        }
        .about-content .text-col p {
            margin-bottom: 15px;
            color: #555;
        }
        .team-section {
            background-color: #FEFDED;
            padding: 80px 0;
        }
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            justify-content: center;
        }
        .team-member-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            padding: 30px;
            text-align: center;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .team-member-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.12);
        }
        .team-member-card img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
            border: 4px solid #99a3e3;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .team-member-card h4 {
            font-size: 1.4rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 5px;
        }
        .team-member-card p {
            font-size: 0.95rem;
            color: #74e9d5;
            font-weight: 500;
            margin-bottom: 15px;
        }
        .team-member-card .description {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 20px;
            flex-grow: 1;
        }
        .social-links a {
            color: #99a3e3;
            margin: 0 8px;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }
        .social-links a:hover {
            color: #74e9d5;
        }

        .features-section {
            margin: 80px 0;
        }
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        .feature-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.12);
        }
        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #99a3e3, #74e9d5);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }
        .feature-icon i {
            font-size: 2rem;
            color: white;
        }
        .feature-card h4 {
            font-size: 1.3rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 15px;
        }
        .feature-card p {
            color: #6c757d;
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            .about-content {
                flex-direction: column;
            }
            .about-content .text-col, .about-content .image-col {
                padding: 10px;
            }
            .section-title h2 {
                font-size: 2rem;
            }
            .section-title p {
                font-size: 1rem;
            }
            .team-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <section class="about-section">
            <div class="section-title">
                <h2>About Rich Wellness</h2>
                <p>Rich Wellness adalah destinasi terkemuka untuk kesehatan dan kesejahteraan holistik. Kami berkomitmen untuk menyediakan pengalaman yang transformatif bagi setiap individu yang mencari keseimbangan dan revitalisasi dalam hidup mereka.</p>
            </div>
            <div class="about-content">
                <div class="image-col">
                    <img src="assets/homepage/img/hero-img1.png" alt="About Us Image">
                </div>
                <div class="text-col">
                    <h3>Transform Your Health Journey</h3>
                    <p>Rich Wellness hadir sebagai solusi komprehensif untuk kesehatan dan kesejahteraan Anda. Dengan fasilitas kelas dunia dan program-program inovatif, kami menawarkan pengalaman yang tak terlupakan dalam perjalanan menuju hidup yang lebih sehat dan bahagia.</p>
                    
                    <h3>Our Mission</h3>
                    <p>Misi kami adalah memberdayakan individu untuk mencapai potensi kesehatan dan kesejahteraan tertinggi mereka melalui program-program inovatif, fasilitas kelas dunia, dan tim ahli yang berdedikasi. Kami percaya bahwa setiap perjalanan menuju kesehatan adalah unik, dan kami hadir untuk mendukung Anda di setiap langkah.</p>
                    
                    <h3>Our Vision</h3>
                    <p>Visi kami adalah menjadi pemimpin global dalam industri kesehatan dan kebugaran, dikenal karena pendekatan holistik kami yang mengintegrasikan kesehatan fisik, mental, dan spiritual. Kami bercita-cita untuk menciptakan komunitas yang terinspirasi untuk hidup lebih sehat dan bahagia.</p>
                </div>
            </div>

            <!-- Features Section -->
            <div class="features-section">
                <div class="section-title">
                    <h2>What We Offer</h2>
                    <p>Discover our comprehensive range of wellness services and facilities designed to enhance your health journey.</p>
                </div>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-spa"></i>
                        </div>
                        <h4>Serenity Retreat</h4>
                        <p>Rasakan kedamaian sejati dengan sesi yoga dan terapi spa menenangkan yang dirancang untuk meremajakan tubuh dan pikiran Anda.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h4>Renewal Journey</h4>
                        <p>Perjalanan peremajaan tubuh lewat yoga, terapi pijat, dan makanan sehat yang akan membuat Anda merasa seperti terlahir kembali.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-balance-scale"></i>
                        </div>
                        <h4>Harmony Experience</h4>
                        <p>Temukan keseimbangan hidup lewat aktivitas kesehatan dan spa relaksasi yang menyelaraskan tubuh, pikiran, dan jiwa.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-crown"></i>
                        </div>
                        <h4>Ultimate Wellness</h4>
                        <p>Kesejahteraan maksimal lewat program lengkap 10 hari di Rich Wellness dengan layanan premium dan fasilitas eksklusif.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="team-section">
            <div class="section-title">
                <h2>Our Expert Team</h2>
                <p>Meet the talented professionals who contributed to building this innovative healthcare platform.</p>
            </div>
            <div class="team-grid">
                <!-- Sarah Jasmine - Project Manager -->
                <div class="team-member-card">
                    <img src="sarah_jasmine.png" alt="Sarah Jasmine">
                    <h4>Sarah Jasmine</h4>
                    <p>Project Manager</p>
                    <div class="description">
                        Leads project planning and execution, coordinates team activities, manages timelines and resources, and ensures successful delivery of the healthcare platform within scope and budget.
                    </div>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>

                <!-- Zahra Aulia - System Analyst -->
                <div class="team-member-card">
                    <img src="zahra_aulia.png" alt="Zahra Aulia">
                    <h4>Zahra Aulia</h4>
                    <p>System Analyst</p>
                    <div class="description">
                        Analyzes business requirements, designs system architecture, creates technical specifications, and bridges the gap between business needs and technical implementation.
                    </div>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>

                <!-- Launia Izzati - System Analyst -->
                <div class="team-member-card">
                    <img src="launia_izzati.png" alt="Launia Izzati">
                    <h4>Launia Izzati</h4>
                    <p>System Analyst</p>
                    <div class="description">
                        Conducts thorough testing of applications, identifies bugs and issues, ensures software quality standards, and validates that all features work correctly before deployment.
                    </div>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>

                <!-- Muhammad Rafa - Front-end Developer -->
                <div class="team-member-card">
                    <img src="muhammad_rafa.png" alt="Muhammad Rafa">
                    <h4>Muhammad Rafa</h4>
                    <p>Front-end Developer</p>
                    <div class="description">
                        Develops user-facing features, creates responsive and interactive interfaces, implements design mockups, and ensures optimal user experience across different devices and browsers.
                    </div>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>

                <!-- Syaiful Kusing - Back-end Developer -->
                <div class="team-member-card">
                    <img src="syaiful_kusing.png" alt="Syaiful Kusing">
                    <h4>Syaiful Kusing</h4>
                    <p>Back-end Developer</p>
                    <div class="description">
                        Builds server-side logic, manages databases, develops APIs, handles data processing, and ensures secure and efficient backend operations for the healthcare platform.
                    </div>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>

                <!-- Muhammad Syamsudhuha A - Fullstack Developer -->
                <div class="team-member-card">
                    <img src="muhammad_syamsudhuha_a.png" alt="Muhammad Syamsudhuha A">
                    <h4>Muhammad Syamsudhuha A</h4>
                    <p>Fullstack Developer</p>
                    <div class="description">
                        Works on both frontend and backend development, integrates different system components, ensures seamless communication between client and server, and provides versatile technical solutions.
                    </div>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>

                <!-- Annisa Ashadia - Quality Assurance -->
                <div class="team-member-card">
                    <img src="annisa_ashadia.png" alt="Annisa Ashadia">
                    <h4>Annisa Ashadia</h4>
                    <p>Quality Assurance</p>
                    <div class="description">
                        Conducts thorough testing of applications, identifies bugs and issues, ensures software quality standards, and validates that all features work correctly before deployment.
                    </div>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>

