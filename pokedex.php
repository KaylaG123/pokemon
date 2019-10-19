<?php

$pokedex = [
    [
        'name' => 'Bulbasaur',
        'health' => 300,
        'attacks' => [
            [
                'name' => 'Tackle',
                'damage' => mt_rand(5, 10)
            ],
            [
                'name' => 'Vine whip',
                'damage' => 15
            ],
            [
                'name' => 'Leech Seed',
                'damage' => 7
            ],
            [
                'name' => 'Poison Powder',
                'damage' => 9
            ]
        ]
    ],
    [
        'name' => 'Squirtle',
        'health' => 250,
        'attacks' => [
            [
                'name' => 'Water Gun',
                'damage' => mt_rand(5, 10)
            ],
            [
                'name' => 'Tail Whip',
                'damage' => 15
            ],
            [
                'name' => 'Bubblebeam',
                'damage' => mt_rand(3, 6)
            ],
            [
                'name' => 'Hydro Pump',
                'damage' => 20
            ]
        ]
    ],
    [
        'name' => 'Charmander',
        'health' => 350,
        'attacks' => [
            [
                'name' => 'FireSpin',
                'damage' => mt_rand(5, 12)
            ],
            [
                'name' => 'Inferno',
                'damage' => 46
            ],
            [
                'name' => 'Slash',
                'damage' => 37
            ],
            [
                'name' => 'Flamethrower',
                'damage' => mt_rand(4,15)
            ]
        ]
    ],
    [
        'name' => 'Pikachu',
        'health' => 375,
        'attacks' => [
            [
                'name' => 'Thunder Shock',
                'damage' => mt_rand(10,15)
            ],
            [
                'name' => 'Thunderbolt',
                'damage' => mt_rand(3,8)
            ],
            [
                'name' => 'Electroweb',
                'damage' => 10
            ],
            [
                'name' => 'Volt Tackle',
                'damage' => mt_rand(5,12)
            ]
        ]
    ]
];


 ?>
