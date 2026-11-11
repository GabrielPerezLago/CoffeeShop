<?php

namespace components;


    return fn(array $childs) =>
        '<nav class="navbar">' .
        implode('', array_map(
            function ($link, $name): string
            {
                if (str_contains($name, 'image:'))
                {
                    $url = str_replace('image:', '', $name);
                    return '<img href="?page=' . $link . '" src="' . $url . '" width="20" height="20" alt="User Img">';
                }
                return '<a href="?page=' . htmlspecialchars($link) . '">' . htmlspecialchars($name) . '</a>';
            },
            array_keys($childs),
            array_values($childs)
        )) .
        '</nav>';