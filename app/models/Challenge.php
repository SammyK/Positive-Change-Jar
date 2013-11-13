<?php

class Challenge extends Eloquent
{

    public function teams()
    {
        return $this->belongsToMany('Team');
    }
}

