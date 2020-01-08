<?php

namespace Jane\OpenApiRuntime\Client;

use Http\Client\HttpClient;
use Http\Message\MessageFactory;
use Http\Message\StreamFactory;
use Symfony\Component\Serializer\SerializerInterface;

@trigger_error(sprintf('The "%s" class is deprecated since Jane 5.1, use "%s" instead.', Psr7HttplugClient::class, Psr18Client::class), E_USER_DEPRECATED);

/**
 * @deprecated since Jane 5.1, use Psr18Client instead.
 */
abstract class Psr7HttplugClient extends Client
{
    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * @var MessageFactory
     */
    protected $messageFactory;

    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * @var StreamFactory
     */
    protected $streamFactory;

    public function __construct(HttpClient $httpClient, MessageFactory $messageFactory, SerializerInterface $serializer, StreamFactory $streamFactory = null)
    {
        $this->httpClient = $httpClient;
        $this->messageFactory = $messageFactory;
        $this->serializer = $serializer;
        $this->streamFactory = $streamFactory;
    }

    /**
     * @return mixed
     */
    public function executePsr7Endpoint(Psr7Endpoint $endpoint, string $fetch = self::FETCH_OBJECT)
    {
        [$bodyHeaders, $body] = $endpoint->getBody($this->serializer, $this->streamFactory);
        $queryString = $endpoint->getQueryString();
        $uriGlue = false === strpos($endpoint->getUri(), '?') ? '?' : '&';
        $uri = $queryString !== '' ? $endpoint->getUri() . $uriGlue . $queryString : $endpoint->getUri();
        $request = $this->messageFactory->createRequest($endpoint->getMethod(), $uri, $endpoint->getHeaders($bodyHeaders), $body);

        return $endpoint->parsePSR7Response($this->httpClient->sendRequest($request), $this->serializer, $fetch);
    }
}
