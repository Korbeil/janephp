<?php

namespace ApiPlatform\Demo\Endpoint;

class DeleteBookItem extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Psr7Endpoint
{
    protected $id;
    /**
     * 
     *
     * @param string $id 
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }
    use \Jane\OpenApiRuntime\Client\Psr7EndpointTrait;
    public function getMethod() : string
    {
        return 'DELETE';
    }
    public function getUri() : string
    {
        return str_replace(array('{id}'), array($this->id), '/books/{id}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, object $streamFactory = null) : array
    {
        return array(array(), null);
    }
    /**
     * {@inheritdoc}
     *
     * @throws \ApiPlatform\Demo\Exception\DeleteBookItemNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (204 === $status) {
            return null;
        }
        if (404 === $status) {
            throw new \ApiPlatform\Demo\Exception\DeleteBookItemNotFoundException();
        }
    }
}