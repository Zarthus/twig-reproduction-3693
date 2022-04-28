<?php

require 'vendor/autoload.php';

class TwigLoaderPatch extends \Twig\Loader\FilesystemLoader
{
    public function getCacheKey(string $name): string
    {
        $key = parent::getCacheKey($name);
        $hash = hash_file('md5', $this->findTemplate($name, false));
        return $key . $hash;
    }
}
