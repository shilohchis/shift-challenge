<?php

use Illuminate\Database\Seeder;
use App\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "desc" => "You find it takes effort to introduce yourself to other people.",
                "dimension" => "EI",
                "direction" => "1",
                "meaning" => "I"
            ],
            [
                "desc" => "You consider yourself more practical than creative.",
                "dimension" => "SN",
                "direction" => "-1",
                "meaning" => "S"
            ],
            [
                "desc" => "Winning a debate matters less to you than making sure no one gets upset.",
                "dimension" => "TF",
                "direction" => "1",
                "meaning" => "F"
            ],
            [
                "desc" => "You get energized going to social events that involve many interactions.",
                "dimension" => "EI",
                "direction" => "-1",
                "meaning" => "E"
            ],
            [
                "desc" => "You often spend time exploring unrealistic and impractical yet intriguing ideas.",
                "dimension" => "SN",
                "direction" => "1",
                "meaning" => "N"
            ],
            [
                "desc" => "Deadlines seem to you to be of relative rather than absolute importance.",
                "dimension" => "JP",
                "direction" => "1",
                "meaning" => "P"
            ],
            [
                "desc" => "Logic is usually more important than heart when it comes to making important decisions.",
                "dimension" => "TF",
                "direction" => "-1",
                "meaning" => "T"
            ],
            [
                "desc" => "Your home and work environments are quite tidy.",
                "dimension" => "JP",
                "direction" => "-1",
                "meaning" => "J"
            ],
            [
                "desc" => "You do not mind being at the center of attention.",
                "dimension" => "EI",
                "direction" => "-1",
                "meaning" => "E"
            ],
            [
                "desc" => "Keeping your options open is more important than having a to-do list.",
                "dimension" => "JP",
                "direction" => "1",
                "meaning" => "P"
            ]
        ];
        foreach($data as $d) {
            Question::create($d);
        }
    }
}
