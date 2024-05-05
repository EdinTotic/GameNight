<?php

namespace App\Controller;

use App\Entity\Gamenight;
use App\Entity\GamenightSnacks;
use App\Entity\GamenightTags;
use App\Entity\Invites;
use App\Entity\Tags;
use App\Form\GamenightType;
use App\Form\InviteForm;
use App\Repository\GamenightParticipantRepository;
use App\Repository\GamenightRepository;
use App\Repository\GamenightSnacksRepository;
use App\Repository\GamenightTagsRepository;
use App\Repository\GameRepository;
use App\Repository\InvitesRepository;
use App\Repository\SnacksRepository;
use App\Repository\TagsRepository;
use App\Repository\UserRepository;
use App\Service\FileUploader;
use DateTime;
use DateTimeZone;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[Route('/gamenight')]
class GamenightController extends AbstractController
{
    #[Route('/', name: 'app_gamenight_index', methods: ['GET'])]
    public function index(GamenightRepository $gamenightRepository, Request $request, HttpClientInterface $client): Response
    {
        $user = $this->getUser();
        if (isset($user)) {
            $username = $user->getUsername();
        } else {
            $username = 'Username';
        }
        $everything = $gamenightRepository->findAll();
        $res = [];
        if($location = $request->get("search_loc")){
            $response = json_decode($client->request(
                'GET',
                "https://maps.googleapis.com/maps/api/geocode/json?address=$location&key=AIzaSyCra3nOT8dDv0eJdkjrSFvs34V6KpZ-YSo"
            )->getContent())->results[0]->geometry->location;

            foreach($everything as $index=>$game){
                $a = $game->getLat() - $response->lat;
                $b = $game->getLng() - $response->lng;
                $dist = sqrt($a * $a + $b * $b);
                $game->dist = $dist;

                // $res[$index] = $dist;
            }
            
            
            usort($everything, function ($a, $b){
                if ($a->dist == $b->dist) {
                    return 0;
                }
                return ($a->dist < $b->dist) ? -1 : 1;
            });
    
            return $this->render('gamenight/index.html.twig', [
                'gamenights' => $everything,
                'username' => $username
            ]);
        }
        

        
        

        return $this->render('gamenight/index.html.twig', [
            'gamenights' => $gamenightRepository->findAll(),
            'username' => $username
        ]);
    }
    
    #[Route('/search', name: 'app_gamenight_search', methods: ['GET'])]
    public function search_by_tag(GamenightTagsRepository $gtr, GamenightRepository $gamenightRepository): Response
    {
        $user = $this->getUser();
        if (isset($user)) {
            $username = $user->getUsername();
        } else {
            $username = 'Username';
        }
        if (isset($_GET['search_tag'])) {
            $search_tag = $_GET['search'];
            $gamenights = $gtr->FindGamenightsByTag($search_tag);
            $gamenights = array_column($gamenights, 'id');
            return $this->render('gamenight/index.html.twig', [
                'gamenights' => $gamenightRepository->findBy(['id' => $gamenights]),
                'username' => $username
            ]);
        }
    }

