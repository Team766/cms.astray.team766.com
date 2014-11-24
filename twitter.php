<?php

include 'src/tweet-php-master/TweetPHP.php';
$twitter = new TweetPHP(array(
  'consumer_key'              => '4tjegZmMxehU2o6BiQUBGSGlT',
  'consumer_secret'           => 'haXDzLazWWEIu14Ui6gtxFl6i4ItnQfkNEbE6xV2jLpf0vMwdR',
  'access_token'              => '273110118-x181H0XpF7muC5CYRz8vXN7KaZsyPKsMSrSKPb3p',
  'access_token_secret'       => '79HkpNJtsiFNv7AZIZq3cj9ucpjAX6RhExoOMNBMK8rUt',
  'twitter_screen_name'       => 'Team766'
));
echo $twitter->get_tweet_list();