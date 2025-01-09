<x-modal-detail />

<div class="modal fade" id="modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
     aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content p-2">
            <form method="POST" id="usersetting-form" action="" class="needs-validation" novalidate
                  enctype="multipart/form-data">
                @csrf
                <div class="modal-header d-flex align-items-center">
                    <h5 class="modal-title" id="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="add-detail-box">
                        <div class="add-detail-content">
                            <input type="hidden" name="_method">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <x-input-label for="name" :value="__('Nama Lengkap')" required />
                                    <x-text-input id="name" type="text" name="name" :value="old('name')"
                                                  required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <x-input-label for="email" :value="__('Email')" required />
                                    <x-text-input id="email" type="email" name="email" :value="old('email')"
                                                  required autofocus autocomplete="email" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <x-input-label for="password" :value="__('Kata Sandi Baru')" required />
                                    <x-text-input id="password" class="block mt-1 w-full" type="password"
                                                  name="password" required />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" required />
                                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                                  name="password_confirmation" required />
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <x-input-label for="role" :value="__('Role')" required />
                                    <select name="role" id="role" class="form-control" required
                                            autocomplete="role">
                                        <option value="" disabled selected>Pilih Role</option>
                                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>
                                            User</option>
                                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>
                                            Admin</option>
                                        <option value="superadmin"
                                            {{ old('role') == 'superadmin' ? 'selected' : '' }}>Superadmin
                                        </option>
                                    </select>
                                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-danger-subtle text-danger"
                            data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" onclick="onSubmit(event)" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
