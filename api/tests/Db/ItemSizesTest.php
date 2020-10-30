<?php


namespace Tests\Db;


use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ItemSizesTest extends DbTestCase
{
    /**
     * Test if table exist.
     *
     * @test
     * @ret/urn void
     */
    public function is_table_exists()
    {
        $this->assertEquals(true, Schema::hasTable('item_sizes'));
    }

    /**
     * Tests if table has correct number of columns.
     *
     * @test
     * @return void
     */
    public function has_exact_column_number()
    {
        $this->assertCount(5, Schema::getColumnListing('item_sizes'));
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
        $this->assertEquals(true, Schema::hasColumn('item_sizes', 'id'));
    }

    /**
     * Test has id column suitable data type.
     *
     * @test
     * @return void
     */
    public function has_id_column_suitable_data_type()
    {
        $this->assertEquals('bigint', DB::connection()->getDoctrineColumn('item_sizes', 'id')->getType()->getName());
    }

    /**
     * Test is id column autoincrement.
     *
     * @test
     * @return void
     */
    public function is_id_column_autoincrement()
    {
        $this->assertTrue(DB::connection()->getDoctrineColumn('item_sizes', 'id')->getAutoincrement());
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
        $this->assertEquals(true, Schema::hasColumn('item_sizes', 'created_at'));
    }

    /**
     * Test has created_at column suitable data type.
     *
     * @test
     * @return void
     */
    public function has_created_at_column_suitable_data_type()
    {
        $this->assertEquals('datetime', DB::connection()->getDoctrineColumn('item_sizes', 'created_at')->getType()->getName());
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
        $this->assertEquals(true, Schema::hasColumn('item_sizes', 'updated_at'));
    }

    /**
     * Test has updated_at column suitable data type.
     *
     * @test
     * @return void
     */
    public function has_updated_at_column_suitable_data_type()
    {
        $this->assertEquals('datetime', DB::connection()->getDoctrineColumn('item_sizes', 'updated_at')->getType()->getName());
    }


    /** SIZE */


    /**
     * Test if column size exists.
     *
     * @test
     * @return void
     */
    public function is_column_size_exists()
    {
        $this->assertEquals(true, Schema::hasColumn('item_sizes', 'size'));
    }

    /**
     * Test has size column suitable data type.
     *
     * @test
     * @return void
     */
    public function has_size_column_suitable_data_type()
    {
        $this->assertEquals('text', DB::connection()->getDoctrineColumn('item_sizes', 'size')->getType()->getName());
    }


    /** ITEM_ID */


    /**
     * Test if column item_id exists.
     *
     * @test
     * @return void
     */
    public function is_column_item_id_exists()
    {
        $this->assertEquals(true, Schema::hasColumn('item_sizes', 'item_id'));
    }

    /**
     * Test has item_id column suitable data type.
     *
     * @test
     * @return void
     */
    public function has_item_id_column_suitable_data_type()
    {
        $this->assertEquals('bigint', DB::connection()->getDoctrineColumn('item_sizes', 'item_id')->getType()->getName());
    }
}
