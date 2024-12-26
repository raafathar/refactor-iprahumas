<x-app-layout>

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
        <img src="{{ Storage::url($berita->b_image) }}" class="object-fit-cover" style="height: 30rem" alt="Cover Berita">
        {!! $berita->b_content !!}
    </div>
</x-app-layout>
