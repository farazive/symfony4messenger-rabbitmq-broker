<?php
/**
 * Created by PhpStorm.
 * User: Faraz
 * Date: 8/10/2018
 * Time: 2:09 PM
 */

// src/Controller/DefaultController.php
namespace App\Controller;

use App\Message\MyMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Transport\Serialization\SerializerConfiguration;

/**
 * Class DefaultController
 * @package App\Controller
 */
class DefaultController extends AbstractController
{
    /**
     * @param MessageBusInterface $bus
     *
     * @return Response
     */
    public function indexAction(MessageBusInterface $bus)
    {
        $message = new MyMessage( 'A string to be sent...', "SUPERSECRET" );

        $envelope = new Envelope( $message );

        $bus->dispatch(
            //$message

            $envelope->with(
                new SerializerConfiguration(
                    [
                        'groups' => ['my_serialization_group'],
                    ]
                )
            )
        );


        return new Response( "done" );
    }
}