<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/css/ckeditor5.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/ckeditor5-premium-features.css') }}">
    @endpush

    <x-breadcrumb :items="['Data Master', 'Tambah Berita']" />

    <div class="card card-body" style="height: auto">


        <form action="{{ route('beritas.update', $berita->id) }}" id="berita-form" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="d-flex justify-content-end mb-3">
                <button class="btn btn-primary" onclick="onUpdate(event)">Ubah Berita</button>
            </div>
            {{-- Judul --}}
            <div class="form-group mb-3">
                <label for="b_title">Judul Berita</label>
                <input id="b_title" name="b_title" value="{{ old('b_title') ?? $berita->b_title }}" type="text"
                    class="form-control">
                <x-input-error messages="{{ $errors->first('b_title') }}" />
            </div>

            {{-- Gambar --}}
            <div class="mb-3">
                <label for="b_image">Gambar Berita</label>
                <input name="b_image" class="form-control" type="file" id="formFile">

                <img id="b_image-update" src="{{ asset('storage/' . $berita->b_image) }}" class="img-thumbnail"
                    alt="Cover Berita">
                <x-input-error messages="{{ $errors->first('b_image') }}" />
            </div>

            {{-- Tanggal Berita --}}
            <div class="mb-3">
                <div class="form-group">
                    <label for="b_date">Tanggal Berita</label>
                    <input id="b_date" name="b_date" type="date" class="form-control"
                        value="{{ old('b_date') ?? $berita->b_date }}">
                </div>
                <x-input-error messages="{{ $errors->first('b_date') }}" />
            </div>

            {{-- is Active --}}
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" name="b_is_active" type="checkbox" id="color-primary"
                    {{ $berita->b_is_active == 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="color-primary">Aktif</label>
            </div>
            <x-input-error messages="{{ $errors->first('b_is_active') }}" />

            {{-- Editor --}}
            <div class="form-group" style="height: 50rem">
                <textarea id="editor" name="b_content">{{ old('b_content') ?? $berita->b_content }}</textarea>
                <x-input-error messages="{{ $errors->first('b_content') }}" />
            </div>

        </form>
    </div>


    @push('scripts')
        <script src="{{ asset('assets/libs/ckeditor5/ckbox.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/toastr-init.js') }}"></script>
        <script src="{{ asset('assets/js/dashboards/app.helper.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/libs/select2/dist/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('assets/libs/select2/dist/js/select2.min.js') }}"></script>
        <script src="{{ asset('assets/libs/sweetalert2/js/sweetalert2.min.js') }}"></script>
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
        <script src="{{ asset('assets/js/feature/datamaster/berita.js') }}"></script>
    @endpush

</x-app-layout>
