<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css"> --}}

    {{-- <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css"> --}}
    <title>Votación</title>
</head>

<body>
    <div class="votacion-container">
        <h2>Selecione el candidato (a) de su preferencia haciendo Click en la imagen.</h2>
        <br>
        <br>
        <br>
        <form id="form-votar" method="POST" action="{{ route('voto.store') }}">
            @csrf
            <input hidden type="text" name="user_id" id="user_id" value="{{ $user_id }}">
            <input hidden type="text" name="voto" id="voto">
        </form>
        <div class="candidatos-list">
            <div class="profile">
                <img onclick="votar(1)" class="candidato" src="/assets/images/perfil1.jpg" alt="" height="300"
                    width="300">
                <span>Cnadidato # 1</span>
            </div>
            <div class="profile">
                <img onclick="votar(2)" class="candidato" src="/assets/images/perfil2.jpeg" alt="" height="300"
                    width="300">
                <span>Cnadidato # 2</span>
            </div>
            <div class="profile">
                <img onclick="votar(3)" class="candidato" src="/assets/images/perfil3.jpg" alt="" height="300"
                    width="300">
                <span>Cnadidato # 3</span>
            </div>
        </div>
    </div>
    {{-- <script src="sweetalert2.all.min.js"></script> --}}
    {{-- <script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css"> --}}
    <script>
        function votar(voto) {
            Swal.fire({
                title: '¡Confirma tu voto!',
                text: "Estas seguro de votar por el candidato #" + voto,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, votar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    let form = document.getElementById("form-votar")
                    let votoText = document.getElementById("voto")

                    votoText.value = voto

                    form.submit();
                    // Swal.fire(
                    //     'Votado!',
                    //     'Tu voto se registro con exíto',
                    //     'success'
                    // )
                }
            })

        }
    </script>
</body>

</html>


{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
