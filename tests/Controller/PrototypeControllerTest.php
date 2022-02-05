<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PrototypeControllerTest extends WebTestCase {

    public function testRenderPage(): void
    {
        echo("\e[0;32;10m".substr(strrchr(__CLASS__, "\\"), 1)." - ".__FUNCTION__."\n");
        // This calls KernelTestCase::bootKernel(), and creates a
        // "client" that is acting as the browser
        $client = static::createClient();

        // Request a specific page
        $crawler = $client->request('GET', '/prototype');

        // Validate a successful response and some content
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Prototype');
    }

    // public function testSubmitForm(): void
    // {
        // echo("\e[0;32;10m".substr(strrchr(__CLASS__, "\\"), 1)." - ".__FUNCTION__."\n");
    //     $client = static::createClient();
    //     $crawler = $client->request('GET', '/prototype');

    //     // select the button
    //     $buttonCrawlerNode = $crawler->selectButton('Submit');

    //     // retrieve the Form object for the form belonging to this button
    //     $form = $buttonCrawlerNode->form();

    //     // optionally, you can combine the last 2 steps by passing an array of
    //     // field values while submitting the form:
    //     $client->submit($form, [
    //         'prototype[vehicle]' => '0',


    //     ]);

    //     $this->assertResponseIsSuccessful();
    // }

    // public function testSubmitedFormResult(): void
    // {
        // echo("\e[0;32;10m".substr(strrchr(__CLASS__, "\\"), 1)." - ".__FUNCTION__."\n");
    //     $client = static::createClient();
    //     $crawler = $client->request('GET', '/prototype');

    //     // select the button
    //     $buttonCrawlerNode = $crawler->selectButton('Submit');

    //     // retrieve the Form object for the form belonging to this button
    //     $form = $buttonCrawlerNode->form();

    //     // optionally, you can combine the last 2 steps by passing an array of
    //     // field values while submitting the form:
    //     $crawler = $client->submit($form, [
    //         'prototype[vehicle]' => '0',

    //     ]);

    //     $this->assertResponseIsSuccessful();
    //     $this->assertSelectorTextContains('#div-result', 'Copy of Car Created at:');
    // }

}