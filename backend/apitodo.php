<?php

include_once 'todo.php';

class ApiTodo{


    function getAll(){
        $todo = new Todo();
        $todos = array();
        $todos["items"] = array();

        $res = $todo->obtenerTodo();

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item=array(
                    "id" => $row['id'],
                    "description" => $row['description'],
                    "department" => $row['department'],
		    "price" => $row['price'],
                    "sale_date" => $row['sale_date'],
                );
                array_push($todos["items"], $item);
            }
        
            echo json_encode($todos);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }
}

?>