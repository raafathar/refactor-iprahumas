<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/css/ckeditor5.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/ckeditor5-premium-features.css') }}">
        <style>
            .ck-editor {
                height: 10rem;
            }
        </style>
    @endpush

    <x-breadcrumb :items="['Landing page', 'Tambah halaman']" />

    <div class="card card-body">
        <form action="{{ route('page-profile.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="d-flex justify-content-end mb-3">
                <button class="btn btn-primary">Tambah Halaman</button>
            </div>

            {{-- Judul --}}
            <div class="form-group mb-3">
                <x-input-label for="p_title" :value="__('Judul Halaman')" required />
                <x-text-input id="p_title" type="text" name="p_title" :value="old('p_title')" required
                    autofocus autocomplete="name" />
                <x-input-error messages="{{ $errors->first('p_title') }}" />
            </div>

            {{-- Gambar --}}
            <div class="form-group mb-3">
                <x-input-label for="p_image" :value="__('Upload Cover Halaman (JPEG, PNG, JPG)')" required />
                <x-text-input id="formFile" type="file" name="p_image" :value="old('p_image')" required
                    autofocus autocomplete="name" />
                <x-input-error messages="{{ $errors->first('p_image') }}" />
            </div>

            {{-- is Active --}}
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" name="p_is_active" type="checkbox" id="color-primary" checked>
                <label class="form-check-label" for="color-primary">Aktif</label>
            </div>
            <x-input-error messages="{{ $errors->first('p_is_active') }}" />

            {{-- Editor --}}
            <div class="form-group mb-3">
                <x-input-label for="editor" :value="__('Isi Halaman')" required />
                <textarea id="editor" name="p_content">{{ old('p_content') }}</textarea>
                <x-input-error messages="{{ $errors->first('p_content') }}" />
            </div>

        </form>
    </div>


    @push('scripts')
        <script src="{{ asset('assets/libs/ckeditor5/ckbox.js') }}"></script>
        <script type="importmap">
        {
            "imports": {
            "ckeditor5": "{{ asset("assets/libs/ckeditor5/ckeditor5.js") }}",
            "ckeditor5-premium-features": "{{asset("assets/libs/ckeditor5/ckeditor5-premium-features.js")}}",
            "ckeditor5-premium-features/": "{{asset("assets/libs/ckeditor5/ckeditor5-premium-features.js")}}"
            }
        }
    </script>
        <script src="{{ asset('assets/js/form/editor.js') }}" type="module"></script>
    @endpush

</x-app-layout>
