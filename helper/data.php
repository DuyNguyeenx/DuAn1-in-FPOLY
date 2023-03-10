<?php

function show_array($data)
{
    if (is_array($data)) {
        echo "<pre>";
        var_dump($data);
        echo "<pre>";
    }
}
function show_value($data)
{
    echo "<pre>";
    var_dump($data);
    echo "<pre>";
}
