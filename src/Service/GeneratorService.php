<?php

namespace Kematjaya\CodeGenerator\Service;

use Kematjaya\CodeGenerator\Entity\ClientInterface;
use Kematjaya\CodeGenerator\Generator\GeneratorInterface;
use Kematjaya\CodeGenerator\Generator\Generator;
/**
 * @author Nur Hidayatullah <kematjaya0@gmail.com>
 */
class GeneratorService 
{
    private $client, $generator;
    
    public function __construct(ClientInterface $client = null) 
    {
        $this->client = $client;
    }
    
    public function setClient(ClientInterface $client):self
    {
        $this->client = $client;
        
        return $this;
    }
    
    public function setGenerator(GeneratorInterface $generator):self
    {
        $this->generator = $generator;
        
        return $this;
    }
    
    public function getGenerator():GeneratorInterface
    {
        switch(true)
        {
            default:
                if(!$this->generator instanceof Generator)
                {
                    $this->generator = new Generator();
                }
                
                return $this->generator;
                break;
        }
        throw new \Exception(sprintf('uknown generator for class: %s', get_class($this->client)));
    }
    
    public function generate():string
    {
        return $this->getGenerator()->generate($this->client);
    }
}
