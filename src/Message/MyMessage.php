<?php

namespace App\Message;

use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Class SendNotification
 * @package App\Message
 */
class MyMessage
{
    /**
     * @Groups({"my_serialization_group"})
     */
    private $message;

    /**
     * No Serialization group so it will not be sent by Symfony middleware
     */
    private $secret;

    /**
     * MyMessage constructor.
     *
     * @param null $message
     * @param null $secret
     */
    public function __construct($message = null, $secret = null)
    {
        if ( ! is_null( $message ) ) {
            $this->message = $message;
        }

        if ( ! is_null( $secret ) ) {
            $this->secret = $secret;
        }
    }

    /**
     * @return null
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return null
     */
    public function getSecret()
    {
        return $this->secret;
    }
}