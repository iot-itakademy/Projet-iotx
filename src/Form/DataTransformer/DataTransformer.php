<?php

namespace App\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

/**
 * Handles transforming json to array and backward
 */
class DataTransformer implements DataTransformerInterface
{

    /**
     * Transform an array to a JSON string
     */
    public function transform($array)
    {
        return json_encode($array);
    }

    /**
     * Transform a JSON string to an array
     */
    public function reverseTransform($string)
    {
        $modelData = json_decode($string, true);
        if ($modelData == null) {
            throw new TransformationFailedException('String is not a valid JSON.');
        }

        return $modelData;
    }
}