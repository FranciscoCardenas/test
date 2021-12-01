<?php

include_once 'db.php';

class Todo extends DB{
    
    function obtenerTodo(){
        $query = $this->connect()->query('SELECT s.id,si.description , si.department , si.price , s.sale_date FROM sale s inner join sold_item si on si.sale_id = s.id order by s.sale_date DESC');
        return $query;
    }

}

?>