<?php

namespace App\Action;

use Interop\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Router;
use Zend\Expressive\Template;
use Zend\Expressive\Twig\TwigRenderer;

class HomePageAction
{
    private $router;

    private $template;
    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(Router\RouterInterface $router, Template\TemplateRendererInterface $template = null, $container = null)
    {
        $this->router   = $router;
        $this->template = $template;
        $this->container = $container;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $data = [];

        $data['routerName'] = 'FastRoute';
        $data['routerDocs'] = 'https://github.com/nikic/FastRoute';

        $data['templateName'] = 'Twig';
        $data['templateDocs'] = 'http://twig.sensiolabs.org/documentation';

        if (!$this->template) {
            return new JsonResponse([
                'welcome' => 'Congratulations! You have installed the zend-expressive skeleton application.',
                'docsUrl' => 'zend-expressive.readthedocs.org',
            ]);
        }

        $data['param1'] = $this->container->get('config')['some_param_for_app'];

        // Transient (Redis) cache
        $cacheFast = $this->container->get('Cache\Transient');

        // Persistent (Filesystem) cache
        $cacheSlow = $this->container->get('Cache\Persistence');

        //$adapter = $this->container->get('Zend\Db\Adapter\Adapter');

        return new HtmlResponse($this->template->render('app::home-page', $data));
    }
}
