<?php


namespace Tests\Endpoints;


use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Helpers;

class ItemTestCase extends EndpointTestCase
{
    /**
     * Endpoint to execute.
     * @var string
     */
    protected $url = '/item';

    /**
     * Form data.
     * @var array
     */
    protected $data = [];

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->data = [
            'name' => substr(uniqid(), 0, 10),
            'status' => $this->getRandomStatus(),
            'amount' => rand(1, 999),
        ];
    }

    /**
     * Return random status.
     *
     * @return string
     */
    public function getRandomStatus(): string
    {
        return ['active', 'hold', 'deleted',][rand(0,2)];
    }
}