    #[Route('/new', name: 'app_gamenight_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, FileUploader $fileUploader, UserRepository $ur, HttpClientInterface $client): Response
    {
        $user = $this->getUser();
        if (isset($user)) {
            $username = $user->getUsername();
        } else {
            $username = 'Username';
        }
        $gamenight = new Gamenight();
        $form = $this->createForm(GamenightType::class, $gamenight);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $location = urlencode($form->get("location")->getData());

            $response = json_decode($client->request(
                'GET',
                "https://maps.googleapis.com/maps/api/geocode/json?address=$location&key=AIzaSyCra3nOT8dDv0eJdkjrSFvs34V6KpZ-YSo"
            )->getContent())->results[0]->geometry->location;

            $gamenight->setLat($response->lat);
            $gamenight->setLng($response->lng);

            $uploadFile = $form->get('gn_image')->getData();
            $gamenight->setGnImage("Default_GN.jpg");
            if ($uploadFile) {
                $uploadFileName = $fileUploader->upload($uploadFile);
                $gamenight->setGnImage($uploadFileName);
            }
            $gamenight->setFkUserId($ur->findOneBy(['id' => $_POST['user_id']]));
            $entityManager->persist($gamenight);
            $entityManager->flush();

            return $this->redirectToRoute('app_gamenight_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('gamenight/new.html.twig', [
            'gamenight' => $gamenight,
            'form' => $form,
            'user_id' => $user->getId(),
            'username' => $username
        ]);
    }

    // Snacks von jan einbauen sobald vorhanden
    // !DONE Tags einbauen
    // !DONE Invite einbauen wenn user creator ist ansonsten request to join an creator
    #[Route('/{id}', name: 'app_gamenight_show', methods: ['GET'])]
    public function show(Gamenight $gamenight, GamenightRepository $gr, Request $request, UserRepository $ur, EntityManagerInterface $entityManager, InvitesRepository $ir, TagsRepository $tr, GamenightTagsRepository $gnr, SnacksRepository $sr, GamenightSnacksRepository $gsnr, GameRepository $gamer, GamenightParticipantRepository $gnpr): Response
    {
        $creator = $gr->FindGNCreator($request->get('id'));
        $user = $this->getUser();
        if (isset($user)) {
            $username = $user->getUsername();
        } else {
            $username = 'Username';
        }
        $message = '';
        $tags_of_gamenight = $gnr->FindAllTagsForGameNight($gamenight->getId());
        $message_snack = '';
        $game = $gamer->findOneBy(['id' => $gamenight->getFkGameId()]);
        // $creator_username = $user->getUsername();

        if (isset($_GET['invite'])) {
            $invite_user = $_GET['invite_user'];
            $exists = $ur->userExists($invite_user);
            if (!empty($exists)) {
                $invite_exists = $ir->InviteExist($exists->getId(), $gamenight->getId());
                if (!empty($invite_exists)) {
                    $message = 'User already invited';
                } else {
                    $new_invite = new Invites;

                    $new_invite->setFkUserInviter($user);
                    $new_invite->setFkUserInvitee($exists);
                    $new_invite->setFkGamenightId($gamenight);
                    $new_invite->setStatus('pending');
                    $new_invite->settype('invite');
                    $now = new DateTime();
                    $newTimezone = new DateTimeZone('CEST');
                    $now->setTimezone($newTimezone);
                    $new_invite->setDate($now);

                    $entityManager->persist($new_invite);
                    $entityManager->flush();

                    $message = 'Invite sent';
                }
            } else {
                $message = 'Username or Email does not exist';
            }
        }
        if (isset($_GET['request'])) {
            $invite_exists = $ir->InviteExist($user->getId(), $gamenight->getId());
            if (!empty($invite_exists)) {
                $message = 'You have already requested to join this Game night';
            } else {
                $new_invite = new Invites;

                $new_invite->setFkUserInviter($gamenight->getFkUserId());
                $new_invite->setFkUserInvitee($user);
                $new_invite->setFkGamenightId($gamenight);
                $new_invite->setStatus('pending');
                $new_invite->settype('request');
                $now = new DateTime();
                $newTimezone = new DateTimeZone('CEST');
                $now->setTimezone($newTimezone);
                $new_invite->setDate($now);

                $entityManager->persist($new_invite);
                $entityManager->flush();

                $message = 'Request sent';
            }
        }
        if (isset($_GET['add_tag'])) {
            if (isset($_GET['tags'])) {
                $tags = $_GET['tags'];
                foreach ($tags as $tag) {
                    if (!$tr->FindTagExists(strtolower($tag))) {
                        $new_tag = new Tags;
                        $new_tag->setName(strtolower($tag));
                        $entityManager->persist($new_tag);
                        $entityManager->flush();
                    }
                    // only add tag to gamenight if it doesn't exist yet
                    $newtag = $tr->FindTagExists(strtolower($tag));
                    if (!$gnr->GameNightHasTag($newtag[0]->getId())) {
                        // Create new table entry for gamenight tag
                        $new_gamenight_tag = new GamenightTags;
                        $new_gamenight_tag->setFkGamenightId($gamenight);
                        $new_gamenight_tag->setFkTagId($newtag[0]);
                        $entityManager->persist($new_gamenight_tag);
                        $entityManager->flush();
                    }
                }
            }
        }

        $snacktypes = $sr->GetSnackTypes();
        $snacktypes = array_column($snacktypes, 'type');
        if (isset($_GET['add_snack'])) {
            // if gamenightsnaks has that user with that snack else add
            if (!$gsnr->findBy(['fk_gamenight_id' => $gamenight->getId(), 'fk_snack_id' => $_GET['snack'], 'fk_user_Id' => $user->getId()])) {
                $newsnack = new GamenightSnacks;
                $newsnack->setFkGamenightId($gamenight);
                $newsnack->setFkSnackId($sr->findOneBy(['id' => $_GET['snack']]));
                $newsnack->setFkUserId($user);
                $newsnack->setQuantity($_GET['qty']);

                $entityManager->persist($newsnack);
                $entityManager->flush();

                $message_snack = 'snack has been added';
            } else {
                $message_snack = 'You have already added that snack';
            }
        }

        // Snacks for gamenight
        $snacks_for_gn = $gsnr->GetGameNightSnacks($gamenight->getId());

        // user is part
        $user_is_part = $gnpr->findBy(['fk_gamenight_id' => $gamenight->getId(), 'fk_user_id' => $user->getId()]);

        return $this->render('gamenight/show.html.twig', [
            'gamenight' => $gamenight,
            'creator_id' => $creator[0]['id'],
            'current_id' => $user->getId(),
            'message' => $message,
            'tags' => $tags_of_gamenight,
            'snacks' => $sr->findAll(),
            'snacktypes' => $snacktypes,
            'snackmessage' => $message_snack,
            'gamenight_snacks' => $snacks_for_gn,
            'game' => $game,
            'creator_username' => $creator[0]['username'],
            'is_part' => $user_is_part,
            'username' => $username
        ]);
    }

    #[Route('/{id}/edit', name: 'app_gamenight_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Gamenight $gamenight, EntityManagerInterface $entityManager, GamenightRepository $gr, HttpClientInterface $client): Response
    {
        $user = $this->getUser();
        if (isset($user)) {
            $username = $user->getUsername();
        } else {
            $username = 'Username';
        }
        $creator = $gr->FindGNCreator($request->get('id'));
        if ($user->getId() == $creator[0]['id']) {
            $form = $this->createForm(GamenightType::class, $gamenight);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $location = urlencode($form->get("location")->getData());

                $response = json_decode($client->request(
                    'GET',
                    "https://maps.googleapis.com/maps/api/geocode/json?address=$location&key=AIzaSyCra3nOT8dDv0eJdkjrSFvs34V6KpZ-YSo"
                )->getContent())->results[0]->geometry->location;

                $gamenight->setLat($response->lat);
                $gamenight->setLng($response->lng);
                $entityManager->flush();

                return $this->redirectToRoute('app_gamenight_index', [], Response::HTTP_SEE_OTHER);
            }

            return $this->render('gamenight/edit.html.twig', [
                'gamenight' => $gamenight,
                'form' => $form,
                'username' => $username
            ]);
        } else {
            return $this->redirectToRoute('app_home', ['username' => $username]);
        }
    }

    // !DONE Add to delete that only user that created can delete
    #[Route('/{id}', name: 'app_gamenight_delete', methods: ['POST'])]
    public function delete(Request $request, Gamenight $gamenight, EntityManagerInterface $entityManager, GamenightRepository $gr): Response
    {
        $user = $this->getUser();
        if (isset($user)) {
            $username = $user->getUsername();
        } else {
            $username = 'Username';
        }
        $creator = $gr->FindGNCreator($request->get('id'));
        if ($user->getId() == $creator[0]['id']) {
            if ($this->isCsrfTokenValid('delete' . $gamenight->getId(), $request->getPayload()->get('_token'))) {
                $entityManager->remove($gamenight);
                $entityManager->flush();
            }

            return $this->redirectToRoute('app_gamenight_index', ['username' => $username], Response::HTTP_SEE_OTHER);
        } else {
            return $this->redirectToRoute('app_home', ['username' => $username]);
        }
    }
}
