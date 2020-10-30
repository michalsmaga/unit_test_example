<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemSize extends Base
{

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'size',
        'item_id',
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
        'size' => 'required|alpha|in:small,medium,large,extra',
        'item_id' => 'required|numeric',
    ];

    /**
     * Return Item object related to ItemSize.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item()
    {
        return $this->belongsTo('App\Models\ItemSize');
    }

    /**
     * Scope for item_id.
     *
     * @param $query
     * @param $id
     * @return mixed
     */
    public function scopeWithItemId($query, $id)
    {
        return $query->where('item_id', $id);
    }
}
