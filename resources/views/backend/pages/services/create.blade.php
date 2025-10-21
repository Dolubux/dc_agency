@extends('backend.layouts.master')

@section('content')
    @component('backend.components.breadcrumb')
        <link href="{{ URL::asset('build/libs/dropzone/dropzone.css') }}" rel="stylesheet">

        @slot('li_1')
            Service
        @endslot
        @slot('title')
            Créer un nouveau service
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form id="formSend" action="{{ route('service.store') }}" method="POST" class="needs-validation"
                        novalidate enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label for="libelle" class="form-label">Libellé <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="libelle" id="libelle" class="form-control" required
                                        value="{{ old('libelle') }}">
                                    @error('libelle')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description <span
                                            class="text-danger">*</span></label>
                                    <textarea name="description" id="ckeditor-classic" class="form-control" required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="icone" class="form-label">Icône <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="icone" id="icone" class="form-control" required
                                        value="{{ old('icone') }}">
                                    <small class="text-muted">Exemple : ri-star-line, fas fa-user, etc.</small>
                                    @error('icone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                            </div>

                            <div class="col-lg-5">
                                <div class="card">
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image du service</label>
                                        <input class="form-control" type="file" id="image" name="image"
                                            accept="image/*">
                                        <div class="mt-2 position-relative" style="display: inline-block;">
                                            <img id="previewImage" src="#" alt="Aperçu"
                                                style="max-width: 200px; display: none;" />
                                            <button type="button" id="removeImageBtn" class="btn btn-danger btn-sm"
                                                style="position: absolute; top: 5px; right: 5px; display: none;">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </div>
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="statut" class="form-label">Statut</label>
                                    <select name="statut" id="statut" class="form-select">
                                        <option value="1">Actif</option>
                                        <option value="0">Inactif</option>
                                    </select>
                                </div>
                            </div>

                            <div class="text-end mb-3">
                                <button type="submit" class="btn btn-success w-lg">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
        // Aperçu et suppression de l'image
        $('#image').on('change', function(e) {
            const [file] = this.files;
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewImage').attr('src', e.target.result).show();
                    $('#removeImageBtn').show();
                }
                reader.readAsDataURL(file);
            } else {
                $('#previewImage').hide();
                $('#removeImageBtn').hide();
            }
        });

        $('#removeImageBtn').on('click', function() {
            $('#image').val('');
            $('#previewImage').attr('src', '#').hide();
            $(this).hide();
        });
    </script>
@endsection
@endsection
