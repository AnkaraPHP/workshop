@extends("layout.master")

@section('body.class', 'app flex-row align-items-center')

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-group mb-0">
                    <div class="card p-4">
                        <div class="card-block">
                            <h1>Giriş Yap</h1>
                            <p class="text-muted">Hesabınıza giriş yapın</p>
                            @include("include.errors")
                            {!! Form::open(["route" => "auth.login"]) !!}
                                <div class="input-group mb-3"><span class="input-group-addon"><i class="icon-user"></i></span>
                                    {!! Form::email("email", old("email"), ["placeholder" => "E-Posta Adresi", "required", "class" => "form-control"]) !!}
                                </div>
                                <div class="input-group mb-4"><span class="input-group-addon"><i class="icon-lock"></i></span>
                                    {!! Form::password("password", ["placeholder" => "Parola", "required", "class" => "form-control"]) !!}
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        {!! Form::button("Giriş Yap", ["type" => "submit", "class" => "btn btn-primary px-4"]) !!}
                                    </div>
                                    <div class="col-6 text-right"><a href="forgot.html" class="btn btn-link px-0">Parolamı Unuttum?</a></div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div style="width:44%" class="card card-inverse card-primary py-5 d-md-down-none">
                        <div class="card-block text-center">
                            <div>
                                <h2>Takım Oluştur</h2>
                                <p>Geliştirme takımınız ile projelerinizi planlayabilir, gerekli görev dağıtımını yapabilir ve hatta dosya depolayabilirsiniz.</p>
                                <a href="{{ route('auth.register') }}" class="btn btn-primary active mt-3">Hemen Takım Oluştur!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop