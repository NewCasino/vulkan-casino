		<div class="left-side inner-content">
	<div class="content inner-block-width">
<div class="inner-block bg-blue blue-glow game-info">
<div class="inner-bg-blue dark bg-strips">
<div class="pic"><img src="../../../../img/games/submissions/<?=$gameInfo['img']; ?>">
</div><div class="text"><header><h1><?=$gameInfo['name'] ?></h1><div class="stars"><div class="vote-wrap"><div style="padding: 0px 4px; height: 17px; width: 85px;" class="vote-hover"><div class="vote-block"><div style="height: 17px; width: 85px; background: url(&quot;/assets/stars-6edab9ab10a78f322367ab0db755a1b4.png&quot;) repeat scroll left top transparent;" class="vote-stars"></div><div style="height: 17px; width: 51px; background: url(&quot;/assets/stars-6edab9ab10a78f322367ab0db755a1b4.png&quot;) repeat scroll left bottom transparent;" class="vote-active"></div></div></div><div class="vote-result"></div><div class="vote-success"></div></div></div></header><div style="height: 48px;" class="descr"><p><?=$gameInfo['description'] ?></p></div><footer><div class="title">Играйте и выигрывайте</div><div class="note">Наслаждайтесь игрой, а любимые игры приведут вас к победе</div><a class="btn btn-green btn-play link-register" href='<?=$gameInfo['link_game']; ?>'>Играть сейчас</a></footer></div></div></div>
					<?php if (count($gameInfo['screenshots']) > 0): ?>
					<div class='wrappingIVScreenshots'>
					<div class="inner-block bg-blue blue-glow game-gallery">
					<div class="inner-bg-blue bg-strips">
				<div class="slider">
				<div class='view'>
					<img src="../../../../img/games/screenshots/<?=$gameInfo['screenshots'][0]; ?>">
				</div>
				</div>
				<div class='preview'>
				<div class="thumbs">
				<?php foreach($gameInfo['screenshots'] as $screenshot): ?>
					<img src="../../../../img/games/screenshots/<?=$screenshot; ?>">
				<?php endforeach; ?>
				</div>
				</div>
				</div>
			</div>
			</div>
			<?php endif; ?>
					<div class="inner-block bg-blue blue-glow blue-text">
			<article class="inner-bg-blue bg-strips"><header>
			<h2>Правила игры <?=$gameInfo['name'] ?></h2>
			</header>
			<div class="article-text">
				<p><?=$gameInfo['rules']; ?></p>
			</div>
			</article>
		</div>
</div>
</div>