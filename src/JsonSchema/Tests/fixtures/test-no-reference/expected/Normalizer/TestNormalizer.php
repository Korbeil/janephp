<?php

namespace Jane\JsonSchema\Tests\Expected\Normalizer;

use Jane\JsonSchemaRuntime\Reference;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class TestNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    public function supportsDenormalization($data, string $type, string $format = null)
    {
        return $type === 'Jane\\JsonSchema\\Tests\\Expected\\Model\\Test';
    }
    public function supportsNormalization($data, string $format = null)
    {
        return $data instanceof \Jane\JsonSchema\Tests\Expected\Model\Test;
    }
    public function denormalize($data, $class, string $format = null, array $context = array())
    {
        if (!is_object($data)) {
            throw new InvalidArgumentException(sprintf('Given $data is not an object (%s given). We need an object in order to continue denormalize method.', gettype($data)));
        }
        $object = new \Jane\JsonSchema\Tests\Expected\Model\Test();
        if (property_exists($data, 'string')) {
            $object->setString($data->{'string'});
        }
        if (property_exists($data, 'subObject')) {
            $object->setSubObject($this->denormalizer->denormalize($data->{'subObject'}, 'Jane\\JsonSchema\\Tests\\Expected\\Model\\TestSubObject', 'json', $context));
        }
        return $object;
    }
    public function normalize($object, string $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getString()) {
            $data->{'string'} = $object->getString();
        }
        if (null !== $object->getSubObject()) {
            $data->{'subObject'} = $this->normalizer->normalize($object->getSubObject(), 'json', $context);
        }
        return $data;
    }
}