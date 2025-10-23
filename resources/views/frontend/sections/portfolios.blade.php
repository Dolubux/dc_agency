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
    }
</style>

<section id="portfolio" style="padding: 120px 0;">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <div class="section-subtitle">Portfolio</div>
            <h2 class="section-title heading-font">Nos Réalisations Exceptionnelles</h2>
            <p class="section-description">
                Découvrez quelques-uns de nos projets les plus prestigieux et les expériences uniques que nous avons
                créées.
            </p>
        </div>

        <div class="portfolio-grid">
            @foreach ($portfolios as $portfolio)
                <div class="portfolio-item" data-aos="fade-up" data-aos-delay="100">
                    <div class="portfolio-image-wrapper" data-gallery="{{ $portfolio->id }}"
                        onclick="openGallery({{ $portfolio->id }})">
                        <img src="{{ $portfolio?->getFirstMediaUrl('principal') ?? URL::asset('front/images/logo/logo_f.jpg') }}" alt="{{ $portfolio?->libelle }}"
                            class="portfolio-image">
                        <div class="portfolio-overlay">
                            <h5 class="portfolio-title">{{ $portfolio?->libelle }}</h5>
                        </div>
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

    function showImage() {
        document.getElementById("lightbox-img").src = currentGallery[currentIndex];
    }

    function closeLightbox() {
        document.getElementById("lightbox").style.display = "none";
    }

    function nextImage() {
        currentIndex = (currentIndex + 1) % currentGallery.length;
        showImage();
    }

    function prevImage() {
        currentIndex = (currentIndex - 1 + currentGallery.length) % currentGallery.length;
    }
</script>
