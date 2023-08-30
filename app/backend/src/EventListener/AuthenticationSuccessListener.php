<?php

namespace App\EventListener;

use App\Entity\User;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Symfony\Component\Serializer\SerializerInterface;

class AuthenticationSuccessListener
{
    public function __construct(
        private SerializerInterface $serializer
    )
    {}
    
    /**
    * @param AuthenticationSuccessEvent $event
    */
    public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event)
    {
        $payload = $event->getData();
        $user = $event->getUser();

        if (!$user instanceof User) return;

        $payload['user'] = $this->serializer->serialize($user, 'json', [
            "groups" => ["read:User:item"]
        ]);

        // dd($payload);

        $event->setData($payload);
    }
}