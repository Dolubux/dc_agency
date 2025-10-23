@extends('frontend.layouts.app')

@section('title', 'Portfolio Complet - DC Agency')

<style>
    /* --- Grille portfolio --- */
    .portfolio-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        /* ✅ 3 colonnes sur desktop */
        gap: 24px;
        justify-content: center;
    }

    /* --- Carte d'image --- */
    .portfolio-image-wrapper {
        position: relative;
        width: 100%;
        /* aspect-ratio: 1 / 1; */
        overflow: hidden;
        border-radius: 16px;
        cursor: pointer;
        background: #f8f8f8;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: block;
        /* ✅ Assure un affichage en bloc */
    }

    .portfolio-image-wrapper:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    }

    .portfolio-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        /* ✅ Centre l'image */
        border-radius: 16px;
        transition: transform 0.6s ease;
        display: block;
        /* ✅ Supprime les espaces par défaut */
    }

    .portfolio-item:hover .portfolio-image {
        transform: scale(1.08);
    }

    /* --- Overlay titre --- */
    .portfolio-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.55);
        opacity: 0;
        transition: opacity 0.3s ease;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
        text-align: center;
        font-size: 1.1rem;
        padding: 10px;
    }

    .portfolio-item:hover .portfolio-overlay {
        opacity: 1;
    }

    /* --- Lightbox (image en plein écran) --- */
    .lightbox {
        display: none;
        position: fixed;
        z-index: 9999;
        inset: 0;
        background: rgba(0, 0, 0, 0.92);
        justify-content: center;
        align-items: center;
        flex-direction: column;
        animation: fadeIn 0.4s ease;
    }

    .lightbox img {
        max-width: 92%;
        max-height: 82vh;
        border-radius: 12px;
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.7);
        transition: opacity 0.3s ease;
    }

    .close-btn {
        position: absolute;
        top: 25px;
        right: 40px;
        font-size: 2.5rem;
        color: #fff;
        cursor: pointer;
        transition: color 0.3s;
    }

    .close-btn:hover {
        color: #FF3C00;
    }

    /* --- Contrôles Lightbox --- */
    .lightbox-controls {
        position: absolute;
        top: 50%;
        width: 100%;
        display: flex;
        justify-content: space-between;
        transform: translateY(-50%);
        padding: 0 40px;
    }

    .prev-btn,
    .next-btn {
        background: rgba(255, 255, 255, 0.2);
        border: none;
        color: #fff;
        font-size: 2rem;
        padding: 12px 18px;
        cursor: pointer;
        border-radius: 50%;
        transition: 0.3s;
    }

    .prev-btn:hover,
    .next-btn:hover {
        background: rgba(255, 255, 255, 0.45);
    }

    /* --- Animations --- */
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    /* --- Responsivité --- */
    @media (max-width: 992px) {
        .portfolio-grid {
            grid-template-columns: repeat(2, 1fr);
            /* ✅ 2 colonnes sur tablette */
            gap: 20px;
        }

        .portfolio-image-wrapper {
            border-radius: 12px;
        }
    }

    @media (max-width: 576px) {
        .portfolio-grid {
            grid-template-columns: 1fr;
            /* ✅ 1 colonne sur mobile */
            gap: 16px;
        }

        .close-btn {
            top: 15px;
            right: 20px;
            font-size: 2rem;
        }

        .prev-btn,
        .next-btn {
            font-size: 1.5rem;
            padding: 8px 12px;
        }

        /* --- Nom de l'événement au bas de l'image --- */
        .portfolio-event-name {
            margin-top: 15px;
            text-align: center;
        }

        .portfolio-event-name h6 {
            font-size: 1.1rem;
            font-weight: 600;
            color: #333;
            margin: 0;
            line-height: 1.3;
            background-color: #ff3c00;
        }

        /* Responsive pour mobile */
        @media (max-width: 576px) {
            .portfolio-event-name h6 {
                font-size: 1rem;
                background-color: #ff3c00;
                padding: 5px 10px;
                border-radius: 5px;
                color: #fff;
            }
        }

        /* --- Transition fluide des images dans la lightbox --- */
        #lightbox-img {
            opacity: 1;
            transition: opacity 0.4s ease-in-out, transform 0.4s ease-in-out;
        }

        #lightbox-img.fade-out {
            opacity: 0;
            transform: scale(1.02);
        }

    }
