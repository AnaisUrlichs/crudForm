<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Services\Fetcher;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    /**
     * @Route("/form", name="form")
     */
    public function index(Request $request, Fetcher $fetcher)
    {
        $post = new Post();

        $form = $this->createForm(PostType::class, $post, [
            'action' => $this->generateUrl('form')
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();
        }
           return $this->render('form/index.html.twig', [
               'post_form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/showPost/{id}", name="show_post")
     */
    public function showPost(Request $request, Post $post) {
        return $this->render('home/show_post.html.twig', [
            'post' => $post
        ]);
    }
}
