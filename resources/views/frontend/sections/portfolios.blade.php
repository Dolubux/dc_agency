{{-- <style>
    /* --- Grille portfolio --- */
    .portfolio-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
        justify-content: center;
    }

    /* --- Carte d'image --- */
    .portfolio-image-wrapper {
        position: relative;
        width: 100%;
        overflow: hidden;
        border-radius: 16px;
        cursor: pointer;
        background: #f8f8f8;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: block;
    }

    .portfolio-image-wrapper:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    }

    .portfolio-image {
        width: 100%;
        height: 250px;
        object-fit: cover;
        object-position: center;
        border-radius: 16px;
        transition: transform 0.6s ease;
        display: block;
    }

    .portfolio-item:hover .portfolio-image {
        transform: scale(1.08);
    }

    /* --- Video wrapper --- */
    .portfolio-video-wrapper {
        position: relative;
        width: 100%;
        height: 250px;
        border-radius: 16px;
        overflow: hidden;
        cursor: pointer;
        background: #000;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .portfolio-video-wrapper:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    }

    .portfolio-video {
        width: 100%;
        height: 100%;
        border: none;
        border-radius: 16px;
    }

    .video-play-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.4);
        display: flex;
        justify-content: center;
        align-items: center;
        transition: opacity 0.3s ease;
        border-radius: 16px;
    }

    .video-play-btn {
        width: 80px;
        height: 80px;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #FF3C00;
        font-size: 2rem;
        transition: all 0.3s ease;
    }

    .portfolio-video-wrapper:hover .video-play-btn {
        background: #FF3C00;
        color: white;
        transform: scale(1.1);
    }

    /* --- Overlay titre --- */
    .portfolio-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.55);
        opacity: 0;
        transition: opacity 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: #fff;
        text-align: center;
        font-size: 1.1rem;
        padding: 10px;
        border-radius: 16px;
    }

    .portfolio-item:hover .portfolio-overlay {
        opacity: 1;
    }

    /* --- Type badge --- */
    .portfolio-type-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        background: #FF3C00;
        color: white;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        z-index: 10;
    }

    .portfolio-type-badge.video {
        background: #25D366;
    }

    /* --- Lightbox (image/video en plein écran) --- */
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

    .lightbox iframe {
        width: 90%;
        height: 80vh;
        max-width: 1200px;
        border-radius: 12px;
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.7);
    }

    .close-btn {
        position: absolute;
        top: 25px;
        right: 40px;
        font-size: 2.5rem;
        color: #fff;
        cursor: pointer;
        transition: color 0.3s;
        z-index: 10001;
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

    /* --- Nom de l'événement --- */
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
        background-color: #f6805d;
        color: #fff;
        padding: 8px 15px;
        border-radius: 20px;
        display: inline-block;
    }

    /* --- Animations --- */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    /* --- Responsivité --- */
    @media (max-width: 992px) {
        .portfolio-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
    }

    @media (max-width: 576px) {
        .portfolio-grid {
            grid-template-columns: 1fr;
            gap: 16px;
        }

        .portfolio-image,
        .portfolio-video-wrapper {
            height: 200px;
        }

        .close-btn {
            top: 15px;
            right: 20px;
            font-size: 2rem;
        }

        .lightbox iframe {
            width: 95%;
            height: 70vh;
        }

        .portfolio-event-name h6 {
            font-size: 1rem;
            padding: 5px 10px;
        }

        .video-play-btn {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
        }
    }
</style> --}}

