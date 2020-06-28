<?php

namespace Kematjaya\CodeGenerator\Entity;

/**
 * @author Nur Hidayatullah <kematjaya0@gmail.com>
 */
interface ClientInterface 
{
    const KEY_CODE = 'key.code';
    const KEY_NUMBER = 'key.number';
    
    public function getGeneratedCode():?string;
    
    public function setGeneratedCode(string $code):self;
    
    public function format():array;
    
    public function getSeparator():string;
}
