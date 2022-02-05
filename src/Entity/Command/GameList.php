<?php

namespace App\Entity\Command;

class GameList {

   const GAMES = [
       0 => [
            'team1' => 'Los Angeles Lakers',
            'team2' => 'Houston Rockets',
            'bet1' =>  150,
            'bet2' => 230
       ],
       1 => [
            'team1' => 'Los Angeles Clippers',
            'team2' => 'Orlando Magic',
            'bet1' =>  130,
            'bet2' => 270
        ],
        2 => [
            'team1' => 'Brooklyn Nets',
            'team2' => 'Washington Wizzards',
            'bet1' =>  140,
            'bet2' => 240
        ],
        3 => [
            'team1' => 'Utah Jazz',
            'team2' => 'Milwaukee Bucks',
            'bet1' =>  190,
            'bet2' => 190
        ],
        4 => [
            'team1' => 'Chicago Bulls',
            'team2' => 'Miami Heat',
            'bet1' =>  170,
            'bet2' => 220
        ],
    ];
}