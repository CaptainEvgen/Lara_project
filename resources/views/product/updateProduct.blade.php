
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>New Product</title>
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        @if(Session::has('message'))
            <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form action="/newProduct" method="post" class="form" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="name" type="text"  name="name" value="{{$name}}" />
                                                <label for="name">Название блюда</label>
                                            </div>
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="description" type="text"  name="description"  value="{{$description}}"/>
                                                <label for="description">Описание блюда</label>
                                            </div>
                                            @error('description')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="price" type="text"  name="price"  value="{{$price}}" />
                                                <label for="price">Цена за 1 единицу/порцию</label>
                                            </div>
                                            @error('price')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="mb-3">
                                                <label for="photo" class="form-label">Изображение блюда</label>
                                                <input class="form-control" type="file" id="photo" name="photo">
                                              </div>
                                            @error('photo')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input type="submit" class="btn btn-primary btn-block" value="Обновить продукт"></div>
                                            </div>
                                        </form>
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

    </body>
</html>

