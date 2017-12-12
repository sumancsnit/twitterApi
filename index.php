<?php
    
    require "twitteroauth/autoload.php";

    use Abraham\TwitterOAuth\TwitterOAuth;

    $consumerkey = "####";

    $consumersecretkey = "####";

    $accesstoken = "####";

    $accesstokensecret = "####";

    $connection = new TwitterOAuth($consumerkey, $consumersecretkey, $accesstoken, $accesstokensecret);
    $content = $connection->get("account/verify_credentials");

    $statuses = $connection->get("statuses/home_timeline", ["count" => 25, "exclude_replies" => true]);

//    $statues = $connection->post("statuses/update", ["status" => "test tweet from twitter api"]);
    foreach ($statuses as $tweet) {
//        print_r($tweet->text);
        
        if ($tweet->favorite_count >=3){
            
//            echo $tweet->favorite_count;
//            echo $tweet->text;
//            echo "<br>";
            $status = $connection->get("statuses/oembed", ["id" => $tweet->id]);
            echo $status->html;
        }
        
    }    


?>