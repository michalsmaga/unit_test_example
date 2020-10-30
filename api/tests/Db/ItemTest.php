<?php


namespace Tests\Db;


use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ItemTest extends DbTestCase
{
    /**
     * Test if table exist.
     *
     * @test
     * @return void
     */
    public function is_table_exists()
    {
        $this->assertEquals(true, Schema::hasTable('items'));
    }

    /**
     * Tests if table has correct number of columns.
     *
     * @test
     * @return void
     */
    public function has_exact_column_number()
    {
        $this->assertCount(6, Schema::getColumnListing('items'));
    }


    /** ID */


    /**
     * Test if column id exists.
     *
     * @test
     * @return void
     */
    public function is_column_id_exists()
    {
        $this->assertEquals(true, Schema::hasColumn('items', 'id'));
    }

    /**
     * Test has id column suitable data type.
     *
     * @test
     * @return void
     */
    public function has_id_column_suitable_data_type()
    {
        $this->assertEquals('bigint', DB::connection()->getDoctrineColumn('items', 'id')->getType()->getName());
    }

    /**
     * Test is id column autoincrement.
     *
     * @test
     * @return void
     */
    public function is_id_column_autoincrement()
    {
        $this->assertTrue(DB::connection()->getDoctrineColumn('items', 'id')->getAutoincrement());
    }


    /** CREATED_AT */


    /**
     * Test if column created_at exists.
     *
     * @test
     * @return void
     */
    public function is_column_created_at_exists()
    {
        $this->assertEquals(true, Schema::hasColumn('items', 'created_at'));
    }

    /**
     * Test has created_at column suitable data type.
     *
     * @test
     * @return void
     */
    public function has_created_at_column_suitable_data_type()
    {
        $this->assertEquals('datetime', DB::connection()->getDoctrineColumn('items', 'created_at')->getType()->getName());
    }


    /** UPDATED_AT */


    /**
     * Test if column updated_at exists.
     *
     * @test
     * @return void
     */
    public function is_column_updated_at_exists()
    {
        $this->assertEquals(true, Schema::hasColumn('items', 'updated_at'));
    }

    /**
     * Test has updated_at column suitable data type.
     *
     * @test
     * @return void
     */
    public function has_updated_at_column_suitable_data_type()
    {
        $this->assertEquals('datetime', DB::connection()->getDoctrineColumn('items', 'updated_at')->getType()->getName());
    }


    /** NAME */


    /**
     * Test if column name exists.
     *
     * @test
     * @return void
     */
    public function is_column_name_exists()
    {
        $this->assertEquals(true, Schema::hasColumn('items', 'name'));
    }

    /**
     * Test has name column suitable data type.
     *
     * @test
     * @return void
     */
    public function has_name_column_suitable_data_type()
    {
        $this->assertEquals('text', DB::connection()->getDoctrineColumn('items', 'name')->getType()->getName());
    }


    /** STATUS */


    /**
     * Test if column status exists.
     *
     * @test
     * @return void
     */
    public function is_column_status_exists()
    {
        $this->assertEquals(true, Schema::hasColumn('items', 'status'));
    }

    /**
     * Test has status column suitable data type.
     *
     * @test
     * @return void
     */
    public function has_status_column_suitable_data_type()
    {
        $this->assertEquals('text', DB::connection()->getDoctrineColumn('items', 'status')->getType()->getName());
    }


    /** AMOUNT */


    /**
     * Test if column amount exists.
     *
     * @test
     * @return void
     */
    public function is_column_amount_exists()
    {
        $this->assertEquals(true, Schema::hasColumn('items', 'amount'));
    }

    /**
     * Test has amount column suitable data type.
     *
     * @test
     * @return void
     */
    public function has_amount_column_suitable_data_type()
    {
        $this->assertEquals('smallint', DB::connection()->getDoctrineColumn('items', 'amount')->getType()->getName());
    }

    /**
     * Test has amount column default value.
     *
     * @test
     * @return void
     */
    public function has_amount_column_default()
    {
        $this->assertEquals(10, DB::connection()->getDoctrineColumn('items', 'amount')->getDefault());
    }
}
