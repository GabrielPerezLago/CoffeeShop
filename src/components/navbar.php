<?php

namespace components;


    return fn(array $childs) =>
        '<nav class="navbar">' .
        implode('', array_map(
            fn($link, $name) => '<a href="?page=' . htmlspecialchars($link) . '">' . htmlspecialchars($name) . '</a>',
            array_keys($childs),
            array_values($childs)
        )) .
        '</nav>';