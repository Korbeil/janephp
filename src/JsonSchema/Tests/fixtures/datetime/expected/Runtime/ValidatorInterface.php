<?php

namespace Jane\JsonSchema\Tests\Expected\Runtime;

interface ValidatorInterface
{
    public function validate($data) : void;
}