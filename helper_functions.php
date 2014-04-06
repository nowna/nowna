<?php

function linkify_usernames($tweet) {
  return preg_replace_callback(
    '#@(.+?)(?: |$)#',
    function ($matches) {
      return '<a href="https://twitter.com/'.$matches[0].'">'.$matches[0].'</a>';
    },
    $tweet);
}