@extends('layouts.app')

@section('content')
    <div class="container-body">
        <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="width: 40rem;">
            <div class="card-body">
                <h5 class="card-title">Resultados de las votaciones</h5>
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th># Candidato</th>
                            <th>Cantidad de votos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($votaciones as $voto)
                            <tr>
                                <td>Candidato #{{ $i++ }}</td>
                                <td>{{ $voto }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
