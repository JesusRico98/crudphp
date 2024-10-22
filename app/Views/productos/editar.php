<?php echo $this->extend('plantilla');?>

<?=$this->section('contenido');?>

            <h3 class="my-3" style="color: white;">editar Producto</h3>

            <?php if (session()->getFlashdata('error') !== null) { ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php } ?>

            <form action="<?= base_url('productos/'.$producto['id']); ?>" class="row g-3" method="POST" autocomplete="off">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="producto_id" value="<?=$producto['id'];?>">

                <div class="col-md-4">
                    <label for="clave" class="form-label" style="color: white;">Clave</label>
                    <input type="text" class="form-control" id="clave" name="clave" value="<?=$producto['clave'];?>" required autofocus>
                </div>

                <div class="col-md-8">
                    <label for="nombre" class="form-label" style="color: white;">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?=$producto['nombre'];?>" required>
                </div>

                
                <div class="col-md-8">
                    <label for="categoria" class="form-label" style="color: white;">Categoria</label>
                    <input type="text" class="form-control" id="categoria" name="categoria" value="<?=$producto['categoria'];?>" required>
                </div>

                <div class="col-md-8">
                    <label for="descripcion" class="form-label" style="color: white;">Descripcion</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?=$producto['descripcion'];?>" required>
                </div>

                <div class="col-md-6">
                    <label for="fecha_caducidad" class="form-label" style="color: white;">Fecha de Caducidad</label>
                    <input type="date" class="form-control" id="fecha_caducidad" name="fecha_caducidad" value="<?=$producto['fecha_caducidad'];?>" required>
                </div>

                <div class="col-md-6">
                    <label for="provedor" class="form-label" style="color: white;">Provedor</label>
                    <select class="form-select" id="provedor" name="provedor" required>
                        <option value="">Seleccionar</option>
                        <?php foreach ($provedores as $provedor) : ?>
                            <option value="<?= $provedor['id']; ?>"<?php echo($provedor['id'] == $producto['id_provedor']) ? 'selected' : ' '; ?> ><?= $provedor['nombre']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-12">
                <a href="<?= base_url('productos'); ?>" class="btn btn-secondary">Regresar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

            </form>

<?=$this->endSection(); ?>