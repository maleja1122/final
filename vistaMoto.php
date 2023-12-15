<?php
    require_once("cliente.php");
    require_once("mecanico.php");
    $clientes = cliente::mostrar();
    $mecanicos = mecanico::mostrarMeca();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <a href="loginAdmin.html" class="btn btn-secondary float-left mt-2">¿Eres administrador? Ingresa aquí</a>
        

        <form method="POST" action="guardarMoto.php">
          <h2 class="mt-5 mb-4">Placa</h2>
        
          <div class="form-group">
            <input type="text" class="form-control" name="placa" id="email" placeholder="Placa" required>
          </div>
            <hr>

            <h2 class="mt-5 mb-4">Marca</h2>
        
            <div class="form-group">
            <input type="text" class="form-control" name="marca" id="email" placeholder="Placa" required>
            </div>
            <hr>
            <h2 class="mt-5 mb-4">Año</h2>
        
            <div class="form-group">
                <input type="number" class="form-control" name="año" id="email" placeholder="Placa" required>
            </div>
            <hr>
          

                </select>
                    <h1 class="h3 mb-4 text-gray-800">Cliente</h1>
                    <select class="form-select form-select mb-3" name="id_cliente">
                    <option selected>Seleccione</option>
                        <?php
                        foreach ($clientes as $cliente) {
                            echo "<option value='" . $cliente['id_cliente'] . "'>" . $cliente['nombre'] . "</option>";
                        }
                        ?>
                 </select>
            
          <button type="submit" class="btn btn-primary" name="">Registrar Moto</button>
         
      </div>
    </div>
</body>
</html>