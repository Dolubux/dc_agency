<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DC Agency - Agence de Communication</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #FF3C00;
            --dark-color: #000000;
            --light-color: #FFFFFF;
            --gray-color: #f8f9fa;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--dark-color);
            overflow-x: hidden;
        }
        
        /* Loader */
        #loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: var(--light-color);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease-out;
        }
        
        .loader-logo {
            font-size: 3rem;
            font-weight: bold;
            color: var(--primary-color);
            animation: pulse 1.5s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        /* Navbar */
        .navbar {
            background-color: var(--dark-color);
            padding: 1rem 0;
            transition: all 0.3s ease;
        }
        
        .navbar-brand {
            color: var(--light-color);
            font-weight: bold;
            font-size: 1.8rem;
        }
        
        .navbar-brand span {
            color: var(--primary-color);
        }
        
        .navbar-nav .nav-link {
            color: var(--light-color);
            font-weight: 500;
            margin: 0 0.5rem;
            transition: color 0.3s ease;
        }
        
        .navbar-nav .nav-link:hover {
            color: var(--primary-color);
        }
        
        /* Hero Section */
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1497366754035-f200968a6e72?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2069&q=80');
            background-size: cover;
            background-position: center;
            color: var(--light-color);
            padding: 150px 0;
            text-align: center;
        }
        
        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }
        
        .hero-section p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }
        
        /* Buttons */
        .btn-primary-custom {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: var(--light-color);
            padding: 0.75rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary-custom:hover {
            background-color: #e03500;
            border-color: #e03500;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(255, 60, 0, 0.2);
        }
        
        .btn-outline-custom {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            padding: 0.75rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-outline-custom:hover {
            background-color: var(--primary-color);
            color: var(--light-color);
            transform: translateY(-3px);
        }
        
        /* Sections */
        .section-title {
            position: relative;
            margin-bottom: 3rem;
            text-align: center;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            width: 80px;
            height: 4px;
            background-color: var(--primary-color);
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
        }
        
        /* Cards */
        .card-custom {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            height: 100%;
        }
        
        .card-custom:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }
        
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        
        .card-body-custom {
            padding: 1.5rem;
        }
        
        /* Testimonials */
        .testimonial-card {
            background-color: var(--gray-color);
            border-radius: 10px;
            padding: 2rem;
            margin: 1rem;
            position: relative;
        }
        
        .testimonial-card:before {
            content: """;
            font-size: 5rem;
            color: var(--primary-color);
            position: absolute;
            top: -10px;
            left: 10px;
            opacity: 0.2;
            font-family: Georgia, serif;
        }
        
        /* Gallery */
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            margin-bottom: 1.5rem;
        }
        
        .gallery-item img, .gallery-item video {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .gallery-item:hover img, .gallery-item:hover video {
            transform: scale(1.1);
        }
        
        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 60, 0, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }
        
        /* Team */
        .team-member {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .team-member img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 1rem;
            border: 5px solid var(--primary-color);
        }
        
        /* Forms */
        .form-control-custom {
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 0.75rem 1rem;
            margin-bottom: 1.5rem;
        }
        
        .form-control-custom:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(255, 60, 0, 0.25);
        }
        
        /* Footer */
        footer {
            background-color: var(--dark-color);
            color: var(--light-color);
            padding: 4rem 0 2rem;
        }
        
        .footer-logo {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        
        .footer-logo span {
            color: var(--primary-color);
        }
        
        .social-icons a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            margin-right: 10px;
            color: var(--light-color);
            transition: all 0.3s ease;
        }
        
        .social-icons a:hover {
            background-color: var(--primary-color);
            transform: translateY(-5px);
        }
        
        .footer-links h5 {
            color: var(--light-color);
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .footer-links h5:after {
            content: '';
            position: absolute;
            width: 40px;
            height: 3px;
            background-color: var(--primary-color);
            bottom: -8px;
            left: 0;
        }
        
        .footer-links ul {
            list-style: none;
            padding: 0;
        }
        
        .footer-links ul li {
            margin-bottom: 0.8rem;
        }
        
        .footer-links ul li a {
            color: #aaa;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-links ul li a:hover {
            color: var(--primary-color);
        }
        
        .copyright {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 1.5rem;
            margin-top: 2rem;
            text-align: center;
            color: #aaa;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2.5rem;
            }
            
            .hero-section {
                padding: 100px 0;
            }
        }
    </style>
</head>
<body>
    <!-- Loader -->
    <div id="loader">
        <div class="loader-logo">DC <span>AGENCY</span></div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">DC <span>AGENCY</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#accueil">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Qui sommes-nous</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Nos services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#evenements">Nos événements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#galerie">Galerie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#equipes">Nos équipes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#hotesses">Nos hôtesses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary-custom ms-2" href="#devis">Demander un devis</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="accueil" class="hero-section">
        <div class="container">
            <div data-aos="fade-up">
                <h1>DC Agency</h1>
                <p class="lead">Votre partenaire en communication événementielle et marketing</p>
                <a href="#about" class="btn btn-primary-custom me-2">Découvrir</a>
                <a href="#contact" class="btn btn-outline-custom">Nous contacter</a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h2 class="section-title">Qui sommes-nous</h2>
                    <p>DC Agency est une agence de communication événementielle créative et innovante, spécialisée dans la conception et la réalisation d'événements sur mesure.</p>
                    <p>Fondée en 2010, notre agence s'est imposée comme un acteur majeur dans le domaine de l'événementiel grâce à notre approche unique et notre engagement envers l'excellence.</p>
                    <p>Notre équipe de professionnels passionnés travaille main dans la main avec vous pour créer des expériences mémorables qui renforcent votre image de marque et engagent votre public.</p>
                    <a href="#services" class="btn btn-primary-custom mt-3">Nos services</a>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Équipe DC Agency" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Nos services</h2>
            <p class="text-center mb-5" data-aos="fade-up">Nous proposons une gamme complète de services pour répondre à tous vos besoins en communication et événementiel.</p>
            
            <div class="row">
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card card-custom">
                        <img src="https://images.unsplash.com/photo-1531403009284-440f080d1e12?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" class="card-img-top" alt="Organisation d'événements">
                        <div class="card-body-custom">
                            <h5 class="card-title">Organisation d'événements</h5>
                            <p class="card-text">De la conception à la réalisation, nous gérons tous les aspects de vos événements professionnels.</p>
                            <a href="#devis" class="btn btn-primary-custom">Demander un devis</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card card-custom">
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2015&q=80" class="card-img-top" alt="Stratégie marketing">
                        <div class="card-body-custom">
                            <h5 class="card-title">Stratégie marketing</h5>
                            <p class="card-text">Développons ensemble une stratégie sur mesure pour accroître votre visibilité et votre impact.</p>
                            <a href="#devis" class="btn btn-primary-custom">Demander un devis</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card card-custom">
                        <img src="https://images.unsplash.com/photo-1551836026-d5c88ac5c4c0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" class="card-img-top" alt="Communication digitale">
                        <div class="card-body-custom">
                            <h5 class="card-title">Communication digitale</h5>
                            <p class="card-text">Boostez votre présence en ligne avec nos solutions de communication digitale innovantes.</p>
                            <a href="#devis" class="btn btn-primary-custom">Demander un devis</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Témoignages clients</h2>
            <p class="text-center mb-5" data-aos="fade-up">Découvrez ce que nos clients disent de notre collaboration.</p>
            
            <div class="row">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="testimonial-card">
                        <p>"DC Agency a transformé notre événement annuel en une expérience mémorable. Leur professionnalisme et leur créativité ont dépassé nos attentes."</p>
                        <div class="d-flex align-items-center mt-3">
                            <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Client" class="rounded-circle me-3" width="50">
                            <div>
                                <h6 class="mb-0">Sophie Martin</h6>
                                <small class="text-muted">Directrice Marketing, TechCorp</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="testimonial-card">
                        <p>"Leur équipe a su comprendre parfaitement nos besoins et a livré un projet exceptionnel dans les délais impartis. Je recommande vivement DC Agency."</p>
                        <div class="d-flex align-items-center mt-3">
                            <img src="https://randomuser.me/api/portraits/men/54.jpg" alt="Client" class="rounded-circle me-3" width="50">
                            <div>
                                <h6 class="mb-0">Thomas Leroy</h6>
                                <small class="text-muted">CEO, Innovate Solutions</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="testimonial-card">
                        <p>"Leur approche créative et leur attention aux détails ont fait de notre lancement de produit un véritable succès. Un partenariat fructueux !"</p>
                        <div class="d-flex align-items-center mt-3">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Client" class="rounded-circle me-3" width="50">
                            <div>
                                <h6 class="mb-0">Camille Dubois</h6>
                                <small class="text-muted">Responsable Communication, BeautyLab</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Events Section -->
    <section id="evenements" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Nos événements</h2>
            <p class="text-center mb-5" data-aos="fade-up">Découvrez nos réalisations et les événements à venir.</p>
            
            <div class="row">
                <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card card-custom">
                        <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2069&q=80" class="card-img-top" alt="Salon professionnel">
                        <div class="card-body-custom">
                            <span class="badge bg-primary mb-2">Événement passé</span>
                            <h5 class="card-title">Salon des Innovations Technologiques 2023</h5>
                            <p class="card-text">Organisation complète du plus grand salon tech de l'année avec plus de 200 exposants et 15 000 visiteurs.</p>
                            <a href="#" class="btn btn-outline-custom">Voir les détails</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card card-custom">
                        <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" class="card-img-top" alt="Conférence">
                        <div class="card-body-custom">
                            <span class="badge bg-success mb-2">À venir</span>
                            <h5 class="card-title">Conférence Leadership & Innovation</h5>
                            <p class="card-text">Événement exclusif réunissant les leaders d'opinion du secteur pour discuter des tendances futures.</p>
                            <a href="#" class="btn btn-outline-custom">Voir les détails</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-4" data-aos="fade-up">
                <a href="#" class="btn btn-primary-custom">Voir tous nos événements</a>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="galerie" class="py-5">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Galerie</h2>
            <p class="text-center mb-5" data-aos="fade-up">Un aperçu visuel de nos réalisations et événements.</p>
            
            <div class="row">
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Événement corporatif">
                        <div class="gallery-overlay">
                            <i class="fas fa-search-plus text-white fa-2x"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1531058020387-3be344556be6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Lancement produit">
                        <div class="gallery-overlay">
                            <i class="fas fa-search-plus text-white fa-2x"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="gallery-item">
                        <video controls>
                            <source src="#" type="video/mp4">
                            Votre navigateur ne supporte pas la lecture de vidéos.
                        </video>
                        <div class="gallery-overlay">
                            <i class="fas fa-play text-white fa-2x"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1556760544-74068565f05c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Team building">
                        <div class="gallery-overlay">
                            <i class="fas fa-search-plus text-white fa-2x"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1551135049-8a33b4273818?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Séminaire">
                        <div class="gallery-overlay">
                            <i class="fas fa-search-plus text-white fa-2x"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="gallery-item">
                        <video controls>
                            <source src="#" type="video/mp4">
                            Votre navigateur ne supporte pas la lecture de vidéos.
                        </video>
                        <div class="gallery-overlay">
                            <i class="fas fa-play text-white fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Teams Section -->
    <section id="equipes" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Nos équipes</h2>
            <p class="text-center mb-5" data-aos="fade-up">Rencontrez les experts qui font de DC Agency une référence dans le domaine.</p>
            
            <div class="row">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="David Chen">
                        <h5>David Chen</h5>
                        <p class="text-muted">Directeur Général</p>
                        <p>Fondateur de DC Agency, David apporte plus de 15 ans d'expérience dans l'événementiel.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="team-member">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Claire Dubois">
                        <h5>Claire Dubois</h5>
                        <p class="text-muted">Directrice Créative</p>
                        <p>Claire supervise tous les aspects créatifs de nos projets avec une vision innovante.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="team-member">
                        <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="Marc Lefebvre">
                        <h5>Marc Lefebvre</h5>
                        <p class="text-muted">Directeur des Opérations</p>
                        <p>Marc assure la coordination et la logistique parfaites de tous nos événements.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Hostesses Section -->
    <section id="hotesses" class="py-5">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Nos hôtesses</h2>
            <p class="text-center mb-5" data-aos="fade-up">Notre équipe d'hôtesses professionnelles formées pour représenter vos marques avec excellence.</p>
            
            <div class="row">
                <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member">
                        <img src="https://randomuser.me/api/portraits/women/63.jpg" alt="Sophie Martin">
                        <h5>Sophie Martin</h5>
                        <p class="text-muted">Hôtesse événementielle</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="team-member">
                        <img src="https://randomuser.me/api/portraits/women/25.jpg" alt="Laura Petit">
                        <h5>Laura Petit</h5>
                        <p class="text-muted">Hôtesse d'accueil</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="team-member">
                        <img src="https://randomuser.me/api/portraits/women/50.jpg" alt="Emma Laurent">
                        <h5>Emma Laurent</h5>
                        <p class="text-muted">Hôtesse promotionnelle</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="team-member">
                        <img src="https://randomuser.me/api/portraits/women/72.jpg" alt="Chloé Moreau">
                        <h5>Chloé Moreau</h5>
                        <p class="text-muted">Hôtesse VIP</p>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-4" data-aos="fade-up">
                <a href="#devenir-hotesse" class="btn btn-primary-custom">Devenir hôtesse</a>
            </div>
        </div>
    </section>

    <!-- Quote Section -->
    <section id="devis" class="py-5 bg-dark text-light">
        <div class="container">
            <h2 class="section-title text-light" data-aos="fade-up">Demander un devis</h2>
            <p class="text-center mb-5" data-aos="fade-up">Remplissez le formulaire ci-dessous et nous vous recontacterons dans les plus brefs délais.</p>
            
            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="fade-up">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control form-control-custom" placeholder="Votre nom" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control form-control-custom" placeholder="Votre email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="tel" class="form-control form-control-custom" placeholder="Votre téléphone" required>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control form-control-custom" required>
                                    <option value="" disabled selected>Service souhaité</option>
                                    <option>Organisation d'événements</option>
                                    <option>Stratégie marketing</option>
                                    <option>Communication digitale</option>
                                    <option>Autre</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <textarea class="form-control form-control-custom" rows="5" placeholder="Votre message" required></textarea>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary-custom">Envoyer la demande</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Become Hostess Section -->
    <section id="devenir-hotesse" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Devenir hôtesse</h2>
            <p class="text-center mb-5" data-aos="fade-up">Rejoignez notre équipe d'hôtesses professionnelles et participez à des événements prestigieux.</p>
            
            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="fade-up">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control form-control-custom" placeholder="Prénom" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control form-control-custom" placeholder="Nom" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="email" class="form-control form-control-custom" placeholder="Email" required>
                            </div>
                            <div class="col-md-6">
                                <input type="tel" class="form-control form-control-custom" placeholder="Téléphone" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control form-control-custom" placeholder="Ville" required>
                            </div>
                            <div class="col-md-6">
                                <input type="number" class="form-control form-control-custom" placeholder="Âge" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cv" class="form-label">CV (PDF, max 2MB)</label>
                                    <input type="file" class="form-control form-control-custom" id="cv" accept=".pdf" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="photo" class="form-label">Photo (JPG, max 2MB)</label>
                                    <input type="file" class="form-control form-control-custom" id="photo" accept=".jpg,.jpeg" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <textarea class="form-control form-control-custom" rows="4" placeholder="Pourquoi souhaitez-vous rejoindre DC Agency ?" required></textarea>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary-custom">Postuler maintenant</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Nous contacter</h2>
            <p class="text-center mb-5" data-aos="fade-up">N'hésitez pas à nous contacter pour toute question ou information.</p>
            
            <div class="row">
                <div class="col-md-8" data-aos="fade-right">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control form-control-custom" placeholder="Votre nom" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control form-control-custom" placeholder="Votre email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <input type="text" class="form-control form-control-custom" placeholder="Sujet" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <textarea class="form-control form-control-custom" rows="5" placeholder="Votre message" required></textarea>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary-custom">Envoyer le message</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4" data-aos="fade-left">
                    <div class="mb-4">
                        <h5>Adresse</h5>
                        <p>123 Avenue des Champs-Élysées<br>75008 Paris, France</p>
                    </div>
                    <div class="mb-4">
                        <h5>Téléphone</h5>
                        <p>+33 1 23 45 67 89</p>
                    </div>
                    <div class="mb-4">
                        <h5>Email</h5>
                        <p>contact@dcagency.com</p>
                    </div>
                    <div class="mb-4">
                        <h5>Horaires</h5>
                        <p>Lun - Ven: 9h00 - 18h00<br>Sam: 10h00 - 16h00</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="footer-logo">DC <span>AGENCY</span></div>
                    <p>Votre partenaire en communication événementielle et marketing depuis 2010.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <div class="footer-links">
                        <h5>Liens rapides</h5>
                        <ul>
                            <li><a href="#accueil">Accueil</a></li>
                            <li><a href="#about">Qui sommes-nous</a></li>
                            <li><a href="#services">Nos services</a></li>
                            <li><a href="#evenements">Événements</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <div class="footer-links">
                        <h5>Services</h5>
                        <ul>
                            <li><a href="#services">Organisation d'événements</a></li>
                            <li><a href="#services">Stratégie marketing</a></li>
                            <li><a href="#services">Communication digitale</a></li>
                            <li><a href="#hotesses">Hôtesses</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="footer-links">
                        <h5>Newsletter</h5>
                        <p>Abonnez-vous à notre newsletter pour recevoir nos actualités.</p>
                        <form>
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Votre email" required>
                                <button class="btn btn-primary-custom" type="submit">S'abonner</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2023 DC Agency. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Custom JS -->
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // Loader
        window.addEventListener('load', function() {
            const loader = document.getElementById('loader');
            setTimeout(function() {
                loader.style.opacity = '0';
                setTimeout(function() {
                    loader.style.display = 'none';
                }, 500);
            }, 1000);
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('navbar-scrolled');
                navbar.style.padding = '0.5rem 0';
                navbar.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.1)';
            } else {
                navbar.classList.remove('navbar-scrolled');
                navbar.style.padding = '1rem 0';
                navbar.style.boxShadow = 'none';
            }
        });
    </script>
</body>
</html>