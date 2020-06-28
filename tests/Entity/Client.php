<?php

namespace Kematjaya\CodeGenerator\Tests\Entity;

use Kematjaya\CodeGenerator\Entity\ClientInterface;
/**
 * @author Nur Hidayatullah <kematjaya0@gmail.com>
 */
class Client implements ClientInterface 
{
    private $code;
    
    public function getCode()
    {
        return $this->code;
    }
    
    public function getDefaultCode()
    {
        return 'III';
    }
    public function format(): array 
    {
        return [
            self::KEY_NUMBER, 
            self::KEY_CODE => 'getDefaultCode'
        ];
    }

    public function getSeparator(): string 
    {
        return '/';
    }

    public function getGeneratedCode(): ?string 
    {
        return $this->getCode();
    }

    public function setGeneratedCode(string $code): ClientInterface 
    {
        $this->code = $code;
        
        return $this;
    }

}
