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

    <x-breadcrumb :items="['Data Master', 'Tambah Berita']" />

    <div class="card card-body">
        <form action="{{ route('beritas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-end mb-3">
                <button class="btn btn-primary">Tambah Berita</button>
            </div>
            {{-- Judul --}}
            <div class="form-group mb-3">
                <label for="b_title">Judul Berita</label>
                <input id="b_title" name="b_title" value="{{ old('b_title') }}" type="text" class="form-control">
                <x-input-error messages="{{ $errors->first('b_title') }}" />
            </div>

            {{-- Gambar --}}
            <div class="mb-3">
                <label for="b_image">Gambar Berita</label>
                <input name="b_image" class="form-control" type="file" id="formFile">
                <x-input-error messages="{{ $errors->first('b_image') }}" />
            </div>

            {{-- Tanggal Berita --}}
            <div class="mb-3">
                <div class="form-group">
                    <label for="b_date">Tanggal Berita</label>
                    <input id="b_date" name="b_date" type="date" class="form-control"
                        value="{{ old('b_date') }}">
                </div>
                <x-input-error messages="{{ $errors->first('b_date') }}" />
            </div>

            {{-- is Active --}}
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" name="b_is_active" type="checkbox" id="color-primary" checked>
                <label class="form-check-label" for="color-primary">Aktif</label>
            </div>
            <x-input-error messages="{{ $errors->first('b_is_active') }}" />

            {{-- Editor --}}
            <textarea id="editor" name="b_content">{{ old('b_content') }}</textarea>
            <x-input-error messages="{{ $errors->first('b_content') }}" />

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
