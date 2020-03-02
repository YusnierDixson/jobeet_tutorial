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
 * @Route("/", name="job.list", methods="GET")
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
 * @Route("/{id}", name="job.show", methods="GET", requirements={"id" = "\d+"})
 *
 * @param Job $job
 * @return Response
 */
public function show(Job $job):Response
{
    return $this->render('job/show.html.twig', ['job'=>$job,]);

}
}