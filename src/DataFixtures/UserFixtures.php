<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    
    public function load(ObjectManager $manager)
    {
        // create 10 users! Bam!
        for ($i = 0; $i < 10; $i++) {
            $seed = random_int(100,1000);
            $user = new User();
            $user->setEmail('usr'.$i.'@test.com');
            $user->setRoles(['ROLE_USER']);
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,'only_24_usr'
            ));
            $manager->persist($user);
        };
        $manager->flush();
    }
}
