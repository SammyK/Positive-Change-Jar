<?php

class Team extends Eloquent
{

    public function users()
    {
        return $this->hasMany('User');
    }

    public function challenges()
    {
        return $this->hasMany('Challenge');
    }
}

