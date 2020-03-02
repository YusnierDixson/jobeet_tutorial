<?php


namespace App\Controller;

use App\Entity\Job;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 *
 * @Route("job")
 */
class JobController extends AbstractController
{
/**
 * Lists all job entites.
 *
 * @Route("/", name="job.list")
 *
 * @return Response
 */
public function list():Response
{
    $jobs=$this->getDoctrine()->getRepository(Job::class)->findAll();
    return $this->render('job/list.html.twig',['jobs'=>$jobs,]);
}

/**
 * Finds and displays a job entity.
 *
 * @param Job $job
 * @return Response
 */
public function show(Job $job):Response
{
    return $this->render('job/show.html.twig', ['job'=>$job,]);

}
}