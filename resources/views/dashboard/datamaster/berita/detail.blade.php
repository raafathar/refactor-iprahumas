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
    <x-breadcrumb :items="['Data Master', 'Detail Berita']" />

    <div class="card card-body text-center">
        <h2> <strong>{{ $berita->b_title }}</strong></h2>
        <div class="w-100 d-flex gap-3">
            <div>
                <i class="fs-4 ti ti-user"></i>
                {{ $berita->user->name }}
            </div>
            <div>
                <i class="fs-4 ti ti-calendar"></i>
                {{ \Carbon\Carbon::parse($berita->b_date)->isoFormat('d MMMM Y') }}
            </div>
        </div>
    </div>

    <div class="card card-body">
        <img src="{{ Storage::url($berita->b_image) }}" class="object-fit-cover" style="height: 30rem"
            alt="Cover Berita">
        <div id="contain-editor">
            {!! $berita->b_content !!}
        </div>
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
