<?php

class Message
{
    private ?int $id;
    private ?User $user_id;
    private ?string $message;
    private ?string $date;

    /** Message constructor.
     * @param int|null $id
     * @param User|null $user_id
     * @param string|null $message
     * @param string|null $date
     */
    public function __construct(int $id = null, User $user_id = null, string $message = null, string $date = null)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->message = $message;
        $this->date = $date;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser_id(): ?string
    {
        return $this->user_id->getUsername();
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

}
