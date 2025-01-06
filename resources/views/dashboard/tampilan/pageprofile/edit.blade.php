<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/css/ckeditor5.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/ckeditor5-premium-features.css') }}">
    @endpush

    <x-breadcrumb :items="['Tampilan', 'Edit Halaman']" />

    <div class="card card-body" style="height: auto">


        <form action="{{ route('page-profile.update', $page->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="d-flex justify-content-end mb-3">
                <button class="btn btn-primary">Ubah Halaman</button>
            </div>
            {{-- Judul --}} 
            <div class="form-group mb-3">
                <x-input-label for="p_title" :value="__('Judul Halaman')" required />
                <x-text-input id="p_title" type="text" name="p_title" :value="old('p_title', $page->p_title)" required
                    autofocus autocomplete="name" />
                <x-input-error messages="{{ $errors->first('p_title') }}" />
            </div>

            {{-- Gambar --}}
            <div class="mb-3">
                
                <x-input-label for="p_image" :value="__('Gambar Halaman')" required />
                <input name="p_image" class="form-control" type="file" id="formFile">
                
                <img src="{{ Storage::url($page->p_image) }}" class="img-thumbnail shadow-none my-3" alt="Cover page">
                <x-input-error messages="{{ $errors->first('p_image') }}" />
            </div>

            {{-- is Active --}}
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" name="p_is_active" type="checkbox" id="color-primary"
                    {{ $page->p_is_active == 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="color-primary">Aktif</label>
            </div>
            <x-input-error messages="{{ $errors->first('p_is_active') }}" />

            {{-- Editor --}}
            <div class="form-group" style="height: 50rem">
                <x-input-label for="editor" :value="__('Isi Halaman')" required />
                <textarea id="editor" name="p_content">{{ old('p_content') ?? $page->p_content }}</textarea>
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
