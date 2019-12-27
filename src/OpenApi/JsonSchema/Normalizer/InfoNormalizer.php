<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Jane\OpenApi\JsonSchema\Normalizer;

use Jane\JsonSchemaRuntime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class InfoNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Jane\\OpenApi\\JsonSchema\\Model\\Info';
    }

    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof \Jane\OpenApi\JsonSchema\Model\Info;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (!is_object($data)) {
            return null;
        }
        if (isset($data->{'$ref'})) {
            return new Reference($data->{'$ref'}, $context['document-origin']);
        }
        if (isset($data->{'$recursiveRef'})) {
            return new Reference($data->{'$recursiveRef'}, $context['document-origin']);
        }
        $object = new \Jane\OpenApi\JsonSchema\Model\Info();
        $data = clone $data;
        if (property_exists($data, 'title') && $data->{'title'} !== null) {
            $object->setTitle($data->{'title'});
            unset($data->{'title'});
        }
        if (property_exists($data, 'description') && $data->{'description'} !== null) {
            $object->setDescription($data->{'description'});
            unset($data->{'description'});
        }
        if (property_exists($data, 'termsOfService') && $data->{'termsOfService'} !== null) {
            $object->setTermsOfService($data->{'termsOfService'});
            unset($data->{'termsOfService'});
        }
        if (property_exists($data, 'contact') && $data->{'contact'} !== null) {
            $object->setContact($this->denormalizer->denormalize($data->{'contact'}, 'Jane\\OpenApi\\JsonSchema\\Model\\Contact', 'json', $context));
            unset($data->{'contact'});
        }
        if (property_exists($data, 'license') && $data->{'license'} !== null) {
            $object->setLicense($this->denormalizer->denormalize($data->{'license'}, 'Jane\\OpenApi\\JsonSchema\\Model\\License', 'json', $context));
            unset($data->{'license'});
        }
        if (property_exists($data, 'version') && $data->{'version'} !== null) {
            $object->setVersion($data->{'version'});
            unset($data->{'version'});
        }
        foreach ($data as $key => $value) {
            if (preg_match('/^x-/', $key)) {
                $object[$key] = $value;
            }
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = new \stdClass();
        if (null !== $object->getTitle()) {
            $data->{'title'} = $object->getTitle();
        }
        if (null !== $object->getDescription()) {
            $data->{'description'} = $object->getDescription();
        }
        if (null !== $object->getTermsOfService()) {
            $data->{'termsOfService'} = $object->getTermsOfService();
        }
        if (null !== $object->getContact()) {
            $data->{'contact'} = $this->normalizer->normalize($object->getContact(), 'json', $context);
        }
        if (null !== $object->getLicense()) {
            $data->{'license'} = $this->normalizer->normalize($object->getLicense(), 'json', $context);
        }
        if (null !== $object->getVersion()) {
            $data->{'version'} = $object->getVersion();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/^x-/', $key)) {
                $data->{$key} = $value;
            }
        }

        return $data;
    }
}
