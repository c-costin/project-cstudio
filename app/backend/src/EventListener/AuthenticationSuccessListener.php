<?php

namespace App\EventListener;

use App\Entity\User;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class AuthenticationSuccessListener
{
    private Serializer $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }
    
    /**
    * @param AuthenticationSuccessEvent $event
    */
    public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event )
    {
        $data = $event->getData();
        $user = $event->getUser();

        if (!$user instanceof User) return;

        $data['user'] = $this->serializer->normalize($user, null, [
            "groups" => ["read:User:item"]
        ]);

        $event->setData($data);
    }
}