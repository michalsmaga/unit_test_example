<?php


namespace App\Http\Controllers;


use App\Models\Item;
use App\Helpers;
use Illuminate\Http\Request;
use Exception;

class ItemController extends Controller
{
    /**
     * Return an Item.
     *
     * @param Item $item
     * @return mixed
     */
    public function get(Item $item)
    {
        try {
            $item->with('size');

            return Helpers\ResponseHelper::make(200, $item->toArray());
        } catch (Exception $e) {
            return Helpers\ResponseHelper::make(500, 'Internal error');
        }
    }

    /**
     * Create new Item.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $data = $request->all();
            $item = new Item($data);

            if (!$item->validate()) {
                return Helpers\ResponseHelper::make(400, $item->getErrors());
            }

            $item->save();

            return Helpers\ResponseHelper::make(201, $item->toArray());
        } catch (Exception $e) {
            return Helpers\ResponseHelper::make(500, 'Internal error');
        }
    }

    /**
     * Change Item.
     * Do not touch its sizes.
     *
     * @param Request $request
     * @param Item $item
     * @return \Illuminate\Http\Response
     */
    public function put(Request $request, Item $item)
    {
        try {
            if ($request->has('name')) {
                $item->setName($request->input('name'));
            }

            if ($request->has('status')) {
                $item->setStatus($request->input('status'));
            }

            if (!$item->validate()) {
                return Helpers\ResponseHelper::make(400, $item->getErrors());
            }
            $item->save();

            return Helpers\ResponseHelper::make(200, "Item {$item->id} updated.");
        } catch (Exception $e) {
            return Helpers\ResponseHelper::make(500, 'Internal error');
        }
    }

    /**
     * Remove Item and its sizes from database..
     *
     * @param Item $item
     * @return mixed
     */
    public function delete(Item $item)
    {
        try {
            $item->delete();

            return Helpers\ResponseHelper::make(200, "Item {$item->id} deleted.");
        } catch (Exception $e) {
            return Helpers\ResponseHelper::make(500, 'Internal error');
        }
    }

    /**
     * Set items size.
     *
     * @param Request $request
     * @param Item $item
     * @return \Illuminate\Http\Response
     */
    public function setSize(Request $request, Item $item)
    {
        try {
            if ($request->has('size')) {
                $item->setSize($request->input('size'));
            }

            if (!$item->validate()) {
                return Helpers\ResponseHelper::make(400, $item->getErrors());
            }
            $item->save();

            return Helpers\ResponseHelper::make(200, "Item {$item->id} updated.");
        } catch (Exception $e) {
            return Helpers\ResponseHelper::make(500, 'Internal error');
        }
    }


}
