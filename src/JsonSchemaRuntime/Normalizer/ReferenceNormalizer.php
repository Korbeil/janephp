<?php

namespace Jane\JsonSchemaRuntime\Normalizer;

use Jane\JsonSchemaRuntime\Reference;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ReferenceNormalizer implements NormalizerInterface
{
    /**
     * {@inheritdoc}
     *
     * @return \stdClass
     */
    public function normalize($object, $format = null, array $context = []): \stdClass
    {
        $ref = new \stdClass();
        $ref->{'$ref'} = (string) $object->getReferenceUri();

        return $ref;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof Reference;
    }
}
