<x-app-layout>

    <x-breadcrumb :items="['Pengaturan', 'Pengaturan Akun']" />

    <div class="card card-body">
        @include('dashboard.setting.account.form')
    </div>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/libs/select2/dist/css/select2.min.css') }}">
        <link id="themeColors" rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/css/sweetalert2.min.css') }}" />
    @endpush

    @push('scripts')
        <script src="{{ asset('assets/js/plugins/toastr-init.js') }}"></script>
        <script src="{{ asset('assets/js/dashboards/app.helper.js') }}"></script>
        <script src="{{ asset('assets/libs/select2/dist/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('assets/libs/select2/dist/js/select2.min.js') }}"></script>
        <script src="{{ asset('assets/libs/sweetalert2/js/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('assets/js/feature/setting/account-setting.js') }}"></script>
    @endpush
</x-app-layout>
