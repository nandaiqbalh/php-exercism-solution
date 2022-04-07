<?php 
declare(strict_types=1);
function from(DateTimeImmutable $date): DateTimeImmutable
{
    // clone digunakan untuk membuat salinan variable / object
    $gigasecondDate = clone $date;
    // mengembalikan penambahan setelah gigasecond
	return $gigasecondDate->add(new DateInterval('PT1000000000S'));
}
