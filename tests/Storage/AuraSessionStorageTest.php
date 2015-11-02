<?php

namespace LosMiddleware\RateLimit\Storage;

use Aura\Session\SessionFactory;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-11-02 at 17:06:44.
 */
class AuraSessionStorageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var RateLimitFactory
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        @session_start();
        $sessionFactory = new SessionFactory();
        $session = $sessionFactory->newInstance([]);
        $this->object = new AuraSessionStorage($session->getSegment('LosRateLimit'));
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers LosMiddleware\RateLimit\Storage\AuraSessionStorage::__construct
     * @covers LosMiddleware\RateLimit\Storage\AuraSessionStorage::set
     * @covers LosMiddleware\RateLimit\Storage\AuraSessionStorage::get
     */
    public function testSetGet()
    {
        $this->object->set('key', 'value');
        $this->assertSame('value', $this->object->get('key'));
        $this->assertSame('not', $this->object->get('nokey', 'not'));
    }
}