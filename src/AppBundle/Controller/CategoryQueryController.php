<?php

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Service\Category\CategoryQueryService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route(service="app.controller.category_query_controller")
 */
class CategoryQueryController extends Controller
{
    private $categoryQueryService;

    public function __construct(CategoryQueryService $categoryQueryService)
    {
        $this->categoryQueryService = $categoryQueryService;
    }

    /**
     * @Route("/category/list")
     * @Method({"GET"})
     */
    public function listAction()
    {
        return new JsonResponse([ 'code' => 'OK', 'data' => $this->categoryQueryService->getList() ]);
    }
}