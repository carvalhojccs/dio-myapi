<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandController extends Controller
{
    public function getAll()
    {
        return response()->json([$this->getBands()]);
    }

    public function getById($id)
    {
        $band = null;

        foreach ($this->getBands() as $item) {
            if ($item['id'] == $id) {
                $band = $item;
            }
        }

        return $band ? response()->json($band) : abort(404);
    }

    public function getBandsByGender($id)
    {
        $bands = [];

        foreach ($this->getBands() as $item) {
            if ($item['gender_id'] == $id) {
                $bands[] = $item;
            }
        }

        return response()->json($bands);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'id' => 'numeric',
            'name' => 'required|min:3',
            'gender' => 'required',
            'gender_id' => 'numeric',
        ]);

        return response()->json($request->all());
    }

    protected function getBands()
    {
        return [
            [
                'id' => 1, 'name' => 'dream teather', 'gender' => 'progressivo', 'gender_id' => 1,
            ],
            [
                'id' => 2, 'name' => 'megadeth', 'gender' => 'trash metal', 'gender_id' => 2,
            ],
            [
                'id' => 3, 'name' => 'dio', 'gender' => 'heavy metal', 'gender_id' => 3,
            ],
            [
                'id' => 4, 'name' => 'metallica', 'gender' => 'heavy metal', 'gender_id' => 3,
            ],
            [
                'id' => 5, 'name' => 'barões da pisadinha', 'gender' => 'tecno forró', 'gender_id' => 4,
            ],

        ];
    }
}
