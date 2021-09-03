<?php
  require('../conexion.php');

   $ComandoSql="SELECT h.NombreHabitacion, mh.IdMovimientohabitacion, ht.CantidadPaxHabitacionTipo, mh.EstadoMovimientoHabitacion, m.EstadoMovimiento, m.FechaEntradaMovimiento, m.FechaSalidaMovimiento, mh.CantidadAdultosMovimientoHabitacion, mh.CantidadNinosMovimientoHabitacion, mh.NitResponsableMovimientoHabitacion, mh.NombreResponsableMovimientoHabitacion FROM movimiento m, movimientohabitacion mh, habitacion h, habitaciontipo ht WHERE EstadoMovimientoHabitacion = 'ACTIVO' AND TipoMovimientoHabitacion = 'CHECK IN' AND m.IdMovimiento = mh.IdMovimiento AND mh.IdHabitacion = h.IdHabitacion AND h.IdHabitacionTipo = ht.IdHabitacionTipo and m.EstadoMovimiento = 'ACTIVO' GROUP BY h.NombreHabitacion";


       $resultado=$conexion->query($ComandoSql);
         while($fila=$resultado->fetch_array())
         {
            echo"<option value='".json_encode($fila)."'>".$fila['NombreHabitacion']."</option>"; 
        }
?>


