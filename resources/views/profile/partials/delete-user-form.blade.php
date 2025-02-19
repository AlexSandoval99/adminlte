<div class="card border-danger">
    <div class="card-body">
        <p class="text-muted">
            {{ __('Una vez eliminada tu cuenta, todos tus datos serán eliminados permanentemente. Asegúrate de descargar cualquier información importante antes de continuar.') }}
        </p>

        <!-- Botón para abrir el modal -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmUserDeletionModal">
            {{ __('Eliminar Cuenta') }}
        </button>
    </div>
</div>

<!-- Modal de Confirmación -->
<div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" role="dialog" aria-labelledby="confirmUserDeletionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="confirmUserDeletionLabel">{{ __('Confirmar Eliminación de Cuenta') }}</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{ __('¿Estás seguro de que deseas eliminar tu cuenta? Esta acción no se puede deshacer.') }}</p>
                <p>{{ __('Introduce tu contraseña para confirmar la eliminación.') }}</p>

                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="form-group">
                        <label for="delete_password">{{ __('Contraseña') }}</label>
                        <input id="delete_password" name="password" type="password" class="form-control" placeholder="{{ __('Contraseña') }}" required>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancelar') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('Eliminar Cuenta') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
