@extends('layouts.admin')

@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Добавить продукт</h3></div>
                        <div class="card-body">
                            <div class="message"></div>
                            <form action="{{route('product.store')}}" method="post" class="form addNewProduct" enctype="multipart/form-data">
                                @csrf

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" type="text"  name="name"  />
                                    <label for="name">Название блюда</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="description" type="text"  name="description"  />
                                    <label for="description">Описание блюда</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="price" type="text"  name="price"  />
                                    <label for="price">Цена за 1 единицу/порцию</label>
                                </div>
                                <div class="mb-3">
                                    <label for="photo" class="form-label">Изображение блюда</label>
                                    <input class="form-control" type="file" id="photo" name="photo">
                                </div>
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

@section('script')
    <script>
        let form = document.querySelector('.addNewProduct');
        let message = document.querySelector('.message');
        let url =  "{{route('product.store')}}";
        let text = 'Продукт успешно добавлен';
        fetchSendForm(form, url, message, text);
    </script>
@endsection
