<?php 
namespace App\Controller\Home;

use App\Controller\AbstractController;
use Override;

class HomeController extends AbstractController
{
    #[Override]
    public function index(array $requestData): void
    {
        $this->render('home/home.php');
    }
}
?>