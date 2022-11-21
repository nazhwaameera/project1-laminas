<?php

declare(strict_types=1);

namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        // $this->flashMessenger()->addSuccessMessage('It works!');
        // $this->flashMessenger()->addInfoMessage('Just here for you');
        return new ViewModel();
    }
}
