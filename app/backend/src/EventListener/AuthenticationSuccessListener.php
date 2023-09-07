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

        $payload['user'] = [
            "id" => $user->getId(),
            "email" => $user->getEmail(),
            "role" => $user->getRoles(),
            "fistName" => $user->getFirstName(),
            "lastName" => $user->getLastName(),
            "phone" => $user->getPhone(),
            "address" => $user->getAddress()
        ];

        $event->setData($payload);
    }
}