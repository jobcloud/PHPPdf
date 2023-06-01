<?php

class Joe
{
    public function serialize()
    {
        return '';
    }

    public function unserialize($data)
    {
    }
}

$obj = new Joe();
$ser = serialize($obj);

var_dump($ser);
//exit;

//$newobj = unserialize($ser);

//var_dump($newobj->getData());
