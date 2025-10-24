<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta
        description="DC Agency - Agence événementielle spécialisée dans la fourniture d'hôtesses et d'équipes professionnelles pour vos événements.">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('favicon/site.webmanifest')}}">
    <title>DC Agency - @yield('title', 'Agence evenementielle-accueil')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Styles critiques pour le loader (inline pour éviter le délai) -->
    <style>
        /* Loader critique - inline pour affichage immédiat */
        #loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.8s ease-out;
        }

        .loader-content {
            text-align: center;
            color: #FFFFFF;
            animation: fadeInLoader 0.5s ease-in;
        }

        .loader-logo {
            font-size: 4rem;
            font-weight: 700;
            color: #FFFFFF;
            margin-bottom: 1rem;
            font-family: 'Playfair Display', serif;
            animation: logoScale 1.5s ease-in-out infinite alternate;
        }

        .loader-logo span {
            color: #FF3C00;
        }

        .loader-tagline {
            font-size: 1.2rem;
            font-weight: 300;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 2rem;
            animation: fadeInUp 0.8s ease-out 0.3s both;
        }

        .loader-spinner {
            width: 60px;
            height: 60px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top: 3px solid #FF3C00;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }

        /* Animations pour le loader */
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes fadeInLoader {
            from {
                opacity: 0;
                transform: scale(0.8);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes logoScale {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.05);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Masquer le contenu principal pendant le chargement */
        body.loading {
            overflow: hidden;
        }

        .main-content {
            opacity: 0;
            transition: opacity 0.6s ease-in;
        }

        .main-content.loaded {
            opacity: 1;
        }

        /* Cache le loader quand fini */
        #loader.hide {
            opacity: 0;
            pointer-events: none;
        }
    </style>

    <!-- Reste des styles -->
    <style>
        :root {
            --primary-color: #FF3C00;
            --secondary-color: #FF6B35;
            --dark-color: #1a1a1a;
            --light-color: #FFFFFF;
            --gray-color: #f8f9fa;
            --gold-color: #FFD700;
            --gradient-primary: linear-gradient(135deg, #FF3C00 0%, #FF6B35 100%);
            --gradient-dark: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--dark-color);
            overflow-x: hidden;
            line-height: 1.6;
        }

        .heading-font {

            font-family: 'Playfair Display', serif;
        }

        /* Navbar premium */
        .navbar {
            background: rgba(26, 26, 26, 0.95);
            backdrop-filter: blur(15px);
            padding: 1.2rem 0;
            transition: all 0.4s ease;
            border-bottom: 1px solid rgba(255, 60, 0, 0.1);
        }

        .navbar-brand {
            color: var(--light-color);
            font-weight: 700;
            font-size: 2rem;
            font-family: 'Playfair Display', serif;
            text-decoration: none;
        }

        .navbar-brand span {
            color: var(--primary-color);
        }

        .navbar-nav .nav-link {
            color: var(--light-color);
            font-weight: 500;
            margin: 0 0.8rem;
            transition: all 0.3s ease;
            position: relative;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
        }

        .navbar-nav .nav-link::before {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 50%;
            background: var(--primary-color);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary-color);
        }

        .navbar-nav .nav-link:hover::before {
            width: 100%;
        }

        /* Hero Section Premium */
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.4)), url('front/images/bannieres/1.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: var(--light-color);
            padding: 200px 0 150px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-section h1 {
            font-size: 4.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-family: 'Playfair Display', serif;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .hero-tagline {
            font-size: 1.4rem;
            margin-bottom: 1rem;
            font-weight: 300;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .hero-description {
            font-size: 1.2rem;
            margin-bottom: 3rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.8;
        }

        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 3rem;
            margin-top: 4rem;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            display: block;
            font-family: 'Playfair Display', serif;
        }

        .stat-label {
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 300;
        }

        /* Buttons Premium */
        .btn-premium {
            background: var(--gradient-primary);
            border: none;
            color: var(--light-color);
            padding: 1rem 2.5rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 50px;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-premium::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-premium:hover::before {
            left: 100%;
        }

        .btn-premium:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(255, 60, 0, 0.3);
        }

        .btn-outline-premium {
            border: 2px solid var(--light-color);
            color: var(--light-color);
            padding: 1rem 2.5rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 50px;
            background: transparent;
            transition: all 0.4s ease;
        }

        .btn-outline-premium:hover {
            background: var(--light-color);
            color: var(--dark-color);
            transform: translateY(-3px);
        }

        /* Services Premium */
        .services-section {
            padding: 120px 0;
            background: var(--gray-color);
        }

        .section-header {
            text-align: center;
            margin-bottom: 80px;
        }

        .section-subtitle {
            color: var(--primary-color);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .section-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-family: 'Playfair Display', serif;
            color: var(--dark-color);
        }

        .section-description {
            font-size: 16px;
            color: #666;
            /* max-width: 600px; */
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Service Cards Premium */
        .service-card {
            background: var(--light-color);
            border-radius: 20px;
            padding: 3rem 2rem;
            text-align: center;
            border: none;
            transition: all 0.4s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--gradient-primary);
        }

        .service-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        .service-icon {
            width: 80px;
            height: 80px;
            background: var(--gradient-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            font-size: 2rem;
            color: var(--light-color);
            transition: all 0.4s ease;
        }

        .service-card:hover .service-icon {
            transform: scale(1.1);
        }

        .service-card h4 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--dark-color);
            font-family: 'Playfair Display', serif;
        }

        .service-card p {
            color: #666;
            line-height: 1.7;
            margin-bottom: 2rem;
        }

        /* Portfolio Grid */
        .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .portfolio-item {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
        }

        .portfolio-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .portfolio-item img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .portfolio-item:hover img {
            transform: scale(1.05);
        }

        .portfolio-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient-primary);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: all 0.4s ease;
            color: var(--light-color);
            text-align: center;
            padding: 2rem;
        }

        .portfolio-item:hover .portfolio-overlay {
            opacity: 0.95;
        }

        .portfolio-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            font-family: 'Playfair Display', serif;
        }

        .portfolio-category {
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 300;
        }

        /* Team Premium */
        .team-member-card {
            background: var(--light-color);
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
            height: 100%;
        }

        .team-member-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .team-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 1.5rem;
            border: 4px solid var(--primary-color);
            transition: all 0.4s ease;
        }

        .team-member-card:hover .team-avatar {
            border-color: var(--gold-color);
        }

        .team-name {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--dark-color);
            font-family: 'Playfair Display', serif;
        }

        .team-role {
            color: var(--primary-color);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        /* Contact Premium */
        .contact-section {
            background: var(--gradient-dark);
            color: var(--light-color);
            padding: 120px 0;
        }

        .contact-form {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 3rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .form-control-premium {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            padding: 1rem 1.5rem;
            color: var(--light-color);
            font-size: 1rem;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
        }

        .form-control-premium::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .form-control-premium:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(255, 60, 0, 0.25);
            color: #FF3C00;
        }

        /* Footer Premium */
        .footer-premium {
            background: var(--dark-color);
            color: var(--light-color);
            padding: 80px 0 40px;
        }

        .footer-logo-section {
            margin-bottom: 3rem;
        }

        .footer-logo {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            font-family: 'Playfair Display', serif;
        }

        .footer-logo span {
            color: var(--primary-color);
        }

        .footer-description {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #ccc;
            margin-bottom: 2rem;
        }

        .social-icons-premium {
            display: flex;
            gap: 1rem;
        }

        .social-icon {
            width: 50px;
            height: 50px;
            background: var(--gradient-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--light-color);
            font-size: 1.2rem;
            transition: all 0.4s ease;
            text-decoration: none;
        }

        .social-icon:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 10px 20px rgba(255, 60, 0, 0.3);
        }

        .footer-section h5 {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--light-color);
            font-family: 'Playfair Display', serif;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 0.8rem;
        }

        .footer-links a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--primary-color);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 2rem;
            margin-top: 3rem;
            text-align: center;
            color: #888;
        }

        /* Responsive */
        @media (max-width: 768px) {

            /* Éviter les débordements horizontaux */
            html,
            body {
                overflow-x: hidden !important;
                width: 100% !important;
                position: relative;
            }

            .hero-section h1 {
                font-size: 3rem;
            }

            .hero-section {
                padding: 150px 0 100px;
            }

            .hero-stats {
                flex-direction: column;
                gap: 2rem;
            }

            .section-title {
                font-size: 2.2rem;
            }

            .service-card {
                margin-bottom: 2rem;
            }
        }

        /* Animations supplémentaires */
        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .fade-in-up {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .fade-in-up.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .nav-link.active {
            color: #FF3C00 !important;
            font-weight: 600;
            position: relative;
            transition: color 0.3s ease;
        }

        .nav-link.active::after {
            content: "";
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #FF3C00;
            border-radius: 4px;
        }
    </style>
</head>

<body class="loading">
    <!-- Loader Premium -->
    <div id="loader">
        <div class="loader-content">
            <div class="loader-logo"><img
                    src="{{ $parametre?->getFirstMediaUrl('logo_header') ?? URL::asset('front/images/logo/logo.jpg') }}"
                    alt="{{ config('app.name') }}" width="70"></div>
            <div class="loader-tagline">L’élégance au service de vos événements.</div>
            <div class="loader-spinner"></div>
        </div>
    </div>

    <!-- Contenu principal -->
    <div class="main-content">
        <!-- Navigation Premium -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('page.accueil') }}">
                    <img src="{{ $parametre?->getFirstMediaUrl('logo_header') ?? URL::asset('front/images/logo/logo.jpg') }}"
                        alt="DC AGENCY" width="60">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/#accueil') }}"
                                data-section="accueil">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/#about') }}"
                                data-section="about">Qui sommes-nous</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/#services') }}"
                                data-section="services">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') || request()->is('portfolios') ? 'active' : '' }}"
                                href="{{ url('/#portfolio') }}" data-section="portfolio">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/#contact') }}"
                                data-section="contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary-custom ms-2 {{ Route::is('page.candidature') ? 'active' : '' }}"
                                href="{{ route('page.candidature') }}" data-section="candidat">Nous rejoindre</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!--YIELD CONTENT-->
        @yield('content')


        <!-- Contact Section Premium -->
        @include('frontend.sections.contact')

        <!-- Footer Premium -->
        <footer class="footer-premium">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="footer-logo-section">
                            <div class="footer-logo">DC <span>AGENCY</span></div>
                            <p class="footer-description">L’art d’accueillir, l’excellence d’organiser.</p>
                            <div class="social-icons-premium">
                                <a href="{{ $parametre?->lien_facebook }}" target="_blank" class="social-icon"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a href="{{ $parametre?->lien_instagram }}" target="_blank" class="social-icon"><i
                                        class="fab fa-instagram"></i></a>
                                <a href="{{ $parametre?->lien_linkedin }}" target="_blank" class="social-icon"><i
                                        class="fab fa-linkedin-in"></i></a>
                                <a href="{{ $parametre?->lien_twitter }}" target="_blank" class="social-icon"><i
                                        class="fab fa-twitter"></i></a>
                                {{-- <a href="{{ $parametre?->lien_youtube }}" class="social-icon"><i class="fab fa-youtube"></i></a> --}}
                                {{-- <a href="{{ $parametre?->lien_whatsapp }}" class="social-icon"><i class="fab fa-whatsapp"></i></a> --}}
                                <a href="{{ $parametre?->lien_tiktok }}" target="_blank" class="social-icon"><i
                                        class="fab fa-tiktok"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 mb-4">
                        <div class="footer-section">
                            <h5>Services</h5>
                            <ul class="footer-links">
                                @foreach ($services as $item)
                                    <li><a href="#services">{{ $item->libelle }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 mb-4">
                        <div class="footer-section">
                            <h5>Entreprise</h5>
                            <ul class="footer-links">
                                <li><a href="#about">À propos</a></li>
                                <li><a href="#services">Nos Services</a></li>
                                <li><a href="#portfolio">Portfolio</a></li>
                                <li><a href="#contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div class="footer-section">
                            <h5>Contactez-nous</h5>
                            <p>Email: <a href="mailto:{{ $parametre?->email1 }}"
                                    style="color: #ccc;">{{ $parametre?->email1 }}</a></p>
                            <p>Téléphone: <a href="tel:{{ $parametre?->contact1 }}"
                                    style="color: #ccc;">{{ $parametre?->contact1 }}</a></p>
                            <p>Adresse: {{ $parametre?->localisation }}</p>
                        </div>
                    </div>
                </div>

                <div class="footer-bottom">
                    <p>&copy; {{ date('Y') }} DC Agency. Tous droits réservés. Developpé par <a
                            href="https://www.linkedin.com/in/alex-kouamelan/" target="_blank"
                            style="color: #ccc;">Alex Kouamelan</a>.
                            <a
                            href="https://www.dolubux.com" target="_blank"
                            style="color: #ccc;">Dolubux</a>.
                    </p>
                </div>
            </div>
        </footer>
    </div>


    @include('frontend.components.whatsapp_bouttonup')

    <!-- Scripts -->
    <script>
        // Loader immédiat - pas d'attente du DOM
        (function() {
            // Marquer la classe loading sur le body
            document.body.classList.add('loading');

            // Timer de démarrage du loader (affichage immédiat)
            let loaderTimer = setTimeout(function() {
                hideLoader();
            }, 1500); // Réduire à 1.5 secondes

            // Quand tout est chargé
            window.addEventListener('load', function() {
                clearTimeout(loaderTimer);
                hideLoader();
            });

            function hideLoader() {
                const loader = document.getElementById('loader');
                const mainContent = document.querySelector('.main-content');

                if (loader) {
                    loader.classList.add('hide');
                    document.body.classList.remove('loading');

                    if (mainContent) {
                        mainContent.classList.add('loaded');
                    }

                    setTimeout(function() {
                        loader.style.display = 'none';
                    }, 800);
                }
            }

            const sections = document.querySelectorAll("section[id]");
            const navLinks = document.querySelectorAll(".navbar-nav .nav-link");

            function activateLink() {
                let scrollY = window.scrollY + 150; // ajustement pour le header

                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.offsetHeight;
                    const sectionId = section.getAttribute("id");

                    if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                        navLinks.forEach(link => {
                            link.classList.remove("active");
                            if (link.dataset.section === sectionId) {
                                link.classList.add("active");
                            }
                        });
                    }
                });
            }

            // Exécute au chargement et pendant le scroll
            if (window.location.pathname === "/") {
                window.addEventListener("scroll", activateLink);
                activateLink();
            }
        })();
    </script>


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

        // Enhanced Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 100) {
                navbar.style.background = 'rgba(26, 26, 26, 0.98)';
                navbar.style.padding = '0.8rem 0';
                navbar.style.boxShadow = '0 5px 20px rgba(0, 0, 0, 0.1)';
            } else {
                navbar.style.background = 'rgba(26, 26, 26, 0.95)';
                navbar.style.padding = '1.2rem 0';
                navbar.style.boxShadow = 'none';
            }
        });

        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            });
        });

        // Enhanced fade-in animation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in-up').forEach(el => {
            observer.observe(el);
        });



        // Mobile menu close on link click
        document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
            link.addEventListener('click', () => {
                const navbarCollapse = document.querySelector('.navbar-collapse');
                if (navbarCollapse.classList.contains('show')) {
                    const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
                        toggle: false
                    });
                    bsCollapse.hide();
                }
            });
        });
    </script>
</body>

</html>
