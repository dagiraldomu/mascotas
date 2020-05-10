@extends('layout')

@section('title','Editar mascota')

@section('content')
    <main class="content">
        <div class="cards">
            <div class="card card-center">
                <div class="card-body">
                    <h1>Editar Mascota</h1>
                    <form action=" {{ url('/pets/'.$pet->id) }}" method= "post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <label for="name" class="field-label">Nombre: </label>
                        <input type="text" name="name" id="name" class="field-input" value="{{ $pet->name}}">
                        
                        <label for="type" class="field-label">Tipo: </label>
                        <label><input type="radio" name="type" id="type" value="Doméstico" checked>Doméstico</label><br>
                        <label><input type="radio" name="type" id="type" value="Salvaje">Salvaje</label><br><br>

                        <label for="class" class="field-label">Clase: </label>
                        <select name="class" id="class" class="field-input">
                            <option>Mamíferos</option>
                            <option selected="yes">Reptiles</option>
                            <option>Anfibios</option>
                            <option>Peces</option>
                            <option>Aves</option>
                        </select>

                        <label for="feed" class="field-label">Alimento: </label>

                        <label><input type="checkbox" name="feed[]" id="feed" checked value="Herbívoros"> Herbívoros </label><br>
                        <label><input type="checkbox" name="feed[]" id="feed" value="Carnívoros"> Carnívoros </label><br><br>

                        <label for="feed" class="field-label">Objetivo: </label>

                        <label><input type="checkbox" name="objective[]" id="objective" value="Apoyo"> Apoyo </label><br>
                        <label><input type="checkbox" name="objective[]" id="objective" value="Compañía"> Compañía </label><br>
                        <label><input type="checkbox" name="objective[]" id="objective" value="Entretenimiento"> Entretenimiento </label><br><br>


                        <label for="description" class="field-label">Descripción:</label>
                        <textarea name="description" id="description" rows="10" class="field-textarea"value="{{ $pet->description}}">{{ $pet->description}}</textarea>
                        <button type="submit" class="btn btn-primary">Actualizar Mascota</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection