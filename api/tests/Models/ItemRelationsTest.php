<?php


namespace Tests\Models;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models;
use Illuminate\Database\Eloquent\Collection;

class ItemRelationsTest extends TestCase
{
    /**
     * 1. Sprawdzenie czy relacja hasMany ItemSize zwraca obiekt Collection.
     * 2. Sprawdzenie czy relacja hasMany ItemSize zwraca kolekcje zawierającą obiekty ItemSize.
     * 3. Sprawdzenie czy relacja hasMany ItemSize zwraca kolekcje zawierającą odpowiednią ilość modeli.
     * 4. Sprawdzenie czy usunięcie obiektu Item z bazy danych pociąga usunięcie powiązanych danych, czyli obiektów ItemSize.
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
    }

    /**
     * 1. Test if form has collection of sizes.
     *
     * @test
     * @return void
     */
    public function item_has_collection_of_sizes()
    {
        Models\ItemSize::factory()->create(['item_id' => $this->item->id]);

        $this->assertInstanceOf(Collection::class, $this->item->size);
    }

    /**
     * 2. Test if Item has Size.
     *
     * @test
     * @return void
     */
    public function item_has_size()
    {
        Models\ItemSize::factory()->create(['item_id' => $this->item->id]);

        $this->assertInstanceOf(Models\ItemSize::class, $this->item->size->first());
    }

    /**
     * 3. Test if item has correct number of sizes.
     *
     * @test
     * @return void
     */
    public function form_has_statuses()
    {
        Models\ItemSize::factory()->create(['item_id' => $this->item->id]);
        Models\ItemSize::factory()->create(['item_id' => $this->item->id]);
        Models\ItemSize::factory()->create(['item_id' => $this->item->id]);

        $this->assertEquals(3, $this->item->size->count());
    }

    /**
     * 4. Test if deleting item trigger cascade deletes on item_sizes table.
     *
     * @test
     * @return void
     */
    public function if_deleting_status_trigger_cascade_deletes_on_form_status()
    {
        Models\ItemSize::factory()->create(['item_id' => $this->item->id]);
        $this->item->delete();

        $this->assertEquals(0, Models\ItemSize::where('item_id', $this->item->id)->get()->count());
    }
}
