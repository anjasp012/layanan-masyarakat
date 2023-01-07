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

                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role_id" id="staff" value="2">
                                    <label class="form-check-label" for="staff">
                                        staff
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role_id" id="anggota" value="3">
                                    <label class="form-check-label" for="anggota">
                                        anggota
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="role_id" id="relawan" value="3">
                                    <label class="form-check-label" for="relawan">
                                        relawan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Next') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
