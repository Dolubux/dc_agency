@extends('backend.layouts.master')

@section('content')
    @component('backend.components.breadcrumb')
        <link href="{{ URL::asset('build/libs/dropzone/dropzone.css') }}" rel="stylesheet">

        @slot('li_1')
            Entreprise
        @endslot
        @slot('title')
            Créer une nouvelle entreprise
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form id="formSend" action="{{ route('entreprise.store') }}" method="POST" 
                        class="needs-validation" novalidate enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="row">

                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label for="libelle_apropos" class="form-label">Libellé à propos <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="libelle_apropos" id="libelle_apropos" class="form-control"
                                        required value="{{ old('libelle_apropos') }}">
                                    @error('libelle_apropos')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description_apropos" class="form-label">Description à propos</label>
                                    <textarea name="description_apropos" id="ckeditor-classic"></textarea>
                                    @error('description_apropos')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-lg-5">
                                <div class="card">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Image banniere</label>
                                        <input class="form-control" type="file" id="formFile" name="banniere"
                                            accept="image/*">
                                        <div class="mt-2 position-relative" style="display: inline-block;">
                                            <img id="previewImage" src="#" alt="Aperçu"
                                                style="max-width: 200px; display: none;" />
                                            <button type="button" id="removeImageBtn" class="btn btn-danger btn-sm"
                                                style="position: absolute; top: 5px; right: 5px; display: none;">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </div>
                                    </div>


                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Image a propos</label>
                                        <input class="form-control" type="file" id="formFile2" name="image_apropos"
                                            accept="image/*">
                                        <div class="mt-2 position-relative" style="display: inline-block;">
                                            <img id="previewImage2" src="#" alt="Aperçu"
                                                style="max-width: 200px; display: none;" />
                                            <button type="button" id="removeImageBtn2" class="btn btn-danger btn-sm"
                                                style="position: absolute; top: 5px; right: 5px; display: none;">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- end card -->
                                </div>
                            </div>
                            <!-- end row -->
                            <!-- end card -->
                            <div class="text-end mb-3">
                                <button type="submit" class="btn btn-success w-lg">Enregistrer</button>
                            </div>
                    </form>
                </div>
            </div><!-- end row -->
        </div><!-- end col -->


        <!--end row-->

    @section('script')
        <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
        <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
        <script src="{{ URL::asset('build/js/pages/modal.init.js') }}"></script>
        {{-- <script src="{{ URL::asset('build/js/pages/form-editor.init.js') }}"></script> --}}
        <script src="{{ URL::asset('build/tinymce/tinymce.min.js') }}"></script>
        <script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

        <script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
        <script src="{{ URL::asset('build/js/pages/ecommerce-product-create.init.js') }}"></script>
        <script src="{{ URL::asset('build/js/app.js') }}"></script>

        <script>
            // Aperçu et suppression de l'image à propos
            $('#formFile').on('change', function(e) {
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
                $('#formFile').val('');
                $('#previewImage').attr('src', '#').hide();
                $(this).hide();
            });

            //Aperçu et suppression de l'image à propos
            $('#formFile2').on('change', function(e) {
                const [file] = this.files;
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#previewImage2').attr('src', e.target.result).show();
                        $('#removeImageBtn2').show();
                    }
                    reader.readAsDataURL(file);
                } else {
                    $('#previewImage2').hide();
                    $('#removeImageBtn2').hide();
                }
            });

            $('#removeImageBtn2').on('click', function() {
                $('#formFile2').val('');
                $('#previewImage2').attr('src', '#').hide();
                $(this).hide();
            });
        </script>
    @endsection
@endsection
