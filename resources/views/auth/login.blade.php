@extends('layouts.auth')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Admin</b>LTE</a>
    </div>

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Inicia sesión</p>

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Correo" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">Recordarme</label>
                        </div>
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                    </div>
                </div>
            </form>

            <!-- BOTÓN PARA ABRIR EL MODAL -->
            <p class="mb-1 text-center">
                <a href="#" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">¿Olvidaste tu contraseña?</a>
            </p>
        </div>
    </div>
</div>

<!-- MODAL PARA RECUPERAR CONTRASEÑA -->
<div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="forgotPasswordModalLabel">Recuperar contraseña</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="forgotPasswordForm">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Ingresa tu correo" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div id="forgotPasswordMessage" class="text-success text-center"></div>
                    <button type="submit" class="btn btn-primary btn-block">Enviar enlace</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function(){
        $('#forgotPasswordForm').submit(function(e){
            e.preventDefault();

            var form = $(this);
            var actionUrl = "{{ route('password.email') }}";

            $.ajax({
                type: "POST",
                url: actionUrl,
                data: form.serialize(),
                success: function(response) {
                    $('#forgotPasswordMessage').html('Correo enviado con éxito.');
                    setTimeout(() => {
                        $('#forgotPasswordModal').modal('hide');
                        $('#forgotPasswordMessage').html('');
                    }, 2000);
                },
                error: function() {
                    $('#forgotPasswordMessage').html('<span class="text-danger">Error al enviar correo.</span>');
                }
            });
        });
    });
</script>
@endsection
