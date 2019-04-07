<?php
function alta_ayuda($conexion,$ayuda){
    $zero = 0;

    if($ayuda['tipoayuda'] == "bolsacomida"){
        try {
            $consulta = "CALL nueva_ayuda_de_comida(:w_suministradapor, :w_concedida, :w_bebe, :w_niño, :w_oid_c)";
            $stmt=$conexion->prepare($consulta);
            $stmt->bindParam(':w_suministradapor',$ayuda["suministradapor"]);
            $stmt->bindParam(':w_concedida',$ayuda["concedida"]);
            $stmt->bindParam(':w_bebe',$ayuda["bebe"]);
            $stmt->bindParam(':w_niño',$ayuda["niño"]);
            $stmt->bindParam(':w_oid_c',$_SESSION["citaId"]);
            $stmt->execute();
            
            return true;
        } catch(PDOException $e) {
            return $e->getMessage();
        }
        }else if($ayuda['tipoayuda'] == "ayudaeconomica"){
            try {
                $consulta = "CALL nueva_ayuda_economica(:w_suministradapor, :w_concedida, :w_cantidad, :w_niño, :w_prioridad, :w_oid_c)";
                $stmt=$conexion->prepare($consulta);
                $stmt->bindParam(':w_suministradapor',$ayuda["suministradapor"]);
                $stmt->bindParam(':w_concedida',$ayuda["concedida"]);
                $stmt->bindParam(':w_cantidad',$ayuda["cantidad"]);
                $stmt->bindParam(':w_niño',$ayuda["motivo"]);
                $stmt->bindParam(':w_prioridad', $ayuda["prioridad"]);
                $stmt->bindParam(':w_oid_c',$_SESSION["citaId"]);
                $stmt->execute();
                
                return true;
            } catch(PDOException $e) {
                return $e->getMessage();
            }
        }else if($ayuda['tipoayuda'] == "curso"){
            try {
                $consulta=  "CALL nuevo_curso(:w_profesor, :w_materia, :w_fechacomienzo, :w_fechafin, :w_numerosesiones,"
                    . ":w_horasporsesion, :w_numeroalumnosactuales, :w_numeroalumnosmaximo, :w_lugar)";
                $stmt=$conexion->prepare($consulta);
                $stmt->bindParam(':w_profesor', $ayuda["profesor"]);
                $stmt->bindParam(':w_materia', $ayuda["materia"]);
                $stmt->bindParam(':w_fechacomienzo', $ayuda["fechacomienzo"]);
                $stmt->bindParam(':w_fechafin', $ayuda["fechafin"]);
                $stmt->bindParam(':w_numerosesiones', $ayuda["numerosesiones"]);
                $stmt->bindValue(':w_horasporsesion',null, PDO::PARAM_INT);
                $stmt->bindParam(':w_numeroalumnosactuales', $zero);
                $stmt->bindParam(':w_numeroalumnosmaximo', $ayuda["numeroalumnosmaximo"]);
                $stmt->bindValue(':w_lugar',null, PDO::PARAM_INT);
                $stmt->execute();
                
                return true;
            } catch(PDOException $e) {
                return $e->getMessage();
            }
        }else if($ayuda['tipoayuda'] == "trabajo"){
            try {
                $consulta = "CALL nueva_ayuda_trabajo(:w_suministradapor, :w_concedida, :w_descripcion, :w_empresa, :w_salarioaproximado, :w_oid_c)";
                $stmt=$conexion->prepare($consulta);
                $stmt->bindParam(':w_suministradapor',$ayuda["suministradapor"]);
                $stmt->bindParam(':w_concedida',$ayuda["concedida"]);
                $stmt->bindParam(':w_descripcion',$ayuda["descripcion"]);
                $stmt->bindParam(':w_empresa',$trabaayudajos["empresa"]);
                $stmt->bindParam(':w_salarioaproximado', $ayuda["salarioaproximado"]);
                $stmt->bindParam(':w_oid_c',$_SESSION["citaId"]);
                $stmt->execute();
                
                return true;
            } catch(PDOException $e) {
                return $e->getMessage();
            }
    }
}
