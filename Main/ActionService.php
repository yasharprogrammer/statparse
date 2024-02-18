<?php

namespace Main;

use Closure;
use ErrorException;
use Main\Contracts\IActionService;
use Main\Contracts\IView;

final class ActionService implements IActionService
{
    private FileReader $fileReader;

    private readonly IView $view;

    private readonly StatRepository $statRepository;

    public function __construct()
    {
        $this->fileReader = new FileReader();
        $this->statRepository = new StatRepository();
        $this->view = new View();
    }

    /**
     * @throws ErrorException
     */
    public function handle(): void
    {
        if (Request::hasUploadedFile()) {
            $this->fileReader->setFile(
                Request::getUploadedFile()
            );
            foreach ($this->fileReader->readFile() as $row) {
                $this->statRepository->addRecord($row);
            }
            Request::redirect('?list');
        } elseif (Request::has('list')) {
            $this->view->render('list', [
                'records' => $this->statRepository->getAll()
            ]);
        } else {
            $this->view->render('index');
        }
    }
}
