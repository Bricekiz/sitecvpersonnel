<?php


namespace App\Controller;


use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use App\Notification\ContactNotification;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class AllController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index() {
        return $this->render('views/index.html.twig');
    }

    /**
     * @Route("/cv", name="cv")
     */
    public function cv() {
        return $this->render('views/cv.html.twig');
    }

    /**
     * @Route("/work", name="work")
     */
    public function work() {
        return $this->render('views/work.html.twig');
    }

    /**
     * @Route("/blog", name="blog")
     */
    public function blog() {
        return $this->render('views/blog.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, EntityManagerInterface $entityManager)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $formContact = $form->createView();

        if ($request->isMethod('POST')){
            $form->handleRequest($request);
        }

        if ($form->isSubmitted() && $form->isValid()) {
        $this->addFlash('success', 'Votre email a bien été envoyé');

        $entityManager->persist($contact);
        $entityManager->flush();
    }



        return $this->render('views/contact.html.twig',
            [
                'form' => $formContact
            ]);
    }

    /**
     * @Route("/mentionslegales", name="mentionsLegales")
     */
    public function mentionsLegales() {
        return $this->render('views/mentionsLegales.html.twig');
    }

    /**
     * @Route("/portfolio", name="portfolio")
     */
    public function portfolio() {
        return $this->render('views/portfolio.html.twig');
    }
}