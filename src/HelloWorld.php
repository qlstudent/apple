<?php
declare(strict_types=1);
namespace Apple;
use Psr\Http\Message\ResponseInterface;

/**
 *
 *
 * @package   Apple
 */
class HelloWorld
{
    /**
     * @var string
     */
    private $_foo;
    /**
     * @var ResponseInterface
     */
    private $_response;

    /**
     * HelloWorld constructor.
     *
     * @param string            $foo      foo is text that between hello and world 
     * @param ResponseInterface $response response is a response object
     */
    public function __construct(
        string $foo,
        ResponseInterface $response
    ) {
        $this->_foo = $foo;
        $this->response = $response;
    }

    /**
     *
     *
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    public function __invoke(): ResponseInterface
    {
        $response = $this->response->withHeader('Content-Type', 'text/html');
        $response->getBody()
            ->write("<html><head></head><body>Hello, {$this->_foo} world!</body></html>");

        return $response;
    }
}
