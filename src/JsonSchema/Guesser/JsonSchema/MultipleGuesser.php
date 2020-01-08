<?php

namespace Jane\JsonSchema\Guesser\JsonSchema;

use Jane\JsonSchema\Guesser\ChainGuesserAwareInterface;
use Jane\JsonSchema\Guesser\ChainGuesserAwareTrait;
use Jane\JsonSchema\Guesser\Guess\MultipleType;
use Jane\JsonSchema\Guesser\GuesserInterface;
use Jane\JsonSchema\Guesser\TypeGuesserInterface;
use Jane\JsonSchema\Model\JsonSchema;
use Jane\JsonSchema\Registry;

class MultipleGuesser implements GuesserInterface, TypeGuesserInterface, ChainGuesserAwareInterface
{
    use ChainGuesserAwareTrait;

    /**
     * {@inheritdoc}
     */
    public function supportObject($object)
    {
        $class = $this->getSchemaClass();

        return ($object instanceof $class) && \is_array($object->getType());
    }

    protected function getSchemaClass(): string
    {
        return JsonSchema::class;
    }

    /**
     * {@inheritdoc}
     */
    public function guessType($object, string $name, string $reference, Registry $registry)
    {
        $typeGuess = new MultipleType($object);
        $fakeSchema = clone $object;

        foreach ($object->getType() as $type) {
            $fakeSchema->setType($type);
            $typeGuess->addType($this->chainGuesser->guessType($fakeSchema, $name, $reference, $registry));
        }

        return $typeGuess;
    }
}
