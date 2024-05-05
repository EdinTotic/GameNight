<?php

namespace App\Controller;

use App\Entity\Gamenight;
use App\Entity\User;
use App\Entity\GamenightParticipant;
use App\Form\UserType;
use App\Repository\GamenightParticipantRepository;
use App\Repository\GamenightRepository;
use App\Repository\InvitesRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/user')]
class UserController extends AbstractController
{
    // Add images from gamenight last 10 
    #[Route('/', name: 'app_user_index', methods: ['GET'])]
    public function index(GamenightRepository $gr): Response
    {
        $user = $this->getUser();
        if (isset($user)) {
            $username = $user->getUsername();
        } else {
            $username = 'Username';
        }
        return $this->render('user/index.html.twig', [
            'username' => $username,
            'gamenights' => $gr->findAll()
        ]);
    }

    #[Route('/my-game-nights', name: 'app_user_gamenights', methods: ['GET', 'POST'])]
    public function my_game_nights(EntityManagerInterface $entityManager)
    {
        $user = $this->getUser();
        if (isset($user)) {
            $username = $user->getUsername();
        } else {
            $username = 'Username';
        }
        $user_game_nights = $entityManager->getRepository(Gamenight::class)->findBy(['fk_user_id' => $user->getId()], ['date' => 'DESC']);


        return $this->render('user/my_game_nights.html.twig', [
            'username' => $username,
            'first_name' => $user->getFirstName(),
            'last_name' => $user->getLastName(),
            'user_image' => $user->getUserImage(),
            'user_game_nights' => $user_game_nights
        ]);
    }

    #[Route('/my-game-nights-participate', name: 'app_user_gamenights_part', methods: ['GET', 'POST'])]
    public function my_game_nights_part(GamenightParticipantRepository $gpr)
    {
        $user = $this->getUser();
        if (isset($user)) {
            $username = $user->getUsername();
        } else {
            $username = 'Username';
        }
        // $user_game_nights = $entityManager->getRepository(GamenightParticipant::class)->findBy(['fk_user_id' => $user->getId()]);
        $user_game_nights = $gpr->FindByGameID($user->getId());

        return $this->render('user/my_game_nights_part.html.twig', [
            'username' => $username,
            'user_game_nights' => $user_game_nights
        ]);
    }

    #[Route('/invites', name: 'app_user_invites', methods: ['GET', 'POST'])]
    public function my_invites(EntityManagerInterface $entityManager, InvitesRepository $invitesRepository, GamenightRepository $gn, UserRepository $ur)
    {
        $user = $this->getUser();
        if (isset($user)) {
            $username = $user->getUsername();
        } else {
            $username = 'Username';
        }

        if (isset($_GET['accept'])) {
            $in_id = $_GET['id'];
            $invite = $invitesRepository->findOneBy(['id' => $in_id]);
            $invite->setStatus('accept');

            $new_part = new GamenightParticipant;
            $new_part->setFkUserId($ur->findOneBy(['id' => $_GET['user_id']]));
            $new_part->setFkGamenightId($gn->findOneBy(['id' => $_GET['gnID']]));

            $entityManager->persist($invite);
            $entityManager->persist($new_part);
            $entityManager->flush();
        }
        if (isset($_GET['decline'])) {
            $in_id = $_GET['id'];
            $invite = $invitesRepository->findOneBy(['id' => $in_id]);
            $invite->setStatus('decline');

            $entityManager->persist($invite);
            $entityManager->flush();
        }

        $user_invites = $invitesRepository->FindByUserInvites($user->getId());
        $user_requests = $invitesRepository->FindByUserRequests($user->getId());
        // dd($user_invites);

        // dd($invitesRepository->findBy(["fk_user_invitee" => $user->getId()]));

        // $user_invites = $entityManager->getRepository(Invites::class)->findBy(['fk_user_invitee' => $user->getId()]);

        // dd($user_invites);


        return $this->render('user/invites.html.twig', [
            'username' => $username,
            'user_invites' => $user_invites,
            'user_requests' => $user_requests,
            'current_user_id' => $user->getId()
        ]);
    }

    #[Route('/change_pw', name: 'app_user_change_pw')]
    public function change_pw(UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager, Request $request): Response
    {
        $user = $this->getUser();
        if (isset($user)) {
            $username = $user->getUsername();
        } else {
            $username = 'Username';
        }
        $message = '';


        if ($request->request->get('save_pw')) {
            $new_pw = $request->request->get('new_pw');
            $new_pw_repeat = $request->request->get('new_pw_repeat');

            if (strlen($new_pw) == 0) {
                $message = '<div class="alert alert-danger" role="alert">
                Password can\'t be empty!
              </div>';
            } else {
                if ($new_pw == $new_pw_repeat) {
                    $user->setPassword($passwordHasher->hashPassword(
                        $user,
                        $new_pw
                    ));

                    $entityManager->persist($user);
                    $entityManager->flush();

                    $message = '<div class="alert alert-success" role="alert">
                    Password successfully changed
                  </div>';
                } else {

                    $message = '<div class="alert alert-danger" role="alert">
                    Passwords do not match!
                  </div>';
                }
            }
        }
        return $this->render('user/change_pw.html.twig', [
            'message' => $message,
            'username' => $username
        ], new Response(null, $message == "" ? 200 : 422));
    }


    #[Route('/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        if (isset($user)) {
            $username = $user->getUsername();
        } else {
            $username = 'Username';
        }
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        $message = '';


        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $message = '<div class="alert alert-success" role="alert">
                    successfully changed
                  </div>';

            // return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
            return $this->render('user/edit.html.twig', [
                'user' => $user,
                'form' => $form,
                'username' => $username,
                'message' => $message
            ], new Response(null, $message == "" ? 200 : 422));
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
            'username' => $username,
            'message' => $message
        ]);
    }
}
