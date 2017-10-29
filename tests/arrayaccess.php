<?php

class Entry implements ArrayAccess
{

    public$title = "test";
    public function offsetExists($offset){

    }
    public function offsetGet($offset)
    {
        var_dump("OffsetGet:",$offset);
    }
    public function offsetSet($offset, $value){
        
    }
    public function offsetUnset($offset){
        
    }
    public function __get ($offset)    
    {
        var_dump($offset);
        return "Das könnte ihr $offset sein";
    }

    public function __set($offset, $value)
    {
        return null;
    }
}
$entry = new Entry();

var_dump ($entry->blablabla);
?>