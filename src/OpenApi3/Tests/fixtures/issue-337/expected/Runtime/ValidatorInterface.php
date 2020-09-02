<?php

namespace CreditSafe\API\Runtime;

interface ValidatorInterface
{
    public function validate($data) : void;
}