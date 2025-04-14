<?php
//Ejercicio 3 
require_once 'Connection.php';
class Lighting extends Conection {
    public function getAllLamps(){
        $query = "SELECT lamps.lamp_id, lamps.lamp_name, lamp_on,
                lamp_models.model_part_number,lamp_models.model_wattage,
                zones.zone_name FROM lamps INNER JOIN lamp_models ON
                lamps.lamp_model=lamp_models.model_id INNER JOIN zones ON
                lamps.lamp_zone = zones.zone_id ORDER BY lamps.lamp_id";
        $rows= $this ->getConn()->query($query);
        $lamps = [];
        while ($row = $rows->fetch(PDO::FETCH_ASSOC)) {
            $lamp = new Lamp($row['lamp_id'], $row['lamp_name'], $row['lamp_on'], $row['model_part_number'], $row['model_wattage'], $row['zone_name']);
            $lamps[] = $lamp;
        }
        return $lamps;
    }

    public function drawLampsList (){
        $lamps = $this->getAllLamps();
        foreach ($lamps as $lamp) {
            echo '<div class="element">';
            echo '<div >ID</div>';
            echo '<div >' . $lamp->getId() . '</div>';
            echo '<div >Name</div>';
            echo '<div >' . $lamp->getName() . '</div>';
            echo '<div >Estado</div>';
            echo '<div >' . $lamp->getEstado() . '</div>';
            echo '<div >Modelo</div>';
            echo '<div >' . $lamp->getModelo() . '</div>';
            echo '<div >Potencia</div>';
            echo '<div >' . $lamp->getPotencia() . 'W</div>';
            echo '<div >Zona</div>';
            echo '<div >' . $lamp->getZona() . '</div>';
            echo '</div>';
        }
    }

    public function contarPotencia(){
        $query = "SELECT SUM(lamp_models.model_wattage) as power FROM
        `lamps` INNER JOIN lamp_models on
        lamp_model=lamp_models.model_id WHERE lamp_on = 1 ;";
        $rows= $this ->getConn()->query($query);
        while ($row = $rows->fetch(PDO::FETCH_ASSOC)) {
            echo '<div >' . $row['power'] . 'W</div>';
        }
    }

    //Ejercicio 4

public function changeStatus($id, $status){
    if($status == 1){  
        $query = "UPDATE lamps SET lamp_on = 0 WHERE lamp_id = ?";
    }else{
        $query = "UPDATE lamps SET lamp_on = 1 WHERE lamp_id = ?";
    }
    $stmt = $this->conn->prepare($query);
}

public function drawLampsList2 (){
    $lamps = $this->getAllLamps();
    foreach ($lamps as $lamp) {
        echo '<div class="element">';
        echo '<div >ID</div>';
        echo '<div >' . $lamp->getId() . '</div>';
        echo '<div >Name</div>';
        echo '<div >' . $lamp->getName() . '</div>';
        echo '<div >Estado</div>';
        echo '<div >' . $lamp->getEstado() . '</div>';
        echo '<div >Modelo</div>';
        echo '<div >' . $lamp->getModelo() . '</div>';
        echo '<div >Potencia</div>';
        echo '<div >' . $lamp->getPotencia() . 'W</div>';
        echo '<div >Zona</div>';
        echo '<div >' . $lamp->getZona() . '</div>';
        if ($lamp->getEstado() == 1){
            echo '<div><a href="changestatus.php?lamp_id='.$lamp->getId().'"><img src="../img/bulb-icon-on.png"></a></div>';
        }else{
            echo '<div><a href="changestatus.php?lamp_id='.$lamp->getId().'"><img src="../img/bulb-icon-off.png"></a></div>';
        }

        echo '</div>';

    }
}

//Ejercicio 5
public function drawZonesOptions($request){//muestra las lices de segun que zona
    $id = $request["id"];
    $name = $request["name"];
    $estado = $request["estado"];
    $modelo = $request["modelo"];
    $potencia = $request["potencia"];
    $zona = $request["zona"];
    
    $stmt = $this->conn->prepare("SELECT * FROM zones WHERE zone_id = ?");
}






}
?>