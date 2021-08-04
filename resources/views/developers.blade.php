<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
        crossorigin="anonymous">

    <title>App4 - Fabricio Carlesso</title>
  </head>
  <body class="text-secondary">
    <div class="modal-backdrop" style="opacity:0.8"></div>
    <div class="container-fluid px-5 pt-4">
        <div class="row">
            <div class="col-md-3 mt-3 pl-0 pr-5">
                <h5 class="border-bottom pb-3 mb-3">
                    {{ (empty(old('id'))) ? 'Cadastrar developer' : 'Atualizar developer'; }} 
                </h5>

                @if($errors->any())
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{$errors->first()}}
                        <button type="button" class="close" data-dismiss="alert">x</button>
                    </div>
                @endif

                @if (empty(old('id')))
                    <form method="post" id="formDeveloper" action="{{ route('developer.create') }}">
                @else
                    <form method="post" id="formDeveloper" action="{{ route('developer.update', old('id')) }}">
                        {{ method_field('PUT') }}
                @endif
                    {{ csrf_field() }}

                    <input type="hidden" name="birthdate" id="birthdate" value="{{ old('birthdate') }}"  />

                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="name">
                                Nome completo
                            </label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="name" 
                                value="{{ old('name') }}" >
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="sex">
                                Sexo
                            </label>
                            <select class="form-control" name="sex">
                                <option>
                                    --
                                </option>
                                <option 
                                    value="M" 
                                    {{( old('sex') == 'M') ? 'selected' : ''}}>
                                    Masculino
                                </option>
                                <option 
                                    value="F" 
                                    {{( old('sex') == 'F') ? 'selected' : ''}}>
                                    Feminino
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 ">
                            <label for="birthdateDay">
                                Data de nascimento
                            </label>
                        </div>
                    </div>
                        
                    <div class="row">
                        <div class="col-3 col-sm-3 col-md-3 form-group mr-0 pr-0 ">
                            <input 
                                type="text" 
                                class="form-control birthdate" 
                                name="birthdateDay" 
                                id="birthdateDay"
                                value="{{ old('birthdateDay') }}" 
                                placeholder="Dia">
                        </div>
                        <div class="col-3 col-sm-3 col-md-3 form-group mr-0 pr-0">
                            <input 
                                type="text" 
                                class="form-control birthdate" 
                                name="birthdateMonth" 
                                id="birthdateMonth"
                                value="{{ old('birthdateMonth') }}" 
                                placeholder="Mês">
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 form-group ml-0">
                            <input 
                                type="text" 
                                class="form-control birthdate" 
                                name="birthdateYear" 
                                id="birthdateYear"
                                value="{{ old('birthdateYear') }}" 
                                placeholder="Ano">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="age">
                                Idade
                            </label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="age"
                                id="age" 
                                value="{{ old('age') }}" 
                                readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="age">
                                Hobby
                            </label>
                        <input 
                                type="text" 
                                class="form-control" 
                                name="hobby" 
                                value="{{ old('hobby') }}">
                        </div>
                    </div>
                        
                    <div class="row">
                        <div class="col-md-12">
                            <button 
                                type="submit" 
                                id="btn-create"
                                class="btn btn-primary float-right ml-2">
                                Salvar
                            </button>

                            <button 
                                type="button" 
                                id="btn-cancel"
                                class="btn btn-danger float-right">
                                Cancelar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="col-md-9 pl-0">                
                <h5 class="pb-2 mt-2 mb-2">
                    Developers
                </h5>

                @if (isset($developers) && $developers->count() > 0)
                    <table class="table table-responsive table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome completo</th>
                                <th class="text-center" scope="col">Sexo</th>
                                <th class="text-center" scope="col">Nascimento</th>
                                <th class="text-center" scope="col">Idade</th>
                                <th scope="col">Hobby</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($developers as $developer)
                                <tr>
                                    <th class="align-middle" scope="row">{{ $developer->id }}</th>
                                    <td class="align-middle">{{ $developer->name }}</td>
                                    <td class="align-middle text-center">
                                        {{( $developer->sex == 'M') ? 'Masculino' : 'Feminino'}}
                                    </td>
                                    <td class="align-middle text-center">
                                        {{ \Carbon\Carbon::parse($developer->birthdate)->format('d/m/Y') }}
                                    </td>
                                    <td class="align-middle text-center">{{ $developer->age }}</td>
                                    <td class="align-middle">{{ $developer->hobby }}</td>
                                    <td>
                                        <a href="{{ route('developer.get', $developer->id) }}"
                                            class="btn btn-success">
                                            Atualizar
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('developer.delete', $developer->id) }}"
                                            class="btn btn-danger">
                                            Apagar
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $developers->links() }}
                @else
                    <p>Nenhum registro cadastrado</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
        crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
        crossorigin="anonymous">
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
        crossorigin="anonymous">
    </script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.11.2/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datejs/1.0/date.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#birthdateDay").mask("99");
            $("#birthdateMonth").mask("99");
            $("#birthdateYear").mask("9999");

            $('.modal-backdrop').fadeOut("slow");

            $(".btn").click(function(){
                $(this).val('Salvando');
                $('.modal-backdrop').fadeIn("fast");
            });

            $("#btn-cancel").click(function(event) {
                location.reload();
            })

            $(".birthdate").on('blur', function(){
                $('#birthdate').val(
                    $('#birthdateYear').val()+"-"+
                    $('#birthdateMonth').val()+"-"+
                    $('#birthdateDay').val()
                );

                var birthdate = new Date.parse($('#birthdate').val());
                var today = new Date();
                var age = Math.floor((today-birthdate) / (365.25 * 24 * 60 * 60 * 1000));

                if (age > 0) {
                    $("#age").val(age);
                }
            });

            if ($('#birthdate').val()) {
                var date = $('#birthdate').val().split("-");

                $('#birthdateYear').val(date[0]);
                $('#birthdateMonth').val(date[1]);
                $('#birthdateDay').val(date[2]);
            }
        });
    </script>
  </body>
</html>