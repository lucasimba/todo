<?php
class task
{
    // fala pro php que o valor pode ser nulo ou um número inteiro
    public ?int $id = null;
    public string $description;
    // 0 = valor padrão
    public int $done = 0;


    // se já houver um valor declarado, independente do tipo ele será opcional.
    public function __construct(string $description, int $done, $id = null) {
        $this->id = $id;
        $this->description = $description;
        $this->done = $done;
    }
}