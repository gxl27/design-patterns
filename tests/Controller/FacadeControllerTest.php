<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FacadeControllerTest extends WebTestCase {

    public function testRenderPage(): void
    {
        echo("\e[0;32;10m".substr(strrchr(__CLASS__, "\\"), 1)." - ".__FUNCTION__."\n");
        // This calls KernelTestCase::bootKernel(), and creates a
        // "client" that is acting as the browser
        $client = static::createClient();

        // Request a specific page
        $crawler = $client->request('GET', '/facade');

        // Validate a successful response and some content
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Facade');
    }

    public function testSubmitForm(): void
    {
        echo("\e[0;32;10m".substr(strrchr(__CLASS__, "\\"), 1)." - ".__FUNCTION__."\n");
        $client = static::createClient();
        $crawler = $client->request('GET', '/facade');

        $crawler = $client->request('POST', '/facade',[
            'facade[oil]' => '7',
            'facade[fuel]' => '700',
            'facade[temperature]' => '110',
            'facade[flaps]' => '0',
            'facade[landingGear]' => '1',
        ]);

        $this->assertResponseIsSuccessful();
    }

    public function testSubmitedFormResult(): void
    {
        echo("\e[0;32;10m".substr(strrchr(__CLASS__, "\\"), 1)." - ".__FUNCTION__."\n");
        $client = static::createClient();
        $crawler = $client->request('GET', '/facade');


        $crawler = $client->request('POST', '/facade',[
            'facade[oil]' => '7',
            'facade[fuel]' => '700',
            'facade[temperature]' => '110',
            'facade[flaps]' => '0',
            'facade[landingGear]' => '1',
        ]);

        $this->assertResponseIsSuccessful();
    }

}