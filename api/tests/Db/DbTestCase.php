<?php


namespace Tests\Db;


use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tests\TestCase;

abstract class DbTestCase extends TestCase
{

    use DatabaseTransactions;

    /**
     * Test if table exist.
     *
     * @test
     * @return void
     */
    abstract public function is_table_exists();

    /**
     * Tests if table has correct number of columns.
     *
     * @test
     * @return void
     */
    abstract public function has_exact_column_number();
}
