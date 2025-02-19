<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ __('Información del Perfil') }}</h3>
    </div>
    <div class="card-body">
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')

            <div class="form-group">
                <label for="name">{{ __('Nombre') }}</label>
                <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">{{ __('Correo Electrónico') }}</label>
                <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-2">
                        <p class="text-muted">
                            {{ __('Tu correo no ha sido verificado.') }}
                            <button form="send-verification" class="btn btn-link p-0">
                                {{ __('Haz clic aquí para reenviar el correo de verificación.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="text-success">
                                {{ __('Un nuevo enlace de verificación ha sido enviado a tu correo.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">{{ __('Guardar Cambios') }}</button>

                @if (session('status') === 'profile-updated')
                    <span class="text-success ml-3">{{ __('Guardado.') }}</span>
                @endif
            </div>
        </form>
    </div>
</div>
