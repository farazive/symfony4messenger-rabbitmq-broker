<?php
/**
 * Created by PhpStorm.
 * User: Faraz
 * Date: 8/10/2018
 * Time: 2:16 PM
 */

// src/MessageHandler/MyMessageHandler.php
namespace App\MessageHandler;

use App\Message\MyMessage;

/**
 * Class MyMessageHandler
 * @package App\MessageHandler
 */
class MyMessageHandler
{
    /**
     * @param MyMessage $message
     */
    public function __invoke(MyMessage $message)
    {
        echo $message->getMessage() . ":" . $message->getSecret();
        // do something with it.
    }
}