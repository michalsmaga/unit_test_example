<?php


namespace App\Helpers;


use App\Models;
use App\Helpers;
use App\User;
use Illuminate\Support\Facades\App;

class LoggerHelper
{

    /**
     * Prepare and return HTTP response.
     *
     * @param string $status
     * @param string $message
     * @param array $requestData
     * @param mixed $httpCode
     * @return void
     */
    public static function log(string $status, string $message, array $requestData, $httpCode = null): void
    {
        $requestData['user_id'] = self::getUserId();
        $requestData['status'] = $status;
        $requestData['message'] = $message;
        $requestData['http_code'] = $httpCode;

        $log = new Models\Log($requestData);
        $log->save();
    }

    /**
     * Return ID of current user or NULL if endpoint is executed without user context.
     *
     * @return mixed|null
     */
    protected static function getUserId()
    {
        $userHelper = Helpers\UserHelper::getInstance();
        $user = $userHelper->getUser();
        return ($user instanceof User) ? $user->id : null;
    }
}
