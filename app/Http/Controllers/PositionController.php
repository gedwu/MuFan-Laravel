<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function add_positions() {
        $positions = [
          [
              'name' => 'vartininkas',
              'short' => 'GK',
          ],
            [
                'name' => 'gynėjas',
                'short' => 'D',
            ],
            [
                'name' => 'saugas',
                'short' => 'M',
            ],
            [
                'name' => 'puolėjas',
                'short' => 'A',
            ],
        ];

        foreach ($positions as $position) {
            Position::create([
                'name' => $position['name'],
                'short' => $position['short']
            ]);
        }
    }
}
