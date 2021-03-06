<?php
/**
 * @author Eugene Terentev <eugene@terentev.net>
 */

namespace probe\tests;

use probe\Factory;

class AbstractProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \probe\provider\AbstractProvider
     */
    protected $provider;

    public function setUp()
    {
        $this->provider = Factory::create();
    }

    public function testGetPhpVersion()
    {
        $this->assertEquals(phpversion(), $this->provider->getPhpVersion());
    }

    public function testGetPhpSapiName()
    {
        $this->assertEquals(php_sapi_name(), $this->provider->getPhpSapiName());
    }

    public function testBooleanMethods()
    {
        $this->assertInternalType('boolean', $this->provider->isNginx());
        $this->assertInternalType('boolean', $this->provider->isApache());
        $this->assertInternalType('boolean', $this->provider->isISS());
        $this->assertInternalType('boolean', $this->provider->isBSDOs());
        $this->assertInternalType('boolean', $this->provider->isLinuxOs());
        $this->assertInternalType('boolean', $this->provider->isWindowsOs());
        $this->assertInternalType('boolean', $this->provider->isMacOs());
        $this->assertInternalType('boolean', $this->provider->isCli());
        $this->assertInternalType('boolean', $this->provider->isFpm());
    }

    public function testGetUptime()
    {
        $this->assertInternalType('integer', $this->provider->getUptime());
        $this->assertGreaterThan(0, $this->provider->getUptime());
    }
}
