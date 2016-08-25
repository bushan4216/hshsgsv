<?php

$str1 = "Kinraddie, lands, had, been, won, by, a, Norman, childe,, Cospatric, de, Gondeshil,, in, the, days, of, William, the, Lyon,, when, gryphons, and, suchlike, beasts, still, roamed, the, Scots, countryside, and, folk, would, waken, in, their, beds, to, hear, the, children, screaming,, with, a, great, wolf-beast,, come, through, the, hide, window,, tearing, at, their, throats., In, the, Den, of, Kinsraddie, one, such, beast, had, its, lair, and, by, day, it, lay, about, the, woods, and, the, stench, of, it, was, awful, to, smell, all, over, the, countryside,, and, at, gloaming, a, shepherd, would, see, it,, with, its, great, wings, half-folded, across, the, great, belly, of, it, and, its, head,, watching.";

function counttotail($string) {

$cny = count(explode(',',$string));

return $cny;

}


echo counttotail($str1);
?>
