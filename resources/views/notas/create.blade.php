<form action="{{ route('admin.notas.store') }}" method="POST">
    @csrf  <!-- Token CSRF -->

    <div class="form-group">
        <label for="registro_estudiante_id" class="form-label">Estudiante:</label>
        <select name="registro_estudiante_id" id="registro_estudiante_id" class="form-select" required aria-describedby="estudianteHelp">
            <option value="">Selecciona un estudiante</option>
            @foreach ($estudiantes as $estudiante)
                <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }}</option>
            @endforeach
        </select>
        <small id="estudianteHelp" class="form-text text-muted">Por favor selecciona un estudiante de la lista.</small>
    </div>

    <div class="form-group">
        <label for="curso_id" class="form-label">Curso:</label>
        <select name="curso_id" id="curso_id" class="form-select" required aria-describedby="cursoHelp">
            <option value="">Selecciona un curso</option>
            @foreach ($cursos as $curso)
                <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
            @endforeach
        </select>
        <small id="cursoHelp" class="form-text text-muted">Por favor selecciona un curso de la lista.</small>
    </div>

    <button type="submit" class="btn btn-primary">Asignar</button>
</form>
