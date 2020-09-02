<?php

namespace Jane\OpenApi2\Tests\Expected\Runtime;

interface ValidatorInterface
{
    public function validate($data) : void;
}