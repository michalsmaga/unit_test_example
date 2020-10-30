<?php


namespace Tests\Models;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models;
use Illuminate\Database\Eloquent\Collection;

class ItemMethodsTest extends TestCase
{
    /**
     * 1. Sprawdzenie czy metoda setName ustawia wartość atrybutu name.
     *
     * 2. Sprawdzenie czy metoda setStatus ustawia wartość atrybutu status.
     *
     * 3. Sprawdzenie czy metoda getSortedSizes zwraca kolekcję.
     * 4. Sprawdzenie czy metoda getSortedSizes zwraca odpowiednią liczną kolekcję.
     * 5. Sprawdzenie czy metoda getSortedSizes zwraca kolekcje posortowaną zgodnie z parametrem.
     */

    use DatabaseTransactions;

    /**
     * Item object
     * @var App\Models\Item
     */
    protected $item;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->item = Models\Item::factory()->create();
        Models\ItemSize::factory()->create(['item_id' => $this->item->id, 'size' => 'medium',]);
        Models\ItemSize::factory()->create(['item_id' => $this->item->id, 'size' => 'extra',]);
        Models\ItemSize::factory()->create(['item_id' => $this->item->id, 'size' => 'small',]);
    }

    /**
     * 1. Test if setName method set correct value of name attribute.
     *
     * @test
     * @return void
     */
    public function is_name_attribute_correct_set()
    {
        $name = 'item123';
        $this->item->setName($name);

        $this->assertEquals($name, $this->item->name);
    }

    /**
     * 2. Test if setStatus method returns true when date is from today.
     *
     * @test
     * @return void
     */
    public function is_status_attribute_correct_set()
    {
        $status = 'deleted';
        $this->item->setStatus($status);

        $this->assertEquals($status, $this->item->status);
    }

    /**
     * 3. Test if getSortedSizes returns a collection.
     *
     * @test
     * @return void
     */
    public function is_collection_returned()
    {
        $this->assertInstanceOf(Collection::class, $this->item->getSortedSizes('asc'));
    }

    /**
     * 4. Test if getSortedSizes returns a collection with correct number of sizes.
     *
     * @test
     * @return void
     */
    public function has_collection_correct_number_of_sizes()
    {
        $this->assertEquals(3, $this->item->getSortedSizes('asc')->count());
    }

    /**
     * 5. Test if getSortedSizes returns a collection with element if given order.
     *
     * @test
     * @return void
     */
    public function has_collection_correct_order()
    {
        $collection = $this->item->getSortedSizes('asc');
        $order = $collection->pluck('size')->toArray();
        $alphabeticAscOrder = ['extra', 'medium', 'small'];

        $this->assertEquals($alphabeticAscOrder, $order);
    }
}

