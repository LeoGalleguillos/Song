<?php
namespace LeoGalleguillos\SongTest;

use LeoGalleguillos\Song\Module;
use PHPUnit\Framework\TestCase;

class ModuleTest extends TestCase
{
    protected function setUp()
    {
        $this->module = new Module();
    }

    public function testInstance()
    {
        $this->assertInstanceOf(Module::class, $this->module);
    }

    public function testGetServiceConfig()
    {
        $serviceConfig = $this->module->getServiceConfig();
        $serviceConfigFactories = $serviceConfig['factories'];
        foreach ($serviceConfigFactories as $className => $value) {
            $this->assertTrue(class_exists($className));
        }
    }
}
