@extends("layout.master")

@section('body.class', 'app flex-row align-items-center')

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mx-4">
                    <div class="card-block p-4">
                        <h1>Takım Oluştur</h1>
                        <p class="text-muted">Takım hesabınızı ve kişisel hesabınızı hemen oluşturun.</p>
                        @include("include.errors")
                        {!! Form::open(["route" => "auth.register"]) !!}
                            <div class="input-group mb-3"><span class="input-group-addon"><i class="icon-briefcase"></i></span>
                                {!! Form::text("team", old("team"), ["class" => "form-control", "required", "placeholder" => "Takım İsmi"]) !!}
                            </div>
                        <div class="input-group mb-3"><span class="input-group-addon"><i class="icon-user"></i></span>
                            {!! Form::text("name", old("name"), ["class" => "form-control", "required", "placeholder" => "Ad Soyad"]) !!}
                        </div>
                            <div class="input-group mb-3"><span class="input-group-addon"><i class="icon-envelope"></i></span>
                                {!! Form::email("email", old("email"), ["class" => "form-control", "required", "placeholder" => "E-Posta Adresi"]) !!}
                            </div>
                            <div class="input-group mb-3"><span class="input-group-addon"><i class="icon-lock"></i></span>
                                {!! Form::password("password", ["class" => "form-control", "required", "placeholder" => "Parola"]) !!}
                            </div>
                            <div class="input-group mb-4"><span class="input-group-addon"><i class="icon-lock"></i></span>
                                {!! Form::password("password_confirmation", ["class" => "form-control", "required", "placeholder" => "Parola Onay"]) !!}
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    {!! Form::button("Takım Oluştur", ["class" => "btn btn-primary px-4", "type" => "submits"]) !!}
                                </div>
                                <div class="col-6 text-right"><a href="{{ route('auth.login') }}" class="btn btn-link px-0">Giriş Yap</a></div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop