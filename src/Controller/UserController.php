<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="app_user")
     */
    public function index(Request $request): Response
    {
        // Create a new User Entity
        $user = new User();
        $user->setName('');

        // Create a form with a User class form
        $form = $this->createForm(UserType::class, $user);

        // Handle form request and redirect back to user page
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $this->addFlash('success', 'You have successfully submitted your data!');
            return $this->redirectToRoute('app_user');
        }

        // Render Twig Form
        return $this->renderForm('user/new.html.twig', [
            'form' => $form,
        ]);
    }
}
