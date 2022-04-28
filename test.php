<?php

const TEMPLATE = 'example.twig';

/**
 * @return bool true if contents are identical (not desired), false if they differ (desired)
 */
function test(\Twig\Environment $twig): int {
    // Render the template
    $renderA = $twig->render(TEMPLATE);

    // User writes something to the file.
    $oldState = file_get_contents('templates/' . TEMPLATE);
    file_put_contents('templates/' . TEMPLATE, random_int(0, PHP_INT_MAX), FILE_APPEND);

    // Render the same template, but it now has different content.
    $renderB = $twig->render(TEMPLATE);

    file_put_contents('templates/' . TEMPLATE, $oldState); // restore old file contents.

    return $renderA === $renderB;
}
