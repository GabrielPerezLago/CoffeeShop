<?php

namespace components;


    return fn(array $childs) =>
        '<nav class="navbar">' .
        implode('', array_map(
            function ($link, $name): string
            {
                if ($link == null || $name == null) return'';
                if (str_contains($name, 'image:'))
                {
                    $url = str_replace('image:', '', $name);
                    return '<a  href="?page=' . $link . '"><img src="' . $url . '" width="20" height="20" alt="User Img"></a>';
                }
                return '<a href="?page=' . htmlspecialchars($link) . '">' . htmlspecialchars($name) . '</a>';
            },
            array_keys($childs),
            array_values($childs)
        )) .
        '</nav>';