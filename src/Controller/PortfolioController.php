<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
    public function index(Request $request)
    {
        return $this->render('portfolio/index.html.twig', [
            'controller_name' => 'PortfolioController',
            'skills' => $this->getSkills(),
            'experiences' => $this->getExperiences(),
            'studies' => $this->getStudies(),
            'folios' => $this->getFolios(),
            'form' => $this->createContactForm($request),
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

    /**
     * Return Folio
     *
     * @return void
     */

    private function getFolios(){
        $folios = $this->getDoctrine()
            ->getRepository(Portfolio::class)
            ->findBy(array(), array('id' => 'desc'));


        return $folios;
    }

    /**
     * Return Folio
     *
     * @return void
     */
    private function createContactForm(Request $request){

        $contact = new Contact();

        $form =  $this->createFormBuilder($contact)
            ->add('name_exp', TextType::class, [
                'label' => ' ', 
                'attr' => [
                    'class' => 'form-control', 
                    'placeholder' => 'Your name'
                ]
            ])
            ->add('mail_exp', EmailType::class, [
                'label' => ' ', 
                'required' => true, 
                'attr' => [
                    'class' => 'form-control', 
                    'placeholder' => 'Your Email'
                    ] 
                ])
            ->add('subject', TextType::class, [
                'label' => ' ', 
                'attr' => [
                    'class' => 'form-control', 
                    'placeholder' => 'Subject'
                    ]
                ])
            ->add('message', TextareaType::class, [
                'label' => ' ', 
                'attr' => [
                    'class' => 'form-control', 
                    'placeholder' => 'Your message', 
                    'rows' =>"6" ,
                    'cols' => "60"
                    ]
                ])
            ->add('send', SubmitType::class,[
                'label' => 'Send Message', 
                'attr' => [
                    'class' => 'btn btn-mod btn-border btn-large', 
                    'style' => 'margin-top:15px'
                    ]
                ])
            ->getForm();

            $form->handleRequest($request);

            # check if form is submitted 
 
            if($form->isSubmitted() && $form->isValid()) {
            
                # add data in database
                $sn = $this->getDoctrine()->getManager();      
                $sn -> persist($contact);
                $sn -> flush();
                
                #Send teh Emailportfolio                              
                $message = (new \Swift_Message($form['subject']))
                    #->setSubject($form['subject'])
                    
                    ->setFrom('ezz.otm@gmail.com')
                    ->setTo('otmane.e@codeur.online')
                    ->setBody(
                        $form->getData(['message'], 'text/plain')
                    );
                    $this->get('mailer')->send($message);
                    $this->addFlash('success', 'Your message was send!');
                    return $this->redirectToRoute();
                                 
            }

            return $form->createView();
            
    }  



    

}
