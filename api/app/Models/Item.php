<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Base
{

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
        'amount',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Validation rules for Form model.
     *
     * @var string[]
     */
    protected $validationRules = [
        'name' => 'required|alpha_num|between:1,10',
        'status' => 'required|alpha|in:active,hold,deleted',
        'amount' => 'required|integer|between:1,999',
    ];

    /**
     * Return collection of ItemSize objects related to Item.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function size()
    {
        return $this->hasMany('App\Models\ItemSize', 'item_id', 'id');
    }

    /**
     * Scope for id.
     *
     * @param $query
     * @param $id
     * @return mixed
     */
    public function scopeWithId($query, $id)
    {
        return $query->where('id', $id);
    }

    /**
     * Set Item name.
     *
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Set Item status.
     *
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * Get sorted collection od ItemSize objects.
     *
     * @param string $order
     * @return mixed
     */
    public function getSortedSizes(string $order)
    {
        if (!in_array(strtolower($order), ['asc', 'desc'])) {
            throw new \Exception('Order parameter must has <asc> or <desc> value.');
        }

        return ItemSize::withItemId($this->id)
            ->orderBy('size', $order)
            ->get();
    }
}
