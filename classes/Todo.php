<?php

class Todo
{
    public $id;
    public $title;
    public $date;


    public function __construct($title, $date, $id = 0)
    {
        if ($id > 0) {
            $this->id = $id;
        }

        $this->title = $title;
        $this->date = $date;
    }

    public function __toString()
    {
        return "{$this->title} to be done: {$this->date}";
    }
}
