<?php

namespace App\DataFixtures;

use App\Entity\MOVIE;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
    $movie = new MOVIE();
    $movie->setTitle('The Dark Knight');
    $movie->setReleasedYear(2008);
    $movie->setDescription('this is description of the Dark Knight');
    $movie->setImagePath('https://cdn.pixabay.com/photo/2020/03/19/07/28/batman-4946610_960_720.jpg');
    $movie->addActor($this->getReference('actor_1'));
    $movie->addActor($this->getReference('actor_2'));
    $manager->persist($movie);

    $movie2 = new MOVIE();
    $movie2->setTitle('Avengers: Endgame');
    $movie2->setReleasedYear(2019);
    $movie2->setDescription('this is description of the Avengers Endgame');
    $movie2->setImagePath('https://cdn.pixabay.com/photo/2022/06/23/12/40/actor-7279706_960_720.png');
    $movie2->addActor($this->getReference('actor_3'));
    $movie2->addActor($this->getReference('actor_4'));
    $manager->persist($movie2);

    $manager->flush();
}
}

