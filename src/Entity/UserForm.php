<?php

namespace App\Entity;

class UserForm
{
    #[Assert\NotBlank(
        message: 'This value should not be blank.',
    )]
    protected string $helloMessage;

    #[Assert\NotBlank(
        message: 'This value should not be blank.',
    )]
    #[Assert\Email(
        message: 'The email {{ value }} is not a valid email.',
    )]
    protected string $email;

    public function getHelloMessage(): string
    {
        return $this->helloMessage;
    }

    public function setHelloMessage(string $helloMessage): string
    {
        $this->helloMessage = $helloMessage;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): string
    {
        $this->email = $email;

        return $this;
    }
}
