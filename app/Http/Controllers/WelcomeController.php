<?php
namespace App\Http\Controllers;

// services
use App\Services\PortfolioService;
use App\Services\PostService;
use App\Services\SlideImageService;
use App\Services\TechnologyService;
use App\Services\UserService;

class WelcomeController extends Controller
{
    private $technologyService;
    private $postService;
    private $userService;
    private $portfolioService;
    private $slideImageService;

    public function __construct(
        TechnologyService $technologyService,
        PostService $postService,
        UserService $userService,
        PortfolioService $portfolioService,
        SlideImageService $slideImageService,
    ) {
        $this->technologyService = $technologyService;
        $this->postService = $postService;
        $this->userService = $userService;
        $this->portfolioService = $portfolioService;
        $this->slideImageService = $slideImageService;
    }
    public function index()
    {
        $postCount = $this->postService->countPosts();
        $teamCount = $this->userService->countUsers();
        $techCount = $this->technologyService->countTechnologies();
        $portfolioCount = $this->portfolioService->countPortfolioes();

        $team = $this->userService->getAdminUsers(4);
        $slides = $this->slideImageService->getSlideImages(3);
        $posts = $this->postService->getLatestPosts(2);
        $technologies = $this->technologyService->getTechnologies(3);
        $portfolio = $this->portfolioService->getLatestPortfolioes(6);

        return view('welcome', compact(
            'posts',
            'team',
            'technologies',
            'portfolio',
            'slides',
            'postCount',
            'teamCount',
            'techCount',
            'portfolioCount'
        ));
    }
}
