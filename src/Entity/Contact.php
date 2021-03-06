<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity
 */
class Contact
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name_exp", type="string", length=255, nullable=false)
     */
    private $nameExp;

    /**
     * @var string
     *
     * @ORM\Column(name="mail_exp", type="text", length=65535, nullable=false)
     */
    private $mailExp;

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="text", length=65535, nullable=false)
     */
    private $subject;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text", length=65535, nullable=false)
     */
    private $message;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameExp(): ?string
    {
        return $this->nameExp;
    }

    public function setNameExp(string $nameExp): self
    {
        $this->nameExp = $nameExp;

        return $this;
    }

    public function getMailExp(): ?string
    {
        return $this->mailExp;
    }

    public function setMailExp(string $mailExp): self
    {
        $this->mailExp = $mailExp;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }


}
