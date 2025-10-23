 <section id="contact" class="contact-section">
     <div class="container">
         <div class="section-header" data-aos="fade-up">
             <div class="section-subtitle text-warning">Contact</div>
             <h2 class="section-title heading-font text-light">Créons Ensemble Votre Projet</h2>
             <p class="section-description text-light">Partagez-nous votre vision et nous la transformerons en une
                 expérience exceptionnelle qui marquera les esprits.</p>
         </div>

         <div class="row">
             <div class="col-lg-8 mx-auto" data-aos="fade-up">
                 <div class="contact-form">
                     <form action="{{ route('page.contact') }}" method="POST">
                         @csrf
                         <div class="row">
                             <div class="col-md-6">
                                 <input type="text" name="nom" class="form-control form-control-premium"
                                     placeholder="Votre nom *" required>
                             </div>
                             <div class="col-md-6">
                                 <input type="email" name="email" class="form-control form-control-premium"
                                     placeholder="Votre email *" required>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-6">
                                 <input type="tel" name="contact" class="form-control form-control-premium"
                                     placeholder="Votre numéro de téléphone *" required>
                             </div>
                             <div class="col-md-6">
                                 <select name="evenement" class="form-control form-control-premium" required>
                                     <option value="" disabled selected>Type d'événement</option>
                                     <option>Événement corporatif</option>
                                     <option>Événement privé</option>
                                     <option>Mariage de luxe</option>
                                     <option>Gala / Cérémonie</option>
                                     <option>Lancement produit</option>
                                     <option>Autre</option>
                                 </select>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-12">
                                 <textarea name="message" class="form-control form-control-premium" rows="6"
                                     placeholder="Décrivez-nous votre projet et vos attentes *"></textarea>
                             </div>
                         </div>
                         <div class="text-center mt-4">
                             <button type="submit" class="btn btn-premium">Envoyer ma demande</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>

         <div class="row mt-5">
             <div class="col-md-4 text-center" data-aos="fade-up" data-aos-delay="100">
                 <div class="service-icon mx-auto mb-3">
                     <i class="fas fa-map-marker-alt"></i>
                 </div>
                 <h5>Adresse</h5>
                 <p>{{ $parametre?->localisation }}</p>
             </div>
             <div class="col-md-4 text-center" data-aos="fade-up" data-aos-delay="200">
                 <div class="service-icon mx-auto mb-3">
                     <i class="fas fa-phone"></i>
                 </div>
                 <h5>Téléphone</h5>
                 <p>{{ $parametre?->contact1 }}<br>{{ $parametre?->contact2 }}</p>
             </div>
             <div class="col-md-4 text-center" data-aos="fade-up" data-aos-delay="300">
                 <div class="service-icon mx-auto mb-3">
                     <i class="fas fa-envelope"></i>
                 </div>
                 <h5>Email</h5>
                 <p>{{ $parametre?->email1 }}<br>{{ $parametre?->email2 }}</p>
             </div>
         </div>
     </div>
 </section>

 <script>
     document.querySelectorAll('form').forEach(form => {
         form.addEventListener('submit', async function(e) {
             e.preventDefault();

             const submitBtn = this.querySelector('button[type="submit"]');
             const originalText = submitBtn.textContent;
             submitBtn.textContent = 'Envoi en cours...';
             submitBtn.disabled = true;

             const formData = new FormData(this);

             try {
                 const response = await fetch(this.action, {
                     method: 'POST',
                     body: formData,
                     headers: {
                         'X-Requested-With': 'XMLHttpRequest',
                         'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                     }
                 });

                 const data = await response.json();

                 if (response.ok && data.success) {
                     submitBtn.textContent = 'Message envoyé ✅';
                     submitBtn.style.background = '#28a745';
                     this.reset();
                 } else {
                     throw new Error(data.message || 'Erreur lors de l’envoi.');
                 }
             } catch (error) {
                 console.error(error);
                 submitBtn.textContent = 'Erreur ❌';
                 submitBtn.style.background = '#dc3545';
             }

             setTimeout(() => {
                 submitBtn.textContent = originalText;
                 submitBtn.disabled = false;
                 submitBtn.style.background = '';
             }, 3000);
         });
     });
 </script>
