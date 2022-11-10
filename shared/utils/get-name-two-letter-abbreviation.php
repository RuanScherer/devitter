<?php

function getNameTwoLetterAbbreviation($fullName = "") {
  $explodedName = explode(" ", $fullName);
  $abbreviation = substr($explodedName[0], 0, 1);
  $explodedNameCount = count($explodedName);
  if ($explodedNameCount > 1) {
    $abbreviation .= substr($explodedName[$explodedNameCount - 1], 0, 1);
  }
}

?>