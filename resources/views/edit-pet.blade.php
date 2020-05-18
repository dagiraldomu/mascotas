@extends('layout')

@section('title','Editar mascota')

@section('content')
    <div class="container">
        @if(count($errors)>0)
            <div class="" role="alert">
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                        <li class="list-group-item list-group-item-danger"> {{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <main class="content">
            <div class="cards">
                <div class="card card-center">
                    <div class="card-body">
                        <h1>Editar Mascota</h1>
                        <form action=" {{ url('/pets/'.$pet->id) }}" method= "post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <label for="name" class="field-label">Nombre: </label>
                            <input type="text" name="name" id="name" class="field-input" value="{{ old('name') ? old('name'):$pet->name }}">

                            <label for="type_id" class="field-label">Tipo: </label>

                            @foreach($types as $type)
                                <label><input type="radio" name="type_id" id="type_id" value="{{ $type->id }}"{{ old('type_id') ? (old('type_id') == $type->id ? 'checked' : '') : ($pet->type->id == $type->id ? 'checked' : '')}} >{{ $type->name }}</label><br>
                            @endforeach
                            <br>

                            <label for="objective_id" class="field-label">Clase: </label>
                            <select name="objective_id" id="objective_id" class="field-input">
                                @foreach($objectives as $objective)

                                    <option {{ old('objective_id') ? (old('objective_id') == $objective->id ? 'selected="yes"' : '') : ($pet->objective->id == $objective->id  ? 'selected="yes"' : '')}} value="{{ $objective->id }}">{{ $objective->name }}</option>

                                @endforeach
                            </select>

                            <label for="feed" class="field-label">Alimento: </label>

                            @foreach($feeds as $feed)
                                <label><input type="checkbox" name="feeds[]" id="feeds" value="{{ $feed->id }}"
                                        @if(is_array(old('feeds')) && in_array( $feed->id, old('feeds')))
                                            checked
                                        @elseif(count($pet->feeds)>0)
                                            @foreach($pet->feeds as $feedPet)
                                                    @if($feedPet->id == $feed->id) checked @endif
                                            @endforeach
                                        @endif>
                                    {{ $feed->name }} </label><br>
                            @endforeach
                            <br>

                            <label for="groups" class="field-label">Grupos: </label>

                            @foreach($groups as $group)
                                <label><input type="checkbox" name="groups[]" id="groups" value="{{ $group->id }}"
                                    @if(is_array(old('groups')) && in_array( $group->id, old('groups')))
                                        checked
                                    @elseif(count($pet->groups)>0)
                                        @foreach($pet->groups as $grouPet)
                                            @if($grouPet->id == $group->id) checked @endif
                                        @endforeach
                                    @endif>
                                    {{ $group->name }} </label><br>
                            @endforeach
                            <br>

                            <label for="date" class="field-label">Fecha: </label>
                            <input type="date" name="date" id="date" class="field-input" value="{{ old('date') ? old('date'): $pet->date }}" >


                            <label for="description" class="field-label">Descripción:</label>
                            <textarea name="description" id="description" rows="10" class="field-textarea"value="{{ $pet->description}}">{{ $pet->description}}</textarea>
                            <button type="submit" class="btn btn-primary">Actualizar Mascota</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
