<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i=1;$i<10;$i++) {
            $article = new Article();
            $article->setTitle($faker->name());
            $manager->persist($article);
        }
        $manager->flush();
    }
}
