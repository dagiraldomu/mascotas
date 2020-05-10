@extends('layout')

@section('title','Agregar mascota')

@section('content')
    <main class="content">
        <div class="cards">
            <div class="card card-center">
                <div class="card-body">
                    <h1>Nueva Mascota</h1>
                    <form action="{{ url('/pets') }}" method= "post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <label for="name" class="field-label">Nombre: </label>
                        <input type="text" name="name" id="name" class="field-input">

                        <label for="type" class="field-label">Tipo: </label>
                        <label><input type="radio" name="type" id="type" value="Doméstico" checked>Doméstico</label><br>
                        <label><input type="radio" name="type" id="type" value="Salvaje">Salvaje</label><br><br>

                        <label for="class" class="field-label">Clase: </label>
                        <select name="class" id="class" class="field-input">
                            <option>Mamíferos</option>
                            <option>Reptiles</option>
                            <option>Anfibios</option>
                            <option>Peces</option>
                            <option>Aves</option>
                        </select>

                        <label for="feed" class="field-label">Alimento: </label>

                        <label><input type="checkbox" name="feed[]" id="feed" value="Herbívoros"checked> Herbívoros </label><br>
                        <label><input type="checkbox" name="feed[]" id="feed" value="Carnívoros"> Carnívoros </label><br><br>

                        <label for="feed" class="field-label">Objetivo: </label>

                        <label><input type="checkbox" name="objective[]" id="objective" value="Apoyo" checked> Apoyo </label><br>
                        <label><input type="checkbox" name="objective[]" id="objective" value="Compañía"> Compañía </label><br>
                        <label><input type="checkbox" name="objective[]" id="objective" value="Entretenimiento"> Entretenimiento </label><br><br>

                        <label for="description" class="field-label">Descripción:</label>
                        <textarea name="description" id="description" rows="10" class="field-textarea"></textarea>
                        <button type="submit" class="btn btn-primary">Crear Mascota</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection