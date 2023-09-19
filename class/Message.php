<?php
class Message{

    const LIMIT_USERNAME = 3;
    const LIMIT_MESSAGE = 10;
    private $username;
    private $message;
    private $date;


    public static function formJSON(string $json): Message
    {
        $data = json_decode($json, true);
        // on peut utiliser le nom de la classe ou lieu de self cordialement
        return new self($data['username'], $data['message'], new DateTime("@" . $data['date']));
    }

    public function __construct(string $username, string $message, ?DateTime $date = null)
    {
        $this->username = $username;
        $this->message = $message;
        $this->date = $date ?: new DateTime();
    }

    public function isValid():bool
    {
        return empty($this->getErrors());
    }

    public function getErrors(): array
    {
        $errors = [];
        if(strlen($this->username) < self::LIMIT_USERNAME){
            $errors['username'] = 'Votre pseudo est trop court';
        }
        if(strlen($this->message) < self::LIMIT_MESSAGE){
            $errors['message'] = 'Votre message est trop court';
        }
        return $errors;
    }

    // fonction de recuperation
    public function toHTML():string{

        $username = htmlentities($this->username);
        $this->date->setTimezone(new DateTimeZone('Africa/Conakry'));
        $date = $this->date->format('d/m/Y à H:i:s');
        // pour que le saut de ligne soit prise en compte il faut ajouter : nl2br
        $message = nl2br(htmlentities($this->message));
        return <<<HTML
        <div class="border-bottom">
            <div class="col-lg-12 mt-2"><p>{$message}</p></div>
            <div class="d-flex justify-content-md-between">
                <div><p> <strong>{$username}</strong></p> </div>
                <div><p><em class="text-success">$date</em></p></div>
            </div>
        </div>

HTML;
    }
    // pour de conversion
    public function toJSON(): string{
        return json_encode([
            'username' => $this->username,
            'message' => $this->message,
            'date' => $this->date->getTimestamp()
        ]);
    }
}
