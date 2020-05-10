@extends('layout') 

@section('title',' Listado de mascotas')

@section('content')
    <main class="content">
        <div class="cards">

            @forelse($pets as $pet)
                <div class="card card-small">
                    <div class="card-body">
                        <h4>Nombre</h4>
                        <p> {{ $pet->name }} </p>

                        <h4>Tipo</h4>
                        <P>{{ $pet->type }} </P>

                        <h4>Clase</h4>
                        <P>{{ $pet->class }} </P>

                        <h4>Alimentación</h4>
                        <P>{{ $pet->feed }} </P>

                        <h4>Objetivo</h4>
                        <P>{{ $pet->objective }} </P>

                        <p>
                            {{ $pet->description }}
                        </p>
                    </div>

                    <footer class="card-footer">
                        <a href=" {{ url('/pets/'.$pet->id.'/edit') }}" class="action-link action-edit">
                            <i class="icon icon-pen"></i>
                        </a>
                        <form method="post" action="{{ url('/pets/'.$pet->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button class="action-link action-delete" type="submit" onclick="return confirm('Eliminar mascota?');">
                                <i class="icon icon-trash"></i>
                            </button>
                        </form>
                    </footer>
                </div>
            @empty
                <p>No hay mascotas disponibles en este momento <a href="{{ url('pets/create') }}">Agrega una?</a></p>
            @endforelse
            
        </div>
    </main>
@endsection