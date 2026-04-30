<div class="container mt-5">
    <h2>Añadir Nueva Película</h2>
    <form action="index.php?action=guardar" method="POST" class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Título</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Género</label>
            <input type="text" name="genre" class="form-control">
        </div>
        <div class="col-12">
            <label class="form-label">Sinopsis</label>
            <textarea name="synopsis" class="form-control" rows="3"></textarea>
        </div>
        <div class="col-md-4">
            <label class="form-label">Fecha de Estreno</label>
            <input type="date" name="release_date" class="form-control">
        </div>
        <div class="col-md-4">
            <label class="form-label">URL del Poster</label>
            <input type="url" name="poster_url" class="form-control">
        </div>
        <div class="col-md-4">
            <label class="form-label">Duración (minutos)</label>
            <input type="number" name="runtime_minutes" class="form-control">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Guardar Película</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>