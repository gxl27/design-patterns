<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BridgeControllerTest extends WebTestCase {

    public function testRenderPage(): void
    {
        echo("\e[0;32;10m".substr(strrchr(__CLASS__, "\\"), 1)." - ".__FUNCTION__."\n");
        // This calls KernelTestCase::bootKernel(), and creates a
        // "client" that is acting as the browser
        $client = static::createClient();

        // Request a specific page
        $crawler = $client->request('GET', '/bridge');

        // Validate a successful response and some content
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Bridge');
    }

    public function testSubmitForm(): void
    {
        echo("\e[0;32;10m".substr(strrchr(__CLASS__, "\\"), 1)." - ".__FUNCTION__."\n");
        $client = static::createClient();
        $crawler = $client->request('GET', '/bridge');

        // select the button
        $buttonCrawlerNode = $crawler->selectButton('Submit');

        // retrieve the Form object for the form belonging to this button
        $form = $buttonCrawlerNode->form();


        $client->submit($form, [
            'bridge[car]' => 'Mazda',
            'bridge[engine]' => 'Diesel',


        ]);

        $this->assertResponseIsSuccessful();
    }

    public function testSubmitedFormResult(): void
    {
        echo("\e[0;32;10m".substr(strrchr(__CLASS__, "\\"), 1)." - ".__FUNCTION__."\n");
        $client = static::createClient();
        $crawler = $client->request('GET', '/bridge');

        // select the button
        $buttonCrawlerNode = $crawler->selectButton('Submit');

        // retrieve the Form object for the form belonging to this button
        $form = $buttonCrawlerNode->form();


        $crawler = $client->submit($form, [
            'bridge[car]' => 'Mazda',
            'bridge[engine]' => 'Diesel',

        ]);

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('#div-result', 'This is a Mazda car.');
    }

}