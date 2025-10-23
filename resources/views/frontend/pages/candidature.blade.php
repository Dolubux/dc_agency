@extends('frontend.layouts.app')

@section('title', 'Candidature - DC Agency')

@section('content')
    <!-- Hero Section -->
    <section class="hero-inner" style="background: linear-gradient(135deg, #161617 0%, #e33708 100%); padding: 120px 0 80px;">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="hero-title text-white mb-4" data-aos="fade-up">Nous rejoindre</h1>
                    <p class="hero-subtitle text-white-50 mb-0" data-aos="fade-up" data-aos-delay="100">
                        Rejoignez l'équipe de DC Agency et contribuez à créer des expériences inoubliables.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Become Hostess Section -->
    <section id="devenir-hotesse" class="candidature-section">
        <div class="container">
            <div class="section-header text-center mb-5" data-aos="fade-up">
                <div class="section-subtitle">Rejoignez-nous</div>
                <h2 class="section-title">Devenir hôtesse d'accueil</h2>
                <p class="section-description">
                    Rejoignez notre équipe d'hôtesses professionnelles et participez à des événements prestigieux dans toute la France.
                </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- Messages d'alerte -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <!-- Formulaire de candidature -->
                    <div class="candidature-form-wrapper" data-aos="fade-up">
                        <form id="candidatureForm" action="{{ route('page.candidature.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <!-- Informations personnelles -->
                            <div class="form-section">
                                <h4 class="form-section-title">
                                    <i class="fas fa-user text-primary me-2"></i>Informations personnelles
                                </h4>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="prenom" class="form-label">Prénom <span class="text-danger">*</span></label>
                                            <input type="text" name="prenom" id="prenom" class="form-control" 
                                                value="{{ old('prenom') }}" placeholder="Votre prénom" required>
                                            @error('prenom')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nom" class="form-label">Nom <span class="text-danger">*</span></label>
                                            <input type="text" name="nom" id="nom" class="form-control" 
                                                value="{{ old('nom') }}" placeholder="Votre nom" required>
                                            @error('nom')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="email" name="email" id="email" class="form-control" 
                                                value="{{ old('email') }}" placeholder="votre@email.com" required>
                                            @error('email')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="telephone" class="form-label">Téléphone <span class="text-danger">*</span></label>
                                            <input type="tel" name="telephone" id="telephone" class="form-control" 
                                                value="{{ old('telephone') }}" placeholder="06 12 34 56 78" required>
                                            @error('telephone')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ville" class="form-label">Ville <span class="text-danger">*</span></label>
                                            <input type="text" name="ville" id="ville" class="form-control" 
                                                value="{{ old('ville') }}" placeholder="Votre ville" required>
                                            @error('ville')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="age" class="form-label">Âge <span class="text-danger">*</span></label>
                                            <input type="number" name="age" id="age" class="form-control" 
                                                value="{{ old('age') }}" placeholder="25" min="18" max="65" required>
                                            @error('age')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Documents -->
                            <div class="form-section">
                                <h4 class="form-section-title">
                                    <i class="fas fa-file-upload text-primary me-2"></i>Documents requis
                                </h4>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cv" class="form-label">CV <span class="text-danger">*</span></label>
                                            <div class="file-upload-wrapper">
                                                <input type="file" name="cv" id="cv" class="form-control file-input" 
                                                    accept=".pdf" required>
                                                <small class="form-text text-muted">Format PDF uniquement, max 2MB</small>
                                            </div>
                                            @error('cv')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="photo" class="form-label">Photo <span class="text-danger">*</span></label>
                                            <div class="file-upload-wrapper">
                                                <input type="file" name="photo" id="photo" class="form-control file-input" 
                                                    accept=".jpg,.jpeg,.png" required>
                                                <small class="form-text text-muted">Format JPG/PNG, max 2MB</small>
                                            </div>
                                            @error('photo')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Motivation -->
                            <div class="form-section">
                                <h4 class="form-section-title">
                                    <i class="fas fa-heart text-primary me-2"></i>Votre motivation
                                </h4>
                                
                                <div class="form-group">
                                    <label for="motivation" class="form-label">Pourquoi souhaitez-vous rejoindre DC Agency ? <span class="text-danger">*</span></label>
                                    <textarea name="motivation" id="motivation" class="form-control" rows="5" 
                                        placeholder="Partagez-nous votre motivation, vos expériences précédentes et ce qui vous attire dans le métier d'hôtesse d'accueil..." required>{{ old('motivation') }}</textarea>
                                    @error('motivation')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Bouton de soumission -->
                            <div class="text-center">
                                <button type="submit" id="submitBtn" class="btn btn-primary btn-lg btn-submit">
                                    <span class="btn-text">
                                        <i class="fas fa-paper-plane me-2"></i>Postuler maintenant
                                    </span>
                                    <span class="btn-spinner d-none">
                                        <i class="fas fa-spinner fa-spin me-2"></i>Envoi en cours...
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* Section candidature */
        .candidature-section {
            padding: 80px 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        /* En-tête de section */
        .section-header .section-subtitle {
            color: #e33708;
            font-weight: 600;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #161617;
            margin-bottom: 20px;
        }

        .section-description {
            font-size: 1.1rem;
            color: #6c757d;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Formulaire wrapper */
        .candidature-form-wrapper {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            padding: 40px;
            margin-top: 30px;
        }

        /* Sections du formulaire */
        .form-section {
            margin-bottom: 40px;
            padding: 25px;
            background: #f8f9fa;
            border-radius: 15px;
            border-left: 4px solid #e33708;
        }

        .form-section-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #161617;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
        }

        /* Groupes de formulaire */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
        }

        .form-control:focus {
            border-color: #e33708;
            box-shadow: 0 0 0 0.2rem rgba(227, 55, 8, 0.15);
            background: white;
        }

        .form-control::placeholder {
            color: #adb5bd;
            font-style: italic;
        }

        /* Upload de fichiers */
        .file-upload-wrapper {
            position: relative;
        }

        .file-input {
            cursor: pointer;
        }

        .file-input::-webkit-file-upload-button {
            background: #e33708;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 6px;
            margin-right: 10px;
            cursor: pointer;
            font-weight: 500;
        }

        /* Bouton de soumission */
        .btn-submit {
            background: linear-gradient(135deg, #e33708 0%, #ff6b35 100%);
            border: none;
            border-radius: 50px;
            padding: 15px 40px;
            font-size: 1.1rem;
            font-weight: 600;
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(227, 55, 8, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(227, 55, 8, 0.4);
            background: linear-gradient(135deg, #d63384 0%, #e33708 100%);
        }

        .btn-submit:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        /* Alertes */
        .alert {
            border-radius: 15px;
            border: none;
            padding: 15px 20px;
            font-weight: 500;
        }

        .alert-success {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            color: #155724;
        }

        .alert-danger {
            background: linear-gradient(135deg, #f8d7da 0%, #f1aeb5 100%);
            color: #721c24;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .candidature-form-wrapper {
                padding: 25px;
                margin: 20px 10px;
            }

            .form-section {
                padding: 20px;
            }

            .section-title {
                font-size: 2rem;
            }

            .btn-submit {
                width: 100%;
                padding: 15px;
            }
        }
    </style>

    <script>
        // Gestion de l'envoi du formulaire
        document.getElementById('candidatureForm').addEventListener('submit', function(e) {
            const submitBtn = document.getElementById('submitBtn');
            const btnText = submitBtn.querySelector('.btn-text');
            const btnSpinner = submitBtn.querySelector('.btn-spinner');
            
            // Afficher le spinner
            btnText.classList.add('d-none');
            btnSpinner.classList.remove('d-none');
            submitBtn.disabled = true;
        });

        // Auto-hide des alertes
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                if (alert) {
                    alert.style.transition = 'opacity 0.5s';
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 500);
                }
            });
        }, 5000);

        // Validation de la taille des fichiers
        document.querySelectorAll('.file-input').forEach(input => {
            input.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file && file.size > 2 * 1024 * 1024) { // 2MB
                    alert('Le fichier ne doit pas dépasser 2MB');
                    e.target.value = '';
                }
            });
        });
    </script>
@endsection
