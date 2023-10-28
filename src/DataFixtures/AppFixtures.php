<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    /**
     * @var Generator
     */
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {

        // Users
        for ($i = 0; $i < 100; $i++) {
            $user = new User();
            $user->setName($this->faker->firstName())
                ->setLastName($this->faker->lastName())
                ->setEmail($this->faker->email())
                ->setPhoneNumber($this->faker->phoneNumber())
                ->setDateOfBirth($this->faker->dateTimeBetween('-50 years', '-18 years'))
                ->setRoles(['ROLE_USER'])
                ->setNationality($this->faker->country())
                ->setEmploymentStatus($this->faker->randomElement(['Employed', 'Unemployed', 'Student', 'Retired']))
                ->setSourceOfIncome($this->faker->randomElement(['Salary', 'Unemployment benefits', 'Retirement pension', 'Student grant', 'Other']))
                ->setTradingExperienceLevel($this->faker->numberBetween(0, 4))
                ->setAccountType($this->faker->randomElement(['Reel', 'Demo']))
                ->setAcceptedTermsAndConditions($this->faker->boolean())
                ->setAcceptedPrivacyPolicy($this->faker->boolean())
                ->setIdentityVerificationStatus($this->faker->randomElement(['Pending', 'Approved', 'Rejected']))
                ->setDateOfIdentityVerification($this->faker->dateTimeBetween('-1 years', 'now'))
                ->setPlainPassword('password');

            $manager->persist($user);
        }

        $manager->flush();
    }
}
