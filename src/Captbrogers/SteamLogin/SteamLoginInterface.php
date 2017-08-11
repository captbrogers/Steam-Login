<?php

namespace Captbrogers\SteamLogin;

interface SteamLoginInterface
{
    public function url($return);
    public function validate();
}
