@extends('layouts.admin')

@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Добавить продукт</h3></div>
                        <div class="card-body">
                            <form action="/newProduct" method="post" class="form" enctype="multipart/form-data">
                                @csrf

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" type="text"  name="name"  />
                                    <label for="name">Название блюда</label>
                                </div>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="description" type="text"  name="description"  />
                                    <label for="description">Описание блюда</label>
                                </div>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="price" type="text"  name="price"  />
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
                                    <div class="d-grid"><input type="submit" class="btn btn-primary btn-block" value="Добавить продукт"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection


