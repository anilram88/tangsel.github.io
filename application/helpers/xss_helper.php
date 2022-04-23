<?php

function disxss($str)
{
    echo htmlentities($str, ENT_QUOTES, 'UTF-8');
}
