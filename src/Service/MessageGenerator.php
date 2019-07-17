<?php

namespace App\Service;

class MessageGenerator
{
    public function getHappyMessage()
    {
        $messages = [
            'You did it! You updated the system! Amazing!',
            'That was one of the coolest updates I\'ve seen all day!',
            'Great work! Keep going!',
            'Wenn du barfuß durchs Leben läufst, kann man dir auch nichts in die Schuhe schieben. ',
            'Das Gesicht eines Menschen erkennt man bei Licht, seinen Charakter im Dunkeln.',
            'There is nothing more amazing than being yourself'
        ];

        $index = array_rand($messages);

        return $messages[$index];
    }
}