<style>
    /* --- Grille portfolio --- */
    .portfolio-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 28px;
        justify-content: center;
        align-items: stretch;
        margin-top: 40px;
    }

    /* --- Carte d'image et vidéo --- */
    .portfolio-image-wrapper,
    .portfolio-video-wrapper {
        position: relative;
        width: 100%;
        aspect-ratio: 16 / 9;
        overflow: hidden;
        border-radius: 18px;
        cursor: pointer;
        background: #fafafa;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.35s ease, box-shadow 0.35s ease;
    }

    .portfolio-image-wrapper:hover,
    .portfolio-video-wrapper:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
    }

    /* --- Image & iframe (ratio préservé) --- */
    .portfolio-image,
    .portfolio-video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 18px;
        transition: transform 0.5s ease;
    }

    .portfolio-item:hover .portfolio-image {
        transform: scale(1.05);
    }

    /* --- Overlay titre & bouton play --- */
    .portfolio-overlay,
    .video-play-overlay {
        position: absolute;
        inset: 0;
        border-radius: 18px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
        transition: opacity 0.3s ease;
    }

    .video-play-overlay {
        background: rgba(0, 0, 0, 0.35);
    }

    .portfolio-overlay {
        background: rgba(0, 0, 0, 0.55);
        opacity: 0;
        flex-direction: column;
        text-align: center;
    }

    .portfolio-item:hover .portfolio-overlay {
        opacity: 1;
    }

    /* --- Bouton play --- */
    .video-play-btn {
        width: 75px;
        height: 75px;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #FF3C00;
        font-size: 2rem;
        transition: all 0.3s ease;
    }

    .portfolio-video-wrapper:hover .video-play-btn {
        background: #FF3C00;
        color: #fff;
        transform: scale(1.1);
    }

    /* --- Badge type --- */
    .portfolio-type-badge {
        position: absolute;
        top: 14px;
        left: 14px;
        background: #FF3C00;
        color: #fff;
        padding: 6px 14px;
        border-radius: 30px;
        font-size: 0.8rem;
        font-weight: 600;
        z-index: 10;
    }

    .portfolio-type-badge.video {
        background: #25D366;
    }

    /* --- Nom de l'événement --- */
    .portfolio-event-name {
        text-align: center;
        margin-top: 12px;
    }

    .portfolio-event-name h6 {
        font-size: 1.05rem;
        font-weight: 600;
        color: #fff;
        background: linear-gradient(90deg, #FF3C00, #f6805d);
        padding: 8px 18px;
        border-radius: 25px;
        display: inline-block;
    }

    /* --- Lightbox (taille normale) --- */
    .lightbox {
        display: none;
        position: fixed;
        z-index: 9999;
        inset: 0;
        background: rgba(0, 0, 0, 0.9);
        justify-content: center;
        align-items: center;
        flex-direction: column;
        animation: fadeIn 0.4s ease;
    }

    .lightbox img,
    .lightbox iframe {
        max-width: 95%;
        max-height: 85vh;
        border-radius: 14px;
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.7);
        background: #000;
        transition: opacity 0.3s ease;
    }

    .lightbox iframe {
        width: auto;
        height: auto;
        max-width: 90%;
        max-height: 80vh;
        border-radius: 12px;
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.7);
        background: #000;
    }


    .close-btn {
        position: absolute;
        top: 25px;
        right: 35px;
        font-size: 2.3rem;
        color: #fff;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .close-btn:hover {
        color: #FF3C00;
    }

    /* --- Navigation lightbox --- */
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

    /* --- Animation --- */
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    /* --- Responsive --- */
    @media (max-width: 992px) {
        .portfolio-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .video-play-btn {
            width: 60px;
            height: 60px;
            font-size: 1.6rem;
        }
    }

    @media (max-width: 576px) {
        .portfolio-grid {
            grid-template-columns: 1fr;
            gap: 18px;
        }

        .portfolio-event-name h6 {
            font-size: 0.95rem;
            padding: 6px 12px;
        }

        .lightbox iframe {
            width: 95%;
            height: 70vh;
        }

        .close-btn {
            top: 15px;
            right: 20px;
            font-size: 2rem;
        }
    }
</style>

