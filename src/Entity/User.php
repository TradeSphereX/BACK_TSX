<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[UniqueEntity(fields: ['email'])]
#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\EntityListeners(['App\EntityListener\UserListener'])]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    #[Assert\NotBlank]
    #[Assert\Email]
    #[Assert\Length(min: 2, max: 180)]
    private ?string $email = null;

    #[ORM\Column]
    #[Assert\NotNull]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    #[Assert\NotBlank]
    private ?string $password = null;

    private  ?string $plainPassword = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 50)]
    private ?string $name = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 50)]
    private ?string $lastName = null;

    #[ORM\Column(length: 25)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 25)]
    private ?string $phoneNumber = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotNull]
    private ?\DateTimeInterface $dateOfBirth = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 255)]
    private ?string $Nationality = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 250)]
    private ?string $employmentStatus = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 250)]
    private ?string $sourceOfIncome = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    private ?int $tradingExperienceLevel = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 255)]
    private ?string $accountType = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    private ?bool $acceptedTermsAndConditions = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    private ?bool $acceptedPrivacyPolicy = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 50)]
    private ?string $identityVerificationStatus = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotNull]
    private ?\DateTimeInterface $dateOfIdentityVerification = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): static
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(\DateTimeInterface $dateOfBirth): static
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->Nationality;
    }

    public function setNationality(string $Nationality): static
    {
        $this->Nationality = $Nationality;

        return $this;
    }

    public function getEmploymentStatus(): ?string
    {
        return $this->employmentStatus;
    }

    public function setEmploymentStatus(string $employmentStatus): static
    {
        $this->employmentStatus = $employmentStatus;

        return $this;
    }

    public function getSourceOfIncome(): ?string
    {
        return $this->sourceOfIncome;
    }

    public function setSourceOfIncome(string $sourceOfIncome): static
    {
        $this->sourceOfIncome = $sourceOfIncome;

        return $this;
    }

    public function getTradingExperienceLevel(): ?int
    {
        return $this->tradingExperienceLevel;
    }

    public function setTradingExperienceLevel(int $tradingExperienceLevel): static
    {
        $this->tradingExperienceLevel = $tradingExperienceLevel;

        return $this;
    }

    public function getAccountType(): ?string
    {
        return $this->accountType;
    }

    public function setAccountType(string $accountType): static
    {
        $this->accountType = $accountType;

        return $this;
    }

    public function isAcceptedTermsAndConditions(): ?bool
    {
        return $this->acceptedTermsAndConditions;
    }

    public function setAcceptedTermsAndConditions(bool $acceptedTermsAndConditions): static
    {
        $this->acceptedTermsAndConditions = $acceptedTermsAndConditions;

        return $this;
    }

    public function isAcceptedPrivacyPolicy(): ?bool
    {
        return $this->acceptedPrivacyPolicy;
    }

    public function setAcceptedPrivacyPolicy(bool $acceptedPrivacyPolicy): static
    {
        $this->acceptedPrivacyPolicy = $acceptedPrivacyPolicy;

        return $this;
    }

    public function getIdentityVerificationStatus(): ?string
    {
        return $this->identityVerificationStatus;
    }

    public function setIdentityVerificationStatus(string $identityVerificationStatus): static
    {
        $this->identityVerificationStatus = $identityVerificationStatus;

        return $this;
    }

    public function getDateOfIdentityVerification(): ?\DateTimeInterface
    {
        return $this->dateOfIdentityVerification;
    }

    public function setDateOfIdentityVerification(\DateTimeInterface $dateOfIdentityVerification): static
    {
        $this->dateOfIdentityVerification = $dateOfIdentityVerification;

        return $this;
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(?string $plainPassword): void
    {
        $this->plainPassword = $plainPassword;
    }
}
