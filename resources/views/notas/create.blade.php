<form action="{{ route('admin.notas.store') }}" method="POST">
    @csrf  <!-- Token CSRF -->
<<<<<<< HEAD

    <div class="form-group">
        <label for="registro_estudiante_id" class="form-label">Estudiante:</label>
        <select name="registro_estudiante_id" id="registro_estudiante_id" class="form-select" required aria-describedby="estudianteHelp">
=======
    
    <div class="form-group">
        <label for="registro_estudiante_id">Estudiante:</label>
        <select name="registro_estudiante_id" class="form-control" required>
>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
            <option value="">Selecciona un estudiante</option>
            @foreach ($estudiantes as $estudiante)
                <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }}</option>
            @endforeach
        </select>
<<<<<<< HEAD
        <small id="estudianteHelp" class="form-text text-muted">Por favor selecciona un estudiante de la lista.</small>
    </div>

    <div class="form-group">
        <label for="curso_id" class="form-label">Curso:</label>
        <select name="curso_id" id="curso_id" class="form-select" required aria-describedby="cursoHelp">
=======
    </div>

    <div class="form-group">
        <label for="curso_id">Curso:</label>
        <select name="curso_id" class="form-control" required>
>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
            <option value="">Selecciona un curso</option>
            @foreach ($cursos as $curso)
                <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
            @endforeach
        </select>
<<<<<<< HEAD
        <small id="cursoHelp" class="form-text text-muted">Por favor selecciona un curso de la lista.</small>
=======
>>>>>>> d3cad1fdcba824512c34c5e8bc6fa2cf3e435f4f
    </div>

    <button type="submit" class="btn btn-primary">Asignar</button>
</form>
