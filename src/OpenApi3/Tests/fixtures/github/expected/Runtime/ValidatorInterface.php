<?php

namespace Github\Runtime;

interface ValidatorInterface
{
    public function validate($data) : void;
}