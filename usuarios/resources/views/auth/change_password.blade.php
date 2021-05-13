<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Siverdeguello</title>
    <!-- base:css -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- base:css -->
    <link rel="stylesheet" href="../../../css/template.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left p-3">
                            <div class="brand-logo">
                                <img src="../../../../images/logo.png" alt="logo">
                            </div>
                            <h4>Siverdeguello</h4>
                            <h6 class="font-weight-light">Administracion de Siverdeguello</h6>
                            <form class="pt-3" method="post" id="form-change-password"action="<?php echo route($ruta) ?>">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail">Escriba su contraseña nueva</label>
                                    <div class="input-group{{ $errors->has('email' ? 'is-invalid' : '') }}">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="typcn typcn-user-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg border-left-0" id="email" name="email" value="{{ $email }}" required autocomplete="email" autofocus placeholder="Contraseña">
                                        {!!$errors->first('email','<span class="invalid-feedback">:message</span>')!!}
                                    </div>
                                    <input type="hidden" name="token" value="{{$token}}">
                                    <br>
                                    <div class="input-group{{ $errors->has('password1' ? 'is-invalid' : '') }}">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="typcn typcn-user-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control form-control-lg border-left-0" id="password1" name="password1" value="{{ old('password1') }}" required autocomplete="password1" autofocus placeholder="Contraseña">
                                        {!!$errors->first('password1','<span class="invalid-feedback">:message</span>')!!}
                                    </div>
                                    <br>
                                     <div class="input-group{{ $errors->has('password2' ? 'is-invalid' : '') }}">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="typcn typcn-user-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control form-control-lg border-left-0" id="password2" name="password2" value="{{ old('password2') }}" required autocomplete="password2" autofocus placeholder="Confirmar Contraseña">
                                        {!!$errors->first('password2','<span class="invalid-feedback">:message</span>')!!}
                                    </div>
                                    <br>
                                    <div>
                                        Retunt Login <a class="text-primary" href="{{ url('/') }}">Click Aqui</a>
                                    </div>
                                </div>
                                <div class="my-3">
                                    <button type="button" id="btn-send-change" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">CAMBIAR</button>
                                </div>
                                <div class="alert alert-danger alert-change-danger" role="alert" style="display: none">
                                    <p class="mb-0">Las contraseñas no coinciden.</p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 login-half-bg d-flex flex-row">
                        <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2020  Todos los Derechos Reservados.</p>
                    </div>
                </div>
            </div>
        <!-- content-wrapper ends -->
        </div>
    <!-- page-body-wrapper ends -->
    </div>


    <div>

    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <!-- plugin js for this page -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#btn-send-change').click(function(){
                var password1 = $('#password1').val(); 
                var password2 = $('#password2').val(); 

                if((password1 == password2) && (password1 != '' && password2 != ''))
                {
                    $('.alert-change-danger').css('display', 'none');
                    $('#form-change-password').submit();
                }
                else
                {
                    if(password1 == '' && password2 == '')
                    {
                        $('.alert-change-danger').css('display', 'block');
                        $('.alert-change-danger').text('Por favor complete las contraseñas');
                    }

                    if(password1 != password2)
                    {
                        $('.alert-change-danger').css('display', 'block');
                        $('.alert-change-danger').text('Las contraseñas no coinciden');
                    }
                }
            })
        });

    </script>
    <!-- End custom js for this page-->
</body>

</html>