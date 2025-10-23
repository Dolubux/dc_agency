@extends('frontend.layouts.app')

@section('content')
    <!-- Hero Section Premium -->
    @include('frontend.sections.banniere')

    <!-- About Section Premium -->
    @include('frontend.sections.apropos')

    <!-- Services Section Premium -->
    @include('frontend.sections.services')

    <!-- Portfolio Section -->
    @include('frontend.sections.portfolios')

    <!-- Team Section Premium -->
    {{-- <section id="equipes" class="services-section">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <div class="section-subtitle">Notre Équipe</div>
                <h2 class="section-title heading-font">Les Experts de l'Excellence</h2>
                <p class="section-description">Rencontrez les professionnels passionnés qui donnent vie à vos projets les
                    plus ambitieux.</p>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member-card">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="David Chen" class="team-avatar">
                        <h5 class="team-name">David Chen</h5>
                        <div class="team-role">Directeur Général</div>
                        <p>Visionnaire et stratège, David dirige DC Agency avec passion depuis sa création.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="team-member-card">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Claire Dubois" class="team-avatar">
                        <h5 class="team-name">Claire Dubois</h5>
                        <div class="team-role">Directrice Créative</div>
                        <p>Créatrice de génie, Claire transforme chaque vision en expérience mémorable.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="team-member-card">
                        <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="Marc Lefebvre" class="team-avatar">
                        <h5 class="team-name">Marc Lefebvre</h5>
                        <div class="team-role">Directeur des Opérations</div>
                        <p>Maître de la logistique, Marc assure l'exécution parfaite de chaque événement.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="team-member-card">
                        <img src="https://randomuser.me/api/portraits/women/55.jpg" alt="Sophie Laurent"
                            class="team-avatar">
                        <h5 class="team-name">Sophie Laurent</h5>
                        <div class="team-role">Responsable Client</div>
                        <p>Experte relationnelle, Sophie garantit la satisfaction et le dépassement des attentes.</p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
