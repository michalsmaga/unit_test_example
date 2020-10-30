<?php


namespace App\Http\Controllers;


use App\Models\Item;
use App\Helpers;
use App\Models\ItemSize;
use Illuminate\Http\Request;
use Exception;

class ItemSizeController extends Controller
{
    /**
     * Return an Item.
     *
     * @param Item $item
     * @param string $order
     * @return mixed
     */
    public function get(Item $item, string $order = 'asc')
    {
        try {
            $sizes = $item->getSortedSizes($order);
            return Helpers\ResponseHelper::make(200, $sizes->toArray());
        } catch (Exception $e) {
            return Helpers\ResponseHelper::make(500, 'Internal error');
        }
    }

    /**
     * Create new size for Item.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Item $item)
    {
        try {
            if ($request->has('size')) {
                $data = [
                    'size' => $request->input('size'),
                    'item_id' => $item->id
                ];
                $size = new ItemSize($data);

                if (!$size->validate()) {
                    return Helpers\ResponseHelper::make(400, $size->getErrors());
                }

                $item->size()->save($size);
            }

            return Helpers\ResponseHelper::make(201, $size->toArray());
        } catch (Exception $e) {
            return Helpers\ResponseHelper::make(500, 'Internal error');
        }
    }
}
