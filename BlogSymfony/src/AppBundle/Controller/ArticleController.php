<?php

namespace AppBundle\Controller;

use AppBundle\Mapper\ArticleMapper;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends Controller
{

    /**
     * @return ArticleMapper
     */
    public function getArticleMapper()
    {
        return $this->container->get('app.mapper.article_mapper');
    }

    /**
     * @Route("/")
     */
    public function listAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('article/list.html.twig', [
            'articles' => $this->getArticleMapper()->findAllWithAuteur(),
        ]);
    }

    /**
     * @Route("/ajouter")
     */
    public function addAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

}
