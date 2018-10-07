@if (isset($errors) && $errors->any())
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Ошибка!</h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif

@if (Session::has('message'))
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="alert alert-info" role="alert">
                    <h4 class="alert-heading">Информация!</h4>
                    <p>{{ Session::get('message') }}</p>
                </div>
            </div>
        </div>
    </div>
@endif
