<?php

namespace Jane\JsonSchema\Tests\Expected\Schema2\Runtime;

interface ValidatorInterface
{
    public function validate($data) : void;
}