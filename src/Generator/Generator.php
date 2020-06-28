<?php

namespace Kematjaya\CodeGenerator\Generator;

use Kematjaya\CodeGenerator\Generator\GeneratorInterface;
use Kematjaya\CodeGenerator\Entity\ClientInterface;
/**
 * @author Nur Hidayatullah <kematjaya0@gmail.com>
 */
class Generator implements GeneratorInterface 
{
    private $last_number, $length_number;
    
    public function getLastNumber(): int
    {
        return ($this->last_number) ? $this->last_number:0;
    }
    
    public function setLastNumber(int $last_number):GeneratorInterface
    {
        $this->last_number = $last_number;
        
        return $this;
    }
    
    public function getLengthNumber(): int
    {
        if(!$this->length_number)
        {
            $this->length_number = 4;
        }
        
        return $this->length_number;
    }
    
    public function setLengthNumber(int $length_number): GeneratorInterface
    {
        $this->length_number = $length_number;
        
        return $this;
    }
    
    private function buildNumber(int $number, $length)
    {
        $newNumber = null;
        for($i = $length - strlen($number); $i > 0; $i--)
        {
            $newNumber .= 0;
        }
        
        return $newNumber . $number;
    }
    
    protected function buildValue($key, ClientInterface $client):?string
    {
        switch($key)
        {
            case ClientInterface::KEY_CODE:
                return md5(rand());
                break;
            case ClientInterface::KEY_NUMBER:
                $number = $this->getLastNumber() + 1;
                
                $this->setLastNumber($number);
                if(strlen($number) < $this->getLengthNumber())
                {
                    $number = $this->buildNumber($number, $this->getLengthNumber());
                }
                return $number;
                break;
        }
        
        return null;
    }
    
    public function generate(ClientInterface $client): string 
    {
        $data = [];
        foreach($client->format() as $key => $value)
        {
            if(is_numeric($key))
            {
                $data[] = $this->buildValue($value, $client);
            } else
            {
                if(method_exists($client, $value))
                {
                    $data[] = $client->$value();
                }else {
                    $data[] = $this->buildValue($key, $client);
                }
            }
        }
        
        return implode($client->getSeparator(), $data);
    }

}
