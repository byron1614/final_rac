<?php
require_once '../../modelos/Alumnos.php';
require_once '../../modelos/Materias.php';
    try {
        $alumno = new Alumno();
        $materia = new materia();
        $alumnos = $alumno->buscar();
        $materias = $materia->buscar();
          
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
    <div class="container">
        <h1 class="text-center">FORMULARIO DE INGRESO DE NOTAS</h1>
        <div class="row justify-content-center">
            <form action="/final_rac/controladores/notas/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <div class="row mb-3">
                    <div class="col">
                        <label for="res_alumno">ALUMNO</label>
                        <select name="res_alumno" id="res_alumno" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($alumnos as $key => $alumno) : ?>
                                <option value="<?= $alumno['ALUM_ID'] ?>"><?= $alumno['ALUM_NOMBRE'] . ' ' . $alumno['ALUM_APELLIDO'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>
                <hr>
                <h2>DETALLE DE LAS MATERIAS</h2>
                <div class="row mb-3">
                    <div class="col-lg-8">
                        <label for="materia1">MATERIA 1</label>
                        <select name="materia[]" id="materia1" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($materias as $key => $materia) : ?>
                                <option value="<?= $materia['MATE_ID'] ?>"><?= $materia['MATE_NOMBRE'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="resultado1">RESULTADO1</label>
                        <input type="number" name="res_punteo[]" id="resultado1" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-8">
                        <label for="materia2">MATERIA 2</label>
                        <select name="materias[]" id="materia2" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($materias as $key => $materia) : ?>
                                <option value="<?= $producto['MATE_ID'] ?>"><?= $materia['MATE_NOMBRE'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="resultado2">RESULTADO 2</label>
                        <input type="number" name="res_punteo[]" id="resultado2" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-8">
                        <label for="materia3">MATERIA 3</label>
                        <select name="materias[]" id="materia3" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($materias as $key => $materia) : ?>
                                <option value="<?= $materia['MATE_ID'] ?>"><?= $materia['MATE_NOMBRE']  ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="resultado3">RESULTADO 3</label>
                        <input type="float" name="res_punteo[]" id="resultado3" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-8">
                        <label for="materia4">MATERIA 4</label>
                        <select name="materias[]" id="materia4" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($materias as $key => $materia) : ?>
                                <option value="<?= $materia['MATE_ID'] ?>"><?= $materia['MATE_NOMBRE'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="resultado4">RESULTADO 4</label>
                        <input type="number" name="res_punteo[]" id="resulatado4" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-8">
                        <label for="materia5">MATERIA 5</label>
                        <select name="materias[]" id="materia5" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($materias as $key => $materia) : ?>
                                <option value="<?= $materia ['MATE_ID'] ?>"><?= $materia['MATE_NOMBRE'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="resultado5">RESULTADO 5</label>
                        <input type="number" name="res_punteo[]" id="resultado5" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-primary w-100">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>