<section id="portfolio" style="padding: 120px 0;">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <div class="section-subtitle">Portfolio</div>
            <h2 class="section-title heading-font">Nos Réalisations Exceptionnelles</h2>
            <p class="section-description">
                Découvrez quelques-unes des événements auxquelles nous avons participé.
            </p>
        </div>

        <div class="portfolio-grid">
            @foreach ($portfolios as $portfolio)
                <div class="portfolio-item" data-aos="fade-up" data-aos-delay="100">

                    @if ($portfolio->video_youtube || $portfolio->video_facebook)
                        <!-- Affichage vidéo -->
                        <div class="portfolio-video-wrapper"
                            onclick="openVideo('{{ $portfolio->video_youtube ?? $portfolio->video_facebook }}', '{{ $portfolio->video_youtube ? 'youtube' : 'facebook' }}')">
                            <div class="portfolio-type-badge video">
                                <i class="fab fa-{{ $portfolio->video_youtube ? 'youtube' : 'facebook' }}"></i> Vidéo
                            </div>

                            @if ($portfolio->video_youtube)
                                <iframe class="portfolio-video"
                                    src="https://www.youtube.com/embed/{{ $portfolio->video_youtube }}?rel=0&modestbranding=1&controls=0&showinfo=0"
                                    frameborder="0"></iframe>
                            @elseif($portfolio->video_facebook)
                                <iframe class="portfolio-video"
                                    src="https://www.facebook.com/plugins/video.php?href={{ urlencode($portfolio->video_facebook) }}&show_text=false&width=560"
                                    frameborder="0"></iframe>
                            @endif

                            <div class="video-play-overlay">
                                <div class="video-play-btn">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>

                            <div class="portfolio-overlay">
                                <h5 class="portfolio-title">{{ $portfolio->libelle }}</h5>
                                <i class="fas fa-play text-white fa-2x mt-2"></i>
                            </div>
                        </div>
                    @else
                        <!-- Affichage image -->
                        <div class="portfolio-image-wrapper" data-gallery="{{ $portfolio->id }}"
                            onclick="openGallery({{ $portfolio->id }})">
                            <div class="portfolio-type-badge">
                                <i class="fas fa-camera"></i> Photo
                            </div>

                            <img src="{{ $portfolio?->getFirstMediaUrl('principal') ?? URL::asset('front/images/logo/logo_f.jpg') }}"
                                alt="{{ $portfolio?->libelle }}" class="portfolio-image">

                            <div class="portfolio-overlay">
                                <h5 class="portfolio-title">{{ $portfolio?->libelle }}</h5>
                                <i class="fas fa-search-plus text-white fa-2x mt-2"></i>
                            </div>
                        </div>
                    @endif

                    <!-- Nom de l'événement -->
                    <div class="portfolio-event-name">
                        <h6>{{ $portfolio?->libelle }}</h6>
                    </div>

                    <!-- Galerie cachée pour les images -->
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

        <!-- Bouton pour voir plus -->
        <div class="text-center mt-4">
            <a href="{{ route('page.portfolio') }}" class="btn btn-premium">Voir notre portfolio complet</a>
        </div>
    </div>

    <!-- Lightbox personnalisée -->
    <div id="lightbox" class="lightbox">
        <span class="close-btn" onclick="closeLightbox()">&times;</span>
        <img id="lightbox-img" src="" alt="" style="display: none;">
        <iframe id="lightbox-video" src="" frameborder="0" allowfullscreen style="display: none;"></iframe>
        <div class="lightbox-controls" id="lightbox-controls">
            <button class="prev-btn" onclick="prevImage()">&#10094;</button>
            <button class="next-btn" onclick="nextImage()">&#10095;</button>
        </div>
    </div>
</section>

<script>
    let currentGallery = [];
    let currentIndex = 0;

    // Ouvrir galerie d'images
    function openGallery(id) {
        const gallery = document.querySelectorAll(`#gallery-${id} img`);
        currentGallery = Array.from(gallery).map(img => img.src);
        currentIndex = 0;
        showImage();
        document.getElementById("lightbox").style.display = "flex";
    }

    // Ouvrir vidéo en lightbox
    function openVideo(videoUrl, type) {
        const lightbox = document.getElementById("lightbox");
        const videoElement = document.getElementById("lightbox-video");
        const imgElement = document.getElementById("lightbox-img");
        const controls = document.getElementById("lightbox-controls");

        // Masquer l'image et les contrôles
        imgElement.style.display = "none";
        controls.style.display = "none";

        // Afficher la vidéo
        if (type === 'youtube') {
            videoElement.src = `https://www.youtube.com/embed/${videoUrl}?autoplay=1&rel=0&modestbranding=1`;
        } else if (type === 'facebook') {
            videoElement.src =
                `https://www.facebook.com/plugins/video.php?href=${encodeURIComponent(videoUrl)}&show_text=false&width=800&autoplay`;
        }

        videoElement.style.display = "block";
        lightbox.style.display = "flex";
    }

    // Afficher image
    function showImage() {
        const imgElement = document.getElementById("lightbox-img");
        const videoElement = document.getElementById("lightbox-video");
        const controls = document.getElementById("lightbox-controls");

        // Masquer la vidéo
        videoElement.style.display = "none";
        videoElement.src = "";

        // Afficher l'image et les contrôles
        imgElement.src = currentGallery[currentIndex];
        imgElement.style.display = "block";
        controls.style.display = "flex";
    }

    // Fermer lightbox
    function closeLightbox() {
        document.getElementById("lightbox").style.display = "none";
        document.getElementById("lightbox-video").src = "";
    }

    // Navigation images
    function nextImage() {
        currentIndex = (currentIndex + 1) % currentGallery.length;
        showImage();
    }

    function prevImage() {
        currentIndex = (currentIndex - 1 + currentGallery.length) % currentGallery.length;
        showImage();
    }

    // Fermer avec Echap
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeLightbox();
        }
    });
</script>
