<?php


namespace App\Controller;


use App\Entity\Category;
use App\Entity\Job;
use App\Service\JobHistoryService;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends AbstractController
{
   /**
    * Finds and displays a category entity.
    *
    * @Route("/categoy/{slug}/{page}", name="category.show", methods="GET", defaults={"page":1}, requirements={"page"="\d+"})
    *
    *@param Category $category
    *@param PaginatorInterface $paginator
    *@param int $page
    *@param JobHistoryService $jobHistoryService
    *@return Response
    */
   public function show(Category $category, PaginatorInterface $paginator, int $page, JobHistoryService $jobHistoryService): Response
   {
       $activeJobs = $paginator->paginate(
           $this->getDoctrine()->getRepository(Job::class)->getPaginatedActivateJobsByCategoryQuery($category), $page, $this->getParameter('max_jobs_on_category'));
       return $this->render('category/show.html.twig',['category'=>$category,
           'activeJobs'=>$activeJobs,
           'historyJobs' => $jobHistoryService->getJobs(),]);
   }
}