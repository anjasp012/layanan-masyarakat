@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register.store.step-0') }}" novalidate enctype="multipart/form-data">
                        @csrf
                        <div class="row align-items-end">
                            <div class="col-md-3 col-6">
                                <input type="submit" hidden name="role_id" id="staff" value="2">
                                <label class="form-check-label" for="staff">
                                    <div class="card text-center border-0" style="cursor: pointer;">
                                        <img src="/assets/img/menu/staff.png" class="card-img-top" alt="...">
                                        <h3 class="card-footer border-0 bg-transparent fw-bold">
                                            Staff
                                        </h3>
                                    </div>
                                </label>
                            </div>
                            <div class="col-md-3 col-6">
                                <input type="submit" hidden name="role_id" id="anggota" value="3">
                                <label class="form-check-label" for="anggota">
                                    <div class="card text-center border-0" style="cursor: pointer;">
                                        <img src="/assets/img/menu/anggota.jpg" class="card-img-top" alt="...">
                                        <h3 class="card-footer border-0 bg-transparent fw-bold">
                                            Anggota
                                        </h3>
                                    </div>
                                </label>
                            </div>
                            <div class="col-md-3 col-6">
                                <input type="submit" hidden name="role_id" id="relawan" value="4">
                                <label class="form-check-label" for="relawan">
                                    <div class="card text-center border-0" style="cursor: pointer;">
                                        <img src="/assets/img/menu/relawan.png" class="card-img-top" alt="...">
                                        <h3 class="card-footer border-0 bg-transparent fw-bold">
                                            Relawan
                                        </h3>
                                    </div>
                                </label>
                            </div>
                            <div class="col-md-3 col-6">
                                <input type="submit" hidden name="role_id" id="pelanggan" value="5">
                                <label class="form-check-label" for="pelanggan">
                                    <div class="card text-center border-0" style="cursor: pointer;">
                                        <img src="/assets/img/menu/pelanggan.png" class="card-img-top" alt="...">
                                        <h3 class="card-footer border-0 bg-transparent fw-bold">
                                            Pelanggan
                                        </h3>
                                    </div>
                                </label>
                            </div>
                        </div>
                        {{-- <div class="row mb-3 justify-content-center">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role_id" id="staff" value="2">
                                    <label class="form-check-label" for="staff">
                                    Staff
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role_id" id="anggota" value="3">
                                    <label class="form-check-label" for="anggota">
                                        Anggota
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role_id" id="relawan" value="4">
                                    <label class="form-check-label" for="relawan">
                                        Relawan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role_id" id="pelanggan" value="5">
                                    <label class="form-check-label" for="pelanggan">
                                        Pelanggan
                                    </label>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Next') }}
                                </button>
                            </div>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
