@extends("layouts.app")

@section("content")
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- Card --}}
            <div class="card shadow rounded">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">{{ __("messages.my_profile") }}</h4>
                </div>
                <div class="card-body">
                    {{-- Flash message --}}
                    @if(session("success"))
                        <div class="alert alert-success">
                            {{ session("success") }}
                        </div>
                    @endif

                    {{-- Profile details --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">{{ __("messages.name") }}</label>
                        <p class="form-control-plaintext">{{ $user->name }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">{{ __("messages.email") }}</label>
                        <p class="form-control-plaintext">{{ $user->email }}</p>
                    </div>

                    {{-- Tambahkan field lainnya di sini jika perlu --}}

                    {{-- Edit Button --}}
                    <a href="{{ route("user.profile.edit") }}" class="btn btn-outline-primary">
                        <i class="fas fa-edit me-1"></i> {{ __("messages.edit_profile") }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


