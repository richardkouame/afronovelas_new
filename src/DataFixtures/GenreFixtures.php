<?php

namespace App\DataFixtures;

use App\Entity\Genre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GenreFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $tab = ['Amour', 'Passion', 'Drame', 'Aventure'];

        foreach ($tab as $value) {
            $genre = (new Genre())
                ->setTitle($value);

            $manager->persist($genre);
        }


        $manager->flush();
    }
}
