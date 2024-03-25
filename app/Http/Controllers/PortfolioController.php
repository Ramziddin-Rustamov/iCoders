<?php

// app/Http/Controllers/PortfolioController.php

namespace App\Http\Controllers;

use App\Http\Requests\PortfolioRequest;
use App\Models\Portfolio;
use App\Repositories\PortfolioRepository;
use App\Services\FileUploadService;
use App\Services\PortfolioService;

class PortfolioController extends Controller
{
    protected $portfolioRepository;
    protected $fileUploadService;
    protected $portfolioService;

    public function __construct(
        PortfolioService $portfolioService,
        PortfolioRepository $portfolioRepository,
        FileUploadService $fileUploadService
    ) {
        $this->portfolioService = $portfolioService;
        $this->portfolioRepository = $portfolioRepository;
        $this->fileUploadService = $fileUploadService;
    }

    public function indexAdmin()
    {
        $portfolio = $this->portfolioService->indexPaginate(6);
        return view('portfolio.index',compact('portfolio'));
    }

    public function index (){
        $portfolio  = $this->portfolioService->indexPaginate(6);
        $count  = $this->portfolioService->countPortfolioes();
        return view('portfolio.index', compact('portfolio','count'));
    }


    public function show(Portfolio $portfolio)
    {
        return view('portfolio.show', compact('portfolio'));
    }


    public function store(PortfolioRequest $request)
    {
        $data = $request->validated();
        $images = $this->fileUploadService->uploadImages($request);
        $data['image'] = json_encode($images);
        $this->portfolioRepository->create($data);

        return back()->with('success', 'Portfolio created successfully!');
    }

    public function update(PortfolioRequest $request, Portfolio $portfolio)
    {
        $data = $request->validated();
        $images = $this->fileUploadService->uploadImages($request);
        $data['image'] = json_encode($images);

        $this->fileUploadService->deleteImage($portfolio->image);
        $this->portfolioRepository->update($portfolio, $data);

        return redirect()->route('admin.portfolio.index')->with('success', 'Updated');
    }

    public function delete($id)
    {
        $portfolio = $this->portfolioService->findOne($id);

        if ($portfolio) {
            $this->fileUploadService->deleteImage($portfolio->image);
            $this->portfolioRepository->delete($portfolio);
            return back()->with('success', 'Portfolio deleted');
        }

        return back()->with('errors', 'Not found');
    }
}
