<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class helloController {
    /**
     * @Route("/hello")
     */
    public function hello(): Response {
        return new Response("Hello world !");
    }

    /**
     * @Route("/hello/{name}")
     */
    public function helloName($name): Response {
        return new Response("Hello " . $name . " !");
    }
}