<?php

declare(strict_types=1);
function accumulate(array $input, callable $accumulator): array
{
    if(empty($input)){
        return [];
    }else
        return array_map($accumulator, $input);
}

 ?>
