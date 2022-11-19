<?php

function getNameTwoLetterAbbreviation($full_name = "") {
  $exploded_name = explode(" ", $full_name);
  $abbreviation = substr($exploded_name[0], 0, 1);
  $exploded_name_count = count($exploded_name);
  if ($exploded_name_count > 1) {
    $abbreviation .= substr($exploded_name[$exploded_name_count - 1], 0, 1);
  }
  return $abbreviation;
}

?>