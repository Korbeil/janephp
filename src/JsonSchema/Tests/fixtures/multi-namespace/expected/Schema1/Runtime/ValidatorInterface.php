<?php

namespace Jane\JsonSchema\Tests\Expected\Schema1\Runtime;

interface ValidatorInterface
{
    public function validate($data) : void;
}