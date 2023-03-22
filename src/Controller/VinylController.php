<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage():Response{

        $tracks = [
            [
                "song" => "Smells Like Teen Spirit",
                "artist" => "Nirvana"
            ],
            [
                "song" => "Baby One More Time",
                "artist" => "Britney Spears"
            ],
            [
                "song" => "My Heart Will Go On",
                "artist" => "Celine Dion"
            ],
            [
                "song" => "Nothing Compares 2 U",
                "artist" => "Sinead O'Connor"
            ],
            [
                "song" => "Wannabe",
                "artist" => "Spice Girls"
            ],
            [
                "song" => "Jeremy",
                "artist" => "Pearl Jam"
            ],
            [
                "song" => "Waterfalls",
                "artist" => "TLC"
            ],
            [
                "song" => "Gangsta's Paradise",
                "artist" => "Coolio ft. L.V."
            ],
            [
                "song" => "I Will Always Love You",
                "artist" => "Whitney Houston"
            ],
            [
                "song" => "Loser",
                "artist" => "Beck"
            ]
        ];

        //using the twig service instead of
       return $this->render('vinyl/homepage.html.twig', [
            'title' => 'Symfony & 90\'s Jams',
            'tracks' => $tracks
        ]);
    }

    #[Route('/browse/{slug}', name: 'app_browse')]
    public function browse(string $slug = null):Response{

        $genre = $slug ?u(str_replace('-', ' ', $slug))->title(true) : null;

        return  $this->render('vinyl/browse.html.twig', [
            'genre' => $genre
        ]);
    }
}