</style>

@section('content')
    <!-- Hero Section -->
    <section class="hero-inner" style="background: linear-gradient(135deg, #161617 0%, #e33708 100%); padding: 120px 0 80px;">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="hero-title text-white mb-4" data-aos="fade-up">Notre Portfolio Complet</h1>
                    <p class="hero-subtitle text-white-50 mb-0" data-aos="fade-up" data-aos-delay="100">
                        Découvrez l'ensemble de nos réalisations et événements d'exception
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Grid Section -->

    <section id="portfolio" style="padding: 40px 0;">
        <div class="container">
            {{-- <div class="section-header" data-aos="fade-up">
            <div class="section-subtitle">Portfolio</div>
            <h2 class="section-title heading-font">Nos Réalisations Exceptionnelles</h2>
            <p class="section-description">
                Découvrez quelques-unes des evenements auquelles nous avons participé.
            </p>
        </div> --}}

            <div class="portfolio-grid">
                @foreach ($portfolios as $portfolio)
                    <div class="portfolio-item" data-aos="fade-up" data-aos-delay="50">
                        <div class="portfolio-image-wrapper" data-gallery="{{ $portfolio->id }}"
                            onclick="openGallery({{ $portfolio->id }})">
                            <img src="{{ $portfolio?->getFirstMediaUrl('principal') ?? URL::asset('front/images/logo/logo_f.jpg') }}"
                                alt="{{ $portfolio?->libelle }}" class="portfolio-image">
                            <div class="portfolio-overlay">
                                <h5 class="portfolio-title">{{ $portfolio?->libelle }}</h5>
                                <i class="fas fa-search-plus text-white fa-2x"></i>
                            </div>
                        </div>

                        <!-- ✅ Nom de l'événement au bas de l'image -->
                        <div class="portfolio-event-name mt-4 text-center fw-bold text-uppercase py-2 px-3 d-inline-block text-white"
                            style="background-color: #f6805d">
                            <h6>{{ $portfolio?->libelle }}</h6>
                        </div>

                        <!-- Galerie cachée -->
                        <div class="portfolio-gallery" id="gallery-{{ $portfolio->id }}" style="display:none;">
                            @foreach ($portfolio->getMedia('principal') as $media)
                                <img src="{{ $media->getUrl() }}" alt="Image du portfolio">
                            @endforeach
                            @foreach ($portfolio->getMedia('gallery') as $media)
                                <img src="{{ $media->getUrl() }}" alt="Image du portfolio">
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>



        </div>

        <!-- Lightbox personnalisée -->
        <div id="lightbox" class="lightbox">
            <span class="close-btn" onclick="closeLightbox()">&times;</span>
            <img id="lightbox-img" src="" alt="">
            <div class="lightbox-controls">
                <button class="prev-btn" onclick="prevImage()">&#10094;</button>
                <button class="next-btn" onclick="nextImage()">&#10095;</button>
            </div>
        </div>
    </section>

    <script>
        let currentGallery = [];
        let currentIndex = 0;

        function openGallery(id) {
            const gallery = document.querySelectorAll(`#gallery-${id} img`);
            currentGallery = Array.from(gallery).map(img => img.src);
            currentIndex = 0;
            showImage();
            document.getElementById("lightbox").style.display = "flex";
        }

        function nextImage() {
            const img = document.getElementById("lightbox-img");
            img.classList.add("fade-out");
            setTimeout(() => {
                currentIndex = (currentIndex + 1) % currentGallery.length;
                showImage();
                img.classList.remove("fade-out");
            }, 400);
        }

        function prevImage() {
            const img = document.getElementById("lightbox-img");
            img.classList.add("fade-out");
            setTimeout(() => {
                currentIndex = (currentIndex - 1 + currentGallery.length) % currentGallery.length;
                showImage();
                img.classList.remove("fade-out");
            }, 400);
        }


        function showImage() {
            document.getElementById("lightbox-img").src = currentGallery[currentIndex];
        }

        function closeLightbox() {
            document.getElementById("lightbox").style.display = "none";
        }

        // function nextImage() {
        //     currentIndex = (currentIndex + 1) % currentGallery.length;
        //     showImage();
        // }


        // function prevImage() {
        //     currentIndex = (currentIndex - 1 + currentGallery.length) % currentGallery.length;
        // }
    </script>
@endsection
