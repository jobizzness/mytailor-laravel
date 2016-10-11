<?php


namespace MyTailor\Transformers;


abstract class Transformer
{
    public abstract function transform($item);

    public abstract function transformCollection($items);

}