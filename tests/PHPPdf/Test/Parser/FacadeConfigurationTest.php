<?php

namespace PHPPdf\Test\Parser;

use PHPPdf\Parser\FacadeConfiguration;

class FacadeConfigurationTest extends \PHPPdf\PHPUnit\Framework\TestCase
{
    private $facadeConfiguration;

    public function setUp()
    {
        $this->facadeConfiguration = FacadeConfiguration::newInstance();
    }

    /**
     * @test
     */
    public function settingConfigFiles()
    {
        $this->facadeConfiguration->setNodesConfigFile('a');
        $this->assertEquals('a', $this->facadeConfiguration->getNodesConfigFile());

        $this->facadeConfiguration->setEnhancementsConfigFile('b');
        $this->assertEquals('b', $this->facadeConfiguration->getEnhancementsConfigFile());

        $this->facadeConfiguration->setFontsConfigFile('c');
        $this->assertEquals('c', $this->facadeConfiguration->getFontsConfigFile());
    }

    /**
     * @test
     */
    public function fluentInterface()
    {
        $this->assertTrue($this->facadeConfiguration === $this->facadeConfiguration->setNodesConfigFile('a'));
        $this->assertTrue($this->facadeConfiguration === $this->facadeConfiguration->setEnhancementsConfigFile('a'));
        $this->assertTrue($this->facadeConfiguration === $this->facadeConfiguration->setFontsConfigFile('a'));
    }

    /**
     * @test
     */
    public function defaultConfiguration()
    {
        $this->assertNotNull($this->facadeConfiguration->getNodesConfigFile());
        $this->assertNotNull($this->facadeConfiguration->getEnhancementsConfigFile());
        $this->assertNotNull($this->facadeConfiguration->getFontsConfigFile());
    }
}