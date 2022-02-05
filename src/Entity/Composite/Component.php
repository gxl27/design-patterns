<?php

namespace App\Entity\Composite;

abstract class Component{

   

    abstract function operation();

    public function isComposite(): bool
    {
        return false;
    }

     // const for the CompositeType (form)

     const CLASSES = [
        0 => 'mathematics',
        1 => 'phisics',
        2 => 'informatics',
        3 => 'robotics',
        4 => 'engeneering'
    ];
    

    // random names

    const NAMES = [
        'Jethro Cairns',
        'Ameera Rogers',
        'Blanka Wall',
        'Adelle Casey',
        'Caitlan Bradford',
        'Ronny Delgado',
        'Tayyibah Foreman',
        'Asiyah Pickett',
        'Aneeka Collier',
        'Ravinder Betts',
        'Kasim Sykes',
        'Nyla Moyer',
        'Whitney Baird',
        'Franco Anderson',
        'Asher Willis',
        'Izabela Sharp',
        'Chace Mcgregor',
        'Marianne Byrd',
        'Tyson Galloway',
        'Millie-Mae Ridley',
        'Safa Brewer',
        'Tyrique Arnold',
        'Jonty Mcfadden',
        'Brook ORyan',
        'Siya Lindsay',
        'Riley-James Feeney',
        'Jorden Garner',
        'Mahir Koch',
        'Ameerah Mejia',
        'Benny Poole',
        'Lara Ferrell',
        'Poppy-Mae Beck',
        'Sianna Mcneil',
        'Waseem Webb',
        'Jaidon Muir',
        'Ishaaq Vasquez',
        'Jesse Jones',
        'Teigan Compton',
        'Jarod Wooten',
        'Rhiana Hudson',
        'Tasha Justice',
        'Teejay Goddard',
        'Lola Bassett',
        'Margaux Couch',
        'Havin Watts',
        'Sameeha Rooney',
        'Janine Regan',
        'Ilayda Cross',
        'Sumayya Shelton',
        'Austin Jeffery',
        'Leila Simpson',
        'Diego Jackson',
        'Kayden Maguire',
        'Zaine Howard',
        'Tammy Estes',
        'Maxim Butt',
        'Kaden Yang',
        'Rihanna Watt',
        'Caelan Stubbs',
        'Clarence Saunders',
        'Arnie Hodges',
        'Rhona Mclellan',
        'Arandeep Bouvet',
        'Aizah Fraser',
        'Alister Knights',
        'Shah Daniel',
        'Ammaarah Mccall',
        'Issac Harris',
        'Aairah Ballard',
        'Carmen Macfarlane',
        'Orlaith Hail',
        'Chase Merritt',
        'Scarlett-Rose Summers',
        'Charmaine Hurley',
        'Daniel Davis',
        'Haleema Ashley',
        'Liana Drake',
        'Maxine Hoover',
        'Sanah Floyd',
        'Pranav Bowers',
        'Corrina Estrada',
        'Bethaney Mcfarland',
        'Jaheim Hart',
        'Aneesha Terry',
        'Fabian Rangel',
        'Safah Faulkner',
        'Harvey-Lee Valencia',
        'Eli Fenton',
        'Maisha Hester',
        'Emaan Nash',
        'Kirstie Cummings',
        'Aled English',
        'Chantelle Knowles',
        'Dominique Byers',
        'Lyra Felix',
        'Donovan Sanders',
        'Emilija Rahman',
        'Saanvi Watson',
        'Adela Hines',
        'Cieran Gibbs',
    ];

}