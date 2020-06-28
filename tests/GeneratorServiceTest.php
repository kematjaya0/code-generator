<?php

namespace Kematjaya\CodeGenerator\Tests;

use Kematjaya\CodeGenerator\Tests\Entity\Client;
use Kematjaya\CodeGenerator\Generator\GeneratorInterface;
use Kematjaya\CodeGenerator\Service\GeneratorService;
use PHPUnit\Framework\TestCase;
/**
 * @author Nur Hidayatullah <kematjaya0@gmail.com>
 */
class GeneratorServiceTest extends TestCase
{
    public function testCreateGenerator()
    {
        $service = new GeneratorService();
        for($x = 0; $x <10; $x++)
        {
            $client = new Client();
            $service->setClient($client);
            $generator = $service->getGenerator();
            $this->assertInstanceOf(GeneratorInterface::class, $generator);
            $this->assertTrue(is_string($service->generate()));
        }
        
    }
}
