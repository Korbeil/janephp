<?php

namespace Jane\OpenApi2\Tests\Expected\Api2\Runtime;

interface ValidatorInterface
{
    public function validate($data) : void;
}