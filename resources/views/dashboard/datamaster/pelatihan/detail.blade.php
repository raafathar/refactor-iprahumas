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
    <x-breadcrumb :items="['Data Master', 'Detail Pelatihan']" />

    <div class="card card-body text-center">
        <h2> <strong>{{ $training->p_title }}</strong></h2>
    </div>

    <div class="card card-body">
        <div class="w-100">
            <div class="mb-3">
                <i class="fs-4 ti ti-calendar"></i>
                {{ \Carbon\Carbon::parse($training->p_start_date)->isoFormat('d MMMM Y HH:mm:ss') . ' ' . $zona . ' - ' . \Carbon\Carbon::parse($training->p_end_start)->isoFormat('d MMMM Y HH:mm:ss') . ' ' . $zona }}
            </div>
            <div class="mb-3">
                Location :
                {{ $training->p_location }}
            </div>
            <div class="mb-3">
                <i class="fs-4 ti ti-calendar"></i>
                {{ $training->p_status }}
            </div>
            <div class="mb-3">
                <i class="fs-4 ti ti-calendar"></i>
                {{ $training->p_forum_scale }}
            </div>
        </div>
    </div>

    <div class="card card-body">
        <img src="{{ asset('storage/' . $training->p_image) }}" class="object-fit-cover" style="height: 30rem"
            alt="Cover Berita">
        <div id="contain-editor">
            {!! $training->p_content !!}
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
