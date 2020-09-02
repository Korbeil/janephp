<?php

namespace Gounlaf\JanephpBug\Runtime;

interface ValidatorInterface
{
    public function validate($data) : void;
}