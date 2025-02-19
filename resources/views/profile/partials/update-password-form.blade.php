<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ __('Actualizar Contraseña') }}</h3>
    </div>
    <div class="card-body">
        <p class="text-muted">
            {{ __('Asegúrate de usar una contraseña larga y segura para proteger tu cuenta.') }}
        </p>

        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="update_password_current_password">{{ __('Contraseña Actual') }}</label>
                <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password">
                @error('current_password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="update_password_password">{{ __('Nueva Contraseña') }}</label>
                <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password">
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="update_password_password_confirmation">{{ __('Confirmar Contraseña') }}</label>
                <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
                @error('password_confirmation')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">{{ __('Guardar Cambios') }}</button>

                @if (session('status') === 'password-updated')
                    <span class="text-success ml-3">{{ __('Guardado.') }}</span>
                @endif
            </div>
        </form>
    </div>
</div>
