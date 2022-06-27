<?php

namespace App\Controller;

use App\Form\EditProfileType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')]
    public function index(): Response
    {
        return $this->render('profile/show_profile.html.twig');
    }

    #[Route('/profile/edit', name: 'edit_user')]
    public function editProfile(Request $request, EntityManagerInterface $em)
    {
        $user = $this->getUser();
        $form = $this->createForm(EditProfileType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('app_profile');
        }
            return $this->render('profile/edit_profile.html.twig',[
                'form' => $form->createView(),
            ]);
    }


    #[Route('/profile/edit/pass', name: 'edit_user_pass')]
    public function editProfilePass(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $userPasswordHasher )
    {

        if ($request->isMethod('POST')){

            $user = $this->getUser();

            if ($request->request->get('pass') == $request->request->get('pass2')){
            $user->setPassword($userPasswordHasher->hashPassword($user, $request->request->get('pass')));
            $em->flush();
            $this->addFlash('message', 'mot de passe mis à jour');
            }else{
                $this->addFlash('error','les deux mot de passe ne correspondent pas');
            }
        }

        return $this->render('profile/edit_pass.html.twig',[

        ]);
    }
}
