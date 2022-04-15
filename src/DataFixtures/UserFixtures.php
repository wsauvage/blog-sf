<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher) {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $users = [
            [
                'email' => 'user@ri7.fr',
                'firstname' => 'User',
                'lastname' => 'Ri7',
                'roles' => ['ROLE_USER'],
            ],
            [
                'email' => 'manager@ri7.fr',
                'firstname' => 'Manager',
                'lastname' => 'Ri7',
                'roles' => ['ROLE_MANAGER'],
            ],
            [
                'email' => 'admin@ri7.fr',
                'firstname' => 'Admin',
                'lastname' => 'Ri7',
                'roles' => ['ROLE_ADMIN'],
            ],
        ];

        foreach ($users as $u) {
            $user = new User();
            $user->setRoles($u['roles']);
            $user->setEmail($u['email']);
            $user->setPassword($this->passwordHasher->hashPassword(
                $user,
                $u['email']
            ));
            $manager->persist($user);
        }

        $manager->flush();

    }
}
