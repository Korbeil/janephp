<?php

namespace Github\Exception;

class PullsGetInternalServerErrorException extends \RuntimeException implements ServerException
{
    private $basicError;
    public function __construct(\Github\Model\BasicError $basicError)
    {
        parent::__construct('Internal Error', 500);
        $this->basicError = $basicError;
    }
    public function getBasicError()
    {
        return $this->basicError;
    }
}