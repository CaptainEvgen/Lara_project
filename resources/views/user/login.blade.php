@extends('layouts.app')
@extends('sections.footer')
@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                    <div class="card-body">
                        <form action="/login" method="post" class="form">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputEmail" type="tel"  name="telephone_number" placeholder="name@example.com" />
                                <label for="inputEmail">Введите логин</label>
                            </div>
                            @error('telephone_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-floating mb-3">
                                <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Password" />
                                <label for="inputPassword">Введите пароль</label>
                            </div>
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <a class="small" href="password.html"> </a>
                                <input class="btn btn-primary" type="submit" value="Войти">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small"><a href="/register">Нужен аккаунт? Зарегестрируйся!</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
