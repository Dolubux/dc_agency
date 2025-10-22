 <section id="about" class="py-5" style="padding: 120px 0;">
     <div class="container">
         <div class="row align-items-center">
             <div class="col-lg-6" data-aos="fade-right">
                 <div class="section-header text-start">
                     <div class="section-subtitle">À propos de nous</div>
                     <h2 class="section-title heading-font">{{ $entreprise?->libelle_apropos }}</h2>
                     <div class="section-description text-start">
                         {!! $entreprise?->description_apropos !!}
                     </div>
                     <a href="#services" class="btn btn-premium mt-3">Découvrir nos services</a>
                 </div>


                 {{-- <div class="row mt-4">
                            <div class="col-6">
                                <div class="text-center">
                                    <div class="stat-number text-dark">15+</div>
                                    <div class="stat-label text-dark">Années d'expertise</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center">
                                    <div class="stat-number text-dark">50+</div>
                                    <div class="stat-label text-dark">Experts passionnés</div>
                                </div>
                            </div>
                        </div> --}}
             </div>
             <div class="col-lg-6" data-aos="fade-left">
                 <div class="position-relative">
                     <img src="{{ $entreprise?->getFirstMediaUrl('image_apropos') }}?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
                         alt="Équipe DC Agency" class="img-fluid rounded shadow-lg">
                     <div class="position-absolute top-0 end-0 translate-middle">
                         <div class="bg-primary text-white p-3 rounded-circle shadow floating">
                             <i class="fas fa-award fa-2x"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
