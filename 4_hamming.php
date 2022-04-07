<?php 

declare(strict_types=1);
function distance(string $strandA, string $strandB) : int
{
   // mengambil string dan memecahnya menjadi array of chars
   $arrayA = str_split($strandA);
   $arrayB = str_split($strandB);
   // mengecek array diff
   // jika panjang array tidak sama, maka akan throw exception
   if (count($arrayA) !== count($arrayB)){ 
       throw new InvalidArgumentException('DNA strands must be of equal length.');
   }
   $diff = count(array_diff_assoc($arrayA, $arrayB)); //returns all the elements in A that arent in B
   return $diff; // returns the count of how many elements are diff
}

?>