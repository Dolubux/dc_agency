@extends('backend.layouts.master')

@section('title')
    Modifier le portfolio
@endsection

@section('content')
    @component('backend.components.breadcrumb')
        <link href="{{ URL::asset('build/libs/dropzone/dropzone.css') }}" rel="stylesheet">

        @slot('li_1')
            Portfolio
        @endslot
        @slot('title')
            Modifier le portfolio
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form id="formSend" action="{{ route('portfolios.update', $portfolio->id) }}" method="POST"
                        class="needs-validation" novalidate enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label for="libelle" class="form-label">Libellé <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="libelle" id="libelle" class="form-control" required
                                        value="{{ old('libelle', $portfolio->libelle) }}">
                                    @error('libelle')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description <span
                                            class="text-danger">*</span></label>
                                    <textarea name="description" id="ckeditor-classic" class="form-control">{{ old('description', $portfolio->description) }}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <div class="card mb-3">
                                    <div class="mb-3">
                                        <label for="image_principale" class="form-label">Image principale</label>
                                        <input class="form-control" type="file" id="image_principale"
                                            name="image_principale" accept="image/*">
                                        @php
                                            $imageUrl = $portfolio->getFirstMediaUrl('principal');
                                        @endphp
                                        <div class="mt-2 position-relative" style="display: inline-block;">
                                            <img id="previewImagePrincipale" src="{{ $imageUrl ?: '#' }}" alt="Aperçu"
                                                style="max-width: 200px; {{ $imageUrl ? '' : 'display:none;' }}" />
                                            <button type="button" id="removeImagePrincipaleBtn"
                                                class="btn btn-danger btn-sm"
                                                style="position: absolute; top: 5px; right: 5px; {{ $imageUrl ? '' : 'display:none;' }}">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </div>
                                        @error('image_principale')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="card mb-3">
                                    <div class="mb-3">
                                        <label class="form-label">Galerie d'images (max 1 Mo/image)</label>
                                        <input class="form-control" type="file" id="images" name="images[]"
                                            accept="image/*" multiple>
                                        <div id="galleryPreview" class="mt-2">
                                            @foreach ($portfolio->getMedia('gallery') as $media)
                                                <div style="display:inline-block;position:relative;margin:5px;">
                                                    <img src="{{ $media->getUrl() }}"
                                                        style="width:120px;height:120px;object-fit:cover;border-radius:8px;" />
                                                    <a href="{{ route('portfolios.media.delete', [$portfolio->id, $media->id]) }}"
                                                        class="btn btn-danger btn-sm"
                                                        style="position:absolute;top:0;right:0;"
                                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette image ?');">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                        @error('images.*')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Section Vidéos -->
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">
                                            <i class="ri-video-line text-primary me-2"></i>Liens Vidéo (Optionnel)
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="video_youtube" class="form-label">
                                                <i class="fab fa-youtube text-danger me-1"></i>Vidéo YouTube
                                            </label>
                                            <input type="text" name="video_youtube" id="video_youtube" class="form-control"
                                                placeholder="ID de la vidéo YouTube (ex: dQw4w9WgXcQ)" 
                                                value="{{ old('video_youtube', $portfolio->video_youtube ?? '') }}">
                                            <small class="text-muted">
                                                Entrez uniquement l'ID de la vidéo YouTube. 
                                                <br>Ex: pour https://www.youtube.com/watch?v=dQw4w9WgXcQ, entrez : dQw4w9WgXcQ
                                            </small>
                                            @error('video_youtube')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            
                                            <!-- Aperçu YouTube -->
                                            <div id="youtube-preview" class="mt-3" style="display: {{ ($portfolio->video_youtube ?? false) ? 'block' : 'none' }};">
                                                <label class="form-label">Aperçu :</label>
                                                <div style="position: relative; width: 100%; height: 200px; border-radius: 8px; overflow: hidden;">
                                                    <iframe id="youtube-iframe" 
                                                            src="{{ ($portfolio->video_youtube ?? false) ? 'https://www.youtube.com/embed/' . $portfolio->video_youtube . '?rel=0&modestbranding=1' : '' }}" 
                                                            width="100%" height="100%" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="video_facebook" class="form-label">
                                                <i class="fab fa-facebook text-primary me-1"></i>Vidéo Facebook
                                            </label>
                                            <input type="url" name="video_facebook" id="video_facebook" class="form-control"
                                                placeholder="Lien complet de la vidéo Facebook" 
                                                value="{{ old('video_facebook', $portfolio->video_facebook ?? '') }}">
                                            <small class="text-muted">
                                                Entrez le lien complet de la vidéo Facebook.
                                                <br>Ex: https://www.facebook.com/user/videos/123456789/
                                            </small>
                                            @error('video_facebook')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            
                                            <!-- Aperçu Facebook -->
                                            <div id="facebook-preview" class="mt-3" style="display: {{ ($portfolio->video_facebook ?? false) ? 'block' : 'none' }};">
                                                <label class="form-label">Aperçu :</label>
                                                <div style="position: relative; width: 100%; height: 200px; border-radius: 8px; overflow: hidden;">
                                                    <iframe id="facebook-iframe" 
                                                            src="{{ ($portfolio->video_facebook ?? false) ? 'https://www.facebook.com/plugins/video.php?href=' . urlencode($portfolio->video_facebook) . '&show_text=false&width=400' : '' }}" 
                                                            width="100%" height="100%" frameborder="0" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="alert alert-info">
                                            <i class="ri-information-line me-2"></i>
                                            <strong>Note :</strong> Les vidéos sont optionnelles. Si vous ajoutez une vidéo, elle sera affichée à la place de l'image principale dans le portfolio.
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="statut" class="form-label">Statut</label>
                                    <select name="statut" id="statut" class="form-select">
                                        <option value="1"
                                            {{ old('statut', $portfolio->statut) == '1' ? 'selected' : '' }}>Actif</option>
                                        <option value="0"
                                            {{ old('statut', $portfolio->statut) == '0' ? 'selected' : '' }}>Inactif
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="text-end mb-3">
                                <button type="submit" class="btn btn-success w-lg">Mettre à jour</button>
                                <a href="{{ route('portfolios.index') }}" class="btn btn-secondary">Annuler</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
    <script src="{{ URL::asset('build/js/pages/modal.init.js') }}"></script>
    <script src="{{ URL::asset('build/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
    <script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/ecommerce-product-create.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Aperçu et suppression de l'image principale
            $('#image_principale').on('change', function(e) {
                const [file] = this.files;
                if (file) {
                    if (file.size > 1024 * 1024) {
                        alert('La taille de l\'image principale ne doit pas dépasser 1 Mo.');
                        $('#image_principale').val('');
                        $('#previewImagePrincipale').hide();
                        $('#removeImagePrincipaleBtn').hide();
                        return;
                    }
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#previewImagePrincipale').attr('src', e.target.result).show();
                        $('#removeImagePrincipaleBtn').show();
                    }
                    reader.readAsDataURL(file);
                } else {
                    $('#previewImagePrincipale').hide();
                    $('#removeImagePrincipaleBtn').hide();
                }
            });

            $('#removeImagePrincipaleBtn').on('click', function() {
                $('#image_principale').val('');
                $('#previewImagePrincipale').attr('src', '#').hide();
                $(this).hide();
            });

            // Aperçu des nouvelles images galerie
            let galleryFiles = [];
            $('#images').on('change', function(e) {
                const files = Array.from(this.files);
                files.forEach(file => {
                    if (file.size > 1024 * 1024) {
                        alert('La taille d\'une image ne doit pas dépasser 1 Mo.');
                    } else {
                        const exists = galleryFiles.some(f => f.name === file.name && f.size === file.size);
                        if (!exists) {
                            galleryFiles.push(file);
                        } else {
                            alert('Cette image a déjà été ajoutée à la galerie.');
                        }
                    }
                });
                updateGalleryPreview();
                $('#images').val('');
            });

            function updateGalleryPreview() {
                $('#galleryPreview').find('.new-upload').remove();
                galleryFiles.forEach((file, idx) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#galleryPreview').append(
                            `<div class="new-upload" style="display:inline-block;position:relative;margin:5px;">
                                <img src="${e.target.result}" style="width:120px;height:120px;object-fit:cover;border-radius:8px;" />
                                <button type="button" class="btn btn-danger btn-sm removeGalleryImgBtn" data-idx="${idx}" style="position:absolute;top:0;right:0;">
                                    <i class="ri-delete-bin-line"></i>
                                </button>
                            </div>`
                        );
                    }
                    reader.readAsDataURL(file);
                });
            }

            $('#galleryPreview').on('click', '.removeGalleryImgBtn', function() {
                const idx = $(this).data('idx');
                galleryFiles.splice(idx, 1);
                updateGalleryPreview();
            });

            $('#formSend').on('submit', function(e) {
                if (galleryFiles.length) {
                    const dt = new DataTransfer();
                    galleryFiles.forEach(file => dt.items.add(file));
                    document.getElementById('images').files = dt.files;
                }
            });

            // Aperçu vidéo YouTube
            $('#video_youtube').on('input', function() {
                const videoId = $(this).val().trim();
                if (videoId && videoId.length > 5) {
                    if (/^[a-zA-Z0-9_-]{11}$/.test(videoId)) {
                        $('#youtube-iframe').attr('src', `https://www.youtube.com/embed/${videoId}?rel=0&modestbranding=1`);
                        $('#youtube-preview').show();
                    } else {
                        $('#youtube-preview').hide();
                    }
                } else {
                    $('#youtube-preview').hide();
                }
            });

            // Aperçu vidéo Facebook
            $('#video_facebook').on('input', function() {
                const videoUrl = $(this).val().trim();
                if (videoUrl && videoUrl.includes('facebook.com')) {
                    $('#facebook-iframe').attr('src', `https://www.facebook.com/plugins/video.php?href=${encodeURIComponent(videoUrl)}&show_text=false&width=400`);
                    $('#facebook-preview').show();
                } else {
                    $('#facebook-preview').hide();
                }
            });
        });
    </script>
@endsection