<?php

namespace App\Serializer;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class DenormalizerIdObject implements DenormalizerInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager
    )
    {}

     /**
     * Denormalizes data back into an object of the given class.
     *
     * @param mixed       $data    Data to restore
     * @param string      $class    The expected class to instantiate
     * @param string|null $format  Format the given data was extracted from
     * @param array       $context Options available to the denormalizer
     *
     * @return mixed
     *
     * $data will match with id of the json
     * $class will match with FQCN of the expected class
     */ 
    public function denormalize($data, string $class, string $format = null, array $context = [])
    {
        return $this->entityManager->find($class,$data);
    }

    /**
     * Checks whether the given class is supported for denormalization by this normalizer.
     *
     * @param mixed       $data   Data to denormalize from
     * @param string      $type   The class to which the data should be denormalized
     * @param string|null $format The format being deserialized from
     *
     * @return bool
     */
    public function supportsDenormalization($data, string $type, string $format = null)
    {
        if(strpos($type,"App\Entity", 0) === 0 && is_int($data))
        {
            return true;
        }
    }
}