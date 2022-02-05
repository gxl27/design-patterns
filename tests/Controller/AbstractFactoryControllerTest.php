<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AbstractFactoryControllerTest extends WebTestCase {

    public function testRenderPage(): void
    {
        // dump controller name and function in the console
        echo("\e[0;32;10m".substr(strrchr(__CLASS__, "\\"), 1)." - ".__FUNCTION__."\n");
        // This calls KernelTestCase::bootKernel(), and creates a
        // "client" that is acting as the browser
        $client = static::createClient();

        // Request a specific page
        $crawler = $client->request('GET', '/abstract');

        // Validate a successful response and some content
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Abstract factory');
    }

    public function testSubmitForm(): void
    {
        // dump controller name and function in the console
        echo("\e[0;32;10m".substr(strrchr(__CLASS__, "\\"), 1)." - ".__FUNCTION__."\n");
        $client = static::createClient();
        $crawler = $client->request('GET', '/abstract');

        // select the button
        $buttonCrawlerNode = $crawler->selectButton('Submit');

        // retrieve the Form object for the form belonging to this button
        $form = $buttonCrawlerNode->form();


        $client->submit($form, [
            'abstract_factory[factory]'    => 'Vehicle',
            'abstract_factory[product]' => 'Car',
        ]);

        $this->assertResponseIsSuccessful();
    }

    public function testSubmitedFormResult(): void
    {
        // dump controller name and function in the console
        echo("\e[0;32;10m".substr(strrchr(__CLASS__, "\\"), 1)." - ".__FUNCTION__."\n");
        $client = static::createClient();
        $crawler = $client->request('GET', '/abstract');

        // select the button
        $buttonCrawlerNode = $crawler->selectButton('Submit');

        // retrieve the Form object for the form belonging to this button
        $form = $buttonCrawlerNode->form();


        $crawler = $client->submit($form, [
            'abstract_factory[factory]'    => 'Vehicle',
            'abstract_factory[product]' => 'Car',
        ]);

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('#div-result', 'Average speed 80 km/h');
    }

}