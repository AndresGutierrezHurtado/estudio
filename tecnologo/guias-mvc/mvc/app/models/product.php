<?php

class Product extends Orm
{
    public function __construct(PDO $conn)
    {
        parent::__construct('producto_id', 'productos', $conn);
    }

}
