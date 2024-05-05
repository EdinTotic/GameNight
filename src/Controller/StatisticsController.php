<?php

namespace App\Controller;

use App\Repository\GamenightRepository;
use App\Repository\GamenightSnacksRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class StatisticsController extends AbstractController
{
    #[Route('/statistics', name: 'app_statistics')]
    public function index(ChartBuilderInterface $chartBuilder, GamenightSnacksRepository $gnsr, GamenightRepository $gnr): Response
    {

        $user = $this->getUser();
        if (isset($user)) {
            $username = $user->getUsername();
        } else {
            $username = 'Username';
        }
        // games chart

        $games = $gnr->GetMostAddedGames();
        $game_names = [];
        $game_count = [];
        foreach ($games  as $game) {
            array_push($game_names, $game["name"]);
            array_push($game_count, $game["count"]);
        }
        // dd($snacks);
        $chart_games = $chartBuilder->createChart(Chart::TYPE_BAR);
        $chart_games->setData([

            'labels' => $game_names,
            'datasets' => [
                [
                    'label' => 'Count',
                    'backgroundColor' => 'rgb(254, 211, 135)',
                    'borderColor' => 'rgb(0,0,0)',
                    'data' => $game_count,
                ],
            ],
        ]);

        $chart_games->setOptions([
            'scales' => [
                'x' => [
                    'suggestedMin' => 0,
                    'suggestedMax' => $game_count[0],
                ],
            ],
        ]);

        // snack chart
        $snacks = $gnsr->GetMostAddedSnacks();
        $snack_names = [];
        $snack_count = [];
        foreach ($snacks  as $snack) {
            array_push($snack_names, $snack["name"]);
            array_push($snack_count, $snack["count"]);
        }
        $chart_snacks = $chartBuilder->createChart(Chart::TYPE_BAR);
        $chart_snacks->setData([

            'labels' => $snack_names,
            'datasets' => [
                [
                    'label' => 'Count',
                    'backgroundColor' => 'rgb(254, 211, 135)',
                    'borderColor' => 'rgb(0,0,0)',
                    'data' => $snack_count
                ],
            ],
        ]);

        $chart_snacks->setOptions([
            'scales' => [
                'x' => [
                    'suggestedMin' => 0,
                    'suggestedMax' => $snack_count[0],
                ],
            ],
        ]);

        // Host chart 
        $hosts = $gnr->GetMostGameNightHoster();
        $host_names = [];
        $host_count = [];
        foreach ($hosts  as $host) {
            array_push($host_names, $host["username"]);
            array_push($host_count, $host["count"]);
        }
        $chart_hosts = $chartBuilder->createChart(Chart::TYPE_BAR);
        $chart_hosts->setData([

            'labels' => $host_names,
            'datasets' => [
                [
                    'label' => 'Count',
                    'backgroundColor' => 'rgb(254, 211, 135)',
                    'borderColor' => 'rgb(0,0,0)',
                    'data' => $host_count,
                ],
            ],
        ]);

        $chart_hosts->setOptions([
            'scales' => [
                'x' => [
                    'suggestedMin' => 0,
                    'suggestedMax' => $host_count[0],
                ],
            ],
        ]);



        return $this->render('statistics/index.html.twig', [
            'controller_name' => 'StatisticsController',
            'snackchart' => $chart_snacks,
            'gamechart' => $chart_games,
            'hostchart' => $chart_hosts,
            'username' => $username
        ]);
    }
}
