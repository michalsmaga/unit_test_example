<?php


namespace App\Helpers;


use Illuminate\Http\Response;

class ResponseHelper
{

    /**
     * Prepare and return HTTP response.
     *
     * @param int $status
     * @param array $data
     * @return Response
     */
    public static function make(int $status, $data = [])
    {
        if (empty($data)) {
            $data = '';
        } else {
            if (is_string($data)) {
                $data = [$data];
            }
            $data = json_encode($data);
        }

        return new Response($data, $status);
    }
}
