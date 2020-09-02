<?php

namespace ApiPlatform\Demo\Runtime;

interface ValidatorInterface
{
    public function validate($data) : void;
}