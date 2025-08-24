<?=$cabecera?>
    Formulario de crear 

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Ingresar datos del libro</h5>
        <p class="card-text">

            <form method="post" action="<?=site_url('/guardar')?>" enctype="multipart/form-data">

        <div class="form-group">
            <label for="titulo">Título:</label>
            <input id="titulo" class="form-control" type="text" name="titulo">
        </div>

        <div class="form-group">
            <label for="autor">Autor:</label>
            <input id="autor" class="form-control" type="text" name="autor">
        </div>

        <div class="form-group">
            <label for="género">Género:</label>
            <input id="género" class="form-control" type="text" name="género">
        </div>

        <div class="form-group">
            <label for="páginas">Páginas:</label>
            <input id="páginas" class="form-control" type="text" name="páginas">
        </div>

        <div class="form-group">
            <label for="Ejemplar">No. Ejemplar:</label>
            <input id="Ejemplar" class="form-control" type="text" name="Ejemplar">
        </div>

        <div class="form-group">
            <label for="cantidad">Cantidad:</label>
            <input id="cantidad" class="form-control" type="text" name="cantidad">
        </div>

        <div class="form-group">
            <label for="nivel">Nivel:</label>
            <input id="nivel" class="form-control" type="text" name="nivel">
        </div>

        <div class="form-group">
            <label for="estado">Estado:</label>
            <input id="estado" class="form-control" type="text" name="estado">
        </div>

        <button class="btn btn-success" type="submit">Guardar</button>
        
    </form>
            
        </p>
    </div>
</div>

    
<?=$pie?>