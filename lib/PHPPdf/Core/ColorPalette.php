<?php

/*
 * Copyright 2011 Piotr Śliwa <peter.pl7@gmail.com>
 *
 * License information is in LICENSE file
 */

namespace PHPPdf\Core;

/**
 * Color palette
 *
 * @author Piotr Śliwa <peter.pl7@gmail.com>
 */
class ColorPalette
{
    /** @var array<string, string> */
    private $colors;

    /**
     * @param array<string, string> $colors
     */
    public function __construct(array $colors = [])
    {
        $this->colors = $colors;
    }

    /**
     * @param string|null $name
     * @return string
     */
    public function get($name)
    {
        $name = strtolower((string) $name);

        return isset($this->colors[$name]) ? $this->colors[$name] : $name;
    }

    /**
     * @param array<string, string> $colors
     * @return void
     */
    public function merge(array $colors)
    {
        $this->colors = $colors + $this->colors;
    }

    /**
     * @return array<string, string>
     */
    public function getAll()
    {
        return $this->colors;
    }
}
