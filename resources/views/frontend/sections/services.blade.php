<section id="services" class="services-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <div class="section-subtitle">Nos Services</div>
            <h2 class="section-title heading-font">Solutions Événementielles Complètes</h2>
            <p class="section-description">DC Agency, l’élégance au service de l’accueil et de vos événements d’exception.</p>
        </div>
        <div class="row">

            @foreach ($services as $service)
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="{{ $service->icone }}"></i>
                        </div>
                        <h4 class="service-title">{{ $service->libelle }}</h4>
                        <p class="service-description">{!! $service->description !!}</p>
                        <a href="#contact" class="btn btn-outline-dark rounded-pill">Demander un devis</a>

                    </div>
                </div>
            @endforeach

            

        </div>
    </div>
</section>
