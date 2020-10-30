<?php


namespace Tests\Endpoints;


use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tests\TestCase;

class EndpointTestCase extends TestCase
{

    use DatabaseTransactions;

    /**
     * Endpoint to execute.
     * @var string
     */
    protected $url = '';

    /**
     * Parameters pass to request.
     * @var array
     */
    protected $params = [];

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
    }
}
