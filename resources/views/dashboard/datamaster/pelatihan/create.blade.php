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

    <x-breadcrumb :items="['Data Master', 'Pelatihan']" />

    <div class="card card-body">
        <form action="{{ route('trainings.store') }}" id="training-form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-end mb-3">
                <button onclick="onSubmit(event)" class="btn btn-primary">Tambah Pelatihan</button>
            </div>

            {{-- 1 --}}
            <div class="row">
                {{-- Judul {p_title} --}}
                <div class="col">
                    <div class="form-group mb-3">
                        <x-input-label for="p_title" :value="__('Judul Pelatihan')" required />
                        <x-text-input id="p_title" type="text" name="p_title" :value="old('p_title')" required
                            autofocus autocomplete="name" />
                        <x-input-error messages="{{ $errors->first('p_title') }}" />
                    </div>
                </div>

                <div class="col">
                    {{-- Location {p_location} --}}
                    <div class="mb-3">
                        <x-input-label for="p_location" :value="__('Lokasi')" required />
                        <x-text-input id="p_location" type="text" name="p_location" :value="old('p_location')" required
                            autofocus autocomplete="name" />
                        <x-input-error messages="{{ $errors->first('p_location') }}" />
                    </div>
                </div>
            </div>

            {{-- 2 --}}
            <div class="row">
                {{-- Tanggal mulai {p_start_date} --}}
                <div class="col">
                    <div class="form-group mb-3">
                        <x-input-label for="p_start_date" :value="__('Tanggal Mulai')" required />
                        <x-text-input id="p_start_date" type="datetime-local" name="p_start_date" :value="old('p_start_date')" required
                            autofocus autocomplete="name" />
                        <x-input-error messages="{{ $errors->first('p_start_date') }}" />
                    </div>
                </div>

                <div class="col">
                    {{-- Tanggal Berakhir {p_end_date} --}}
                    <div class="mb-3">
                        <x-input-label for="p_end_date" :value="__('Tanggal Berakhir')" required />
                        <x-text-input id="p_end_date" type="datetime-local" name="p_end_date" :value="old('p_end_date')" required
                            autofocus autocomplete="name" />
                        <x-input-error messages="{{ $errors->first('p_end_date') }}" />
                    </div>
                </div>
            </div>

            {{-- 3 --}}
            <div class="row">
                {{-- Pelaksanaan VIA {p_type_training} --}}
                <div class="col">
                    <div class="form-group mb-3">
                        <x-input-label for="p_type_training" :value="__('Tanggal Berakhir')" required />
                        <select id="p_type_training" name="p_type_training" value="{{ old('p_type_training') }}"
                            type="text" class="form-control">
                            <option selected disabled>-- Pilih Jenis Pelatihan --</option>
                            <option value="offline" {{ old('p_type_training') == 'offline' ? 'selected' : '' }}>Luring
                            </option>
                            <option value="online" {{ old('p_type_training') == 'online' ? 'selected' : '' }}>Daring
                            </option>
                        </select>
                        <x-input-error messages="{{ $errors->first('p_type_training') }}" />
                    </div>
                </div>

                <div class="col">
                    {{-- Cakupan Forum {p_forum_scale} --}}
                    <div class="mb-3">
                        <x-input-label for="p_forum_scale" :value="__('Forum')" required />
                        <select name="p_forum_scale" class="form-control" type="text">
                            <option selected disabled>-- Pilih Cakupan Forum --</option>
                            <option value="internal" {{ old('p_forum_scale') == 'internal' ? 'selected' : '' }}>
                                Internal</option>
                            <option value="eksternal" {{ old('p_forum_scale') == 'eksternal' ? 'selected' : '' }}>
                                Eksternal</option>
                        </select>
                        <x-input-error messages="{{ $errors->first('p_forum_scale') }}" />
                    </div>
                </div>
            </div>

            {{-- 4 --}}
            <div class="row">
                <div class="col">
                    {{-- Kuota {p_kuota} --}}
                    <div class="mb-3">
                        <div class="form-group">
                            <x-input-label for="p_kuota" :value="__('Kuota')" required />
                            <x-text-input id="p_kuota" type="number" name="p_kuota" :value="old('p_kuota')" required
                                autofocus autocomplete="name" />
                            <x-input-error messages="{{ $errors->first('p_kuota') }}" />
                        </div>
                    </div>
                </div>

                <div class="col">
                    {{-- Gambar Pelatihan {p_image} --}}
                    <div class="mb-3">
                        <div class="form-group">
                            <x-input-label for="p_image" :value="__('Gambar Pelatihan')" required />
                            <x-text-input id="p_image" type="file" name="p_image" :value="old('p_image')" required
                                autofocus autocomplete="name" />
                            <x-input-error messages="{{ $errors->first('p_image') }}" />
                        </div>
                    </div>
                </div>
            </div>


            {{-- is Active --}}
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" name="p_is_public" type="checkbox" id="color-primary" checked>
                <label class="form-check-label" for="color-primary">Public</label>
            </div>
            <x-input-error messages="{{ $errors->first('p_is_public') }}" />

            {{-- Editor --}}
            <textarea id="editor" name="p_content">
                @if (old('p_content') == null)
@include('dashboard.datamaster.pelatihan.default-value')
@else
{{ old('p_content') }}
@endif
</textarea>
            <x-input-error messages="{{ $errors->first('p_content') }}" />

        </form>
    </div>


    @push('scripts')
        <script src="{{ asset('assets/js/plugins/toastr-init.js') }}"></script>
        <script src="{{ asset('assets/js/dashboards/app.helper.js') }}"></script>
        <script src="{{ asset('assets/js/components/form.js') }}"></script>
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
        <script src="{{ asset('assets/js/feature/datamaster/training.js') }}" type="module"></script>
        <script src="{{ asset('assets/js/form/editor.js') }}" type="module"></script>
    @endpush

</x-app-layout>
