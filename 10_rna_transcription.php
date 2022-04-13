<?php 

function toRNA($dnaString)
{
    return strtr($dnaString, 'GCTA', 'CGAU');
}
