<?php

namespace Jane\OpenApi\Tests\Expected\Runtime;

interface ValidatorInterface
{
    public function validate($data) : void;
}