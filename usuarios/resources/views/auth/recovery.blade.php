@extends('auth.contenido_recovery')

@section('recovery')

<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="{{asset('images/logo.png')}}" alt="logo">
              </div>
              <h4>Papel Notarial</h4>
              <h6 class="font-weight-light">Administracion de Papel Notarial</h6>
                <form class="pt-3" method="post" action="{{route('password.create')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail">Para Recuperar Contraseña Registre Correo Asociado</label>
                        <div class="input-group{{ $errors->has('email' ? 'is-invalid' : '') }}">
                            <div class="input-group-prepend bg-transparent">
                                <span class="input-group-text bg-transparent border-right-0">
                                <i class="typcn typcn-user-outline text-primary"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control form-control-lg border-left-0" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                            {!!$errors->first('email','<span class="invalid-feedback">:message</span>')!!}
                        </div>
                        <br>
                        <div>
                            Volver a iniciar sesión <a class="text-primary" href="{{ url('/') }}">Click Aqui</a>
                        </div>
                    </div>
                    <div class="my-3">
                        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">ENVIAR</button>
                    </div>

                    @if(count($errors) > 0)
                      <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $error)
                            <p class="mb-0">{{ $error }}</p>
                        @endforeach
                      </div>
                    @endif
                    @if(session('alert'))
                      <div class="alert alert-success" role="alert">
                        <p class="mb-0">Se ha enviado un correo.</p>
                      </div>
                    @endif
                    @if(session('exito'))
                      <div class="alert alert-success" role="alert">
                        <p class="mb-0">Se ha cambiado la contraseña con exito.</p>
                      </div>
                    @endif
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

@endsection