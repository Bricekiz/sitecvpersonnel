<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{

    /**
     * @Route("/admin/index", name="adminIndex")
     */
    public function adminIndex() {
        return $this->render('admin/adminIndex.html.twig');
    }

}