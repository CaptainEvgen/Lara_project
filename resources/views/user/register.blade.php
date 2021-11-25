
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form action="/register" method="post" class="form">
                                            @csrf
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" name="first_name"  placeholder="Enter your first name" value="{{old('first_name')}}"/>
                                                        <label for="inputFirstName">Имя</label>
                                                    </div>
                                                    @error('first_name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" type="text" name="last_name" placeholder="Enter your last name" value="{{old('last_name')}}"/>
                                                        <label for="inputLastName">Фамилия</label>
                                                    </div>
                                                    @error('last_name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="tel"  name="telephone_number" placeholder="0501234567" value="{{old('telephone_number')}}"/>
                                                <label for="inputEmail">Ваш номер телефона</label>
                                            </div>
                                            @error('telephone_number')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Create a password" />
                                                        <label for="inputPassword">Пароль</label>
                                                    </div>
                                                    @error('password')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" type="password"  name="password_confirm" placeholder="Confirm password" />
                                                        <label for="inputPasswordConfirm">Подтвердите пароль</label>
                                                    </div>
                                                    @error('password_confirm')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><div class="btn btn-primary btn-block manager">Я менеджер ресторана</div></div>
                                            </div>
                                            <div class="form-floating mb-3 manager-input hide">
                                                <input class="form-control" id="inputName" type="text"  name="name"  value="{{old('name')}}"/>
                                                <label for="inputName">Название ресторана</label>
                                            </div>
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-floating mb-3 manager-input hide">
                                                <input class="form-control" id="inputloc" type="text"  name="location_name" value="{{old('location_name')}}"/>
                                                <label for="inputloc">Местонахождение</label>
                                            </div>
                                            @error('location_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input type="submit" class="btn btn-primary btn-block" value="Создать аккаунт"></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="/login">Есть аккаунт? Войти</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script>
            document.querySelector('.manager').addEventListener('click', ()=>{
                let arr = document.querySelectorAll('.manager-input');
                for(let elem of arr){
                    console.log(elem);
                    elem.classList.toggle('hide');
                }
            })
        </script>
    </body>
</html>

