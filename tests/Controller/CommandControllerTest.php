<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CommandControllerTest extends WebTestCase {



    public function testRenderPage(): void
    {
        echo("\e[0;32;10m".substr(strrchr(__CLASS__, "\\"), 1)." - ".__FUNCTION__."\n");
        // This calls KernelTestCase::bootKernel(), and creates a
        // "client" that is acting as the browser
        $client = static::createClient();

        // Request a specific page
        $crawler = $client->request('GET', '/command');

        // Validate a successful response and some content
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Command');
    }

    public function testSubmitForm(): void
    {
        echo("\e[0;32;10m".substr(strrchr(__CLASS__, "\\"), 1)." - ".__FUNCTION__."\n");
        $client = static::createClient();
        $crawler = $client->request('GET', '/command');

        // select the button
        $buttonCrawlerNode = $crawler->selectButton('Bet');

        // retrieve the Form object for the form belonging to this button
        $form = $buttonCrawlerNode->form();


        $client->submit($form, [
            'command[games][0][marked1]' => '1',
            'command[ballance]' => '100'
        ]);

        $this->assertResponseIsSuccessful();
    }

    public function testSubmitedFormResult(): void
    {
        echo("\e[0;32;10m".substr(strrchr(__CLASS__, "\\"), 1)." - ".__FUNCTION__."\n");
        $client = static::createClient();
        $crawler = $client->request('GET', '/command');

        // select the button
        $buttonCrawlerNode = $crawler->selectButton('Bet');

        // retrieve the Form object for the form belonging to this button
        $form = $buttonCrawlerNode->form();

        
        $crawler = $client->submit($form, [
            'command[games][0][marked1]' => '1',
            'command[ballance]' => '100'

        ]);

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('#potential-win', 'Potential win');
    }

}