<?php

namespace Kematjaya\CodeGenerator\Generator;

use Kematjaya\CodeGenerator\Entity\ClientInterface;
/**
 * @author Nur Hidayatullah <kematjaya0@gmail.com>
 */
interface GeneratorInterface 
{
    public function getLastNumber(): int;
    
    public function setLastNumber(int $last_number): self;
    
    public function getLengthNumber(): int;
    
    public function setLengthNumber(int $length_number): self;
    
    public function generate(ClientInterface $client):string;
}
