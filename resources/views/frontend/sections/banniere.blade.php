<section id="accueil" class="hero-section">
    <div class="container">
        <div class="hero-content" data-aos="fade-up">
            {{-- <div class="hero-tagline">L’élégance au service de vos événements.</div> --}}
            <h1 class="heading-font">DC Agency</h1>
            <p class="hero-description">Des hôtesses, une équipe, une expérience — au service de votre image.</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap"> <a href="#services"
                    class="btn btn-premium">Découvrir nos services</a> <a href="#portfolio"
                    class="btn btn-outline-premium">Voir notre portfolio</a> </div>
            <div class="hero-stats" data-aos="fade-up" data-aos-delay="500">
                <div class="stat-item"> <span class="stat-number">500+</span> <span class="stat-label">Événements
                        participés</span> </div>
                <div class="stat-item"> <span class="stat-number">15</span> <span class="stat-label">Années
                        d'expérience</span> </div>
                <div class="stat-item"> <span class="stat-number">98%</span> <span class="stat-label">Clients
                        satisfaits</span> </div>
            </div>
        </div>
    </div>
</section>




<style>
    .hero-section {
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.4)), url({{$entreprise?->getFirstMediaUrl('banniere')}});
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        color: #fff;
        padding: 200px 0 150px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    /* Responsive pour mobile */
    @media (max-width: 767.98px) {
        .hero-section {
            padding: 100px 0 60px;
            background-attachment: scroll;
            /* évite les bugs sur mobile */
            min-height: 60vh;
        }

        .hero-section h1 {
            font-size: 2.2rem;
        }

        .hero-description {
            font-size: 1rem;
            padding: 0 10px;
        }

        .hero-stats {
            flex-direction: column;
            gap: 1.5rem;
            margin-top: 2rem;
        }
    }
</style>