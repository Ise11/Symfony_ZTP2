<?php

namespace Forum\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ForumUserBundle extends Bundle
{
    public function getParent()
    {
        return "FOSUserBundle";
    }
}
