<?php

namespace AppBundle\Controller;

use AppBundle\Command\AddCategoryCommand;
use AppBundle\Exception\CommandValidationException;
use AppBundle\Service\Category\AddCategoryService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route(service="app.controller.add_category_controller")
 */
class AddCategoryController extends Controller
{
    private $addCategoryService;

    public function __construct(AddCategoryService $addCategoryService)
    {
        $this->addCategoryService = $addCategoryService;
    }

    /**
     * @Route("/category/add")
     * @Method({"POST"})
     */
    public function addAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $command = new AddCategoryCommand($data['name']);

        try {
            $this->addCategoryService->add($command);

            return new JsonResponse(['code' => 'OK', 'msg' => 'Category added']);
        }
        catch(CommandValidationException $e) {
            return new JsonResponse(['code' => 'VALIDATION_ERROR', 'errors' => (string)$e->getErrors() ], 400);
        }
    }
}
