<?php

namespace Ikerib\IkasiBundle\Listener;

use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Core\SecurityContext;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine; // for Symfony 2.1.0+
use Symfony\Component\Routing\Router;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Custom login listener.
 */
class LoginListener
{
    /** @var \Symfony\Component\Security\Core\SecurityContext */
    private $securityContext;

    /** @var \Doctrine\ORM\EntityManager */
    private $em;

    /**
     * Constructor
     *
     * @param SecurityContext $securityContext
     * @param Doctrine        $doctrine
     */
    public function __construct(Router $router, SecurityContext $securityContext, Doctrine $doctrine)
    {
        $this->securityContext = $securityContext;
        $this->em              = $doctrine->getEntityManager();
        $this->router          = $router;
    }

    /**
     * Do the magic.
     *
     * @param InteractiveLoginEvent $event
     */
    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {
        $request = $event->getRequest(); /** @var \Symfony\Component\HttpFoundation\Request $request  */

        if ($this->securityContext->isGranted('ROLE_ADMIN')) {
            $request->request->set('_target_path', $this->router->generate('admin_dashboard'));
        } elseif ($this->securityContext->isGranted('ROLE_ADMIN')) {
            $request->request->set('_target_path', $this->router->generate('ikasi_homepage'));
        } else {
            // $response = new RedirectResponse($this->router->generate('homepage'));
            $request->request->set('_target_path', $this->router->generate('homepage'));
        }
    }
}