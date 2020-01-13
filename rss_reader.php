<?php
$feedURL = "https://dev98.de/feed";
$feedItems = array();
$feedXML = simplexml_load_file($feedURL);
$feedItems = array_merge($feedItems, $feedXML->xpath("//item"));
?>
<html>
    <head>
        <title>dev98 Feed Reader</title>
		<style>
		.main {
			font-family: sans-serif;
			width: 100%;
			margin: 0 auto;
			text-align: center;
		}
		.feed-list {
			list-style: none;
			text-align: left;
		}
		.item-date {
			font-style: italic;
			padding-bottom: 5px;
		}
		.item-desc {
			word-break: break-word;
			font-size: 15px;
			margin: 0 5;
		}
		.read-more {
			font-size:14px;
			font-style: italic;
		}
		.read-more .screen-reader-text {
			display:none;
		}
		</style>
    </head>
    <body>    
        <div class="main">
		<h2 class="main-title">dev98.de Feed</h2>
		<ul class="feed-list">
		<?php foreach($feedItems as $feedItem): ?>
            <li>
				<h4 class="item-title"><a href="<?php echo $feedItem->link ?>"><?php echo $feedItem->title ?></a></h4>
				<div class="item-date"><?php echo date('d-m-Y H:i', strtotime($feedItem->pubDate))?></div>
				<div class="item-desc"><?php echo $feedItem->description ?></div>
			</li>
        <?php endforeach; ?>
        </ul>
		</div>
    </body>
</html>