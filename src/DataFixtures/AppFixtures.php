<?php

namespace App\DataFixtures;

use App\Entity\Genre;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\PasswordHasherInterface;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        $user = (new User())
            ->setFirstname("demo")
            ->setLastname("demo")
            ->setEmail("demo@example.com")
            ->setPassword('$2y$13$ab4Q9zi4ObMiUH.ilXFwf.ByCSCLa/DbogMrsjDiiCNoLMU9950Be')
            ->setCreatedAt($faker->dateTimeBetween('-2 months'));

        $manager->persist($user);

        /*for($i=0; $i < 5; $i++) {
            $user = (new User())
                ->setFirstname($faker->firstName)
                ->setLastname($faker->lastName)
                ->setEmail($faker->email)
                ->setPassword('$2y$13$ab4Q9zi4ObMiUH.ilXFwf.ByCSCLa/DbogMrsjDiiCNoLMU9950Be')
                ->setCreatedAt($faker->dateTimeBetween('-2 months'));

            $manager->persist($user);
        }*/

        $tab = ['Amour', 'Passion', 'Drame', 'Aventure'];

        foreach ($tab as $value) {
            $genre = (new Genre())
                ->setTitle($value);

            $manager->persist($genre);
        }


        $manager->flush();
    }
}
