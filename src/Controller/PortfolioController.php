<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Users;
use App\Entity\Contact;
use App\Entity\Portfolio;
use App\Entity\Skills;
use App\Entity\Experiences;
use App\Entity\Studies;




class PortfolioController extends Controller
{
    /**
     * @Route("/", name="portfolio")
    */
    public function index()
    {
        return $this->render('portfolio/index.html.twig', [
            'controller_name' => 'PortfolioController',
            'skills' => $this->getSkills(),
            'experiences' => $this->getExperiences(),
            'studies' => $this->getStudies(),
        ]);
    }

    /**
     * Return skills
     *
     * @return void
     */
    private function getSkills(){

        $skills = $this->getDoctrine()
            ->getRepository(Skills::class)
            ->findAll();


        return $skills;
    }

    /**
     * Return experiences
     *
     * @return void
     */
    private function getExperiences(){

        $experiences = $this->getDoctrine()
            ->getRepository(Experiences::class)
            ->findBy(array(), array('id' => 'desc'));


        return $experiences;
    }

    /**
     * Return studies
     *
     * @return void
     */
    private function getStudies(){

        $studies = $this->getDoctrine()
            ->getRepository(Studies::class)
            ->findBy(array(), array('id' => 'desc'));


        return $studies;
    }

}
