<?php
declare(strict_types=1);

namespace Src\Controller;

use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SuperKernel\HttpServer\Attribute\HttpController;
use SuperKernel\HttpServer\Attribute\RequestMapping;
use SuperKernel\HttpServer\Enumeration\Method;

#[
	HttpController(prefix: '/', server: 'http'),
]
final readonly class IndexController
{
	public function __construct(private RequestInterface $request, private ResponseInterface $response)
	{
	}

	#[RequestMapping(path: 'index', methods: Method::GET)]
	public function index(): ResponseInterface
	{
		return $this->response->withBody(
			new JsonResponse($this->request->getQueryParams())->getBody(),
		);
	}
}