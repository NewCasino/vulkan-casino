<div class="main-content">
				<aside class="left">
							<ul class="game-menu">
								<li class="pop"><a class="folder-name" href="/ru/">����������</a></li>
								<li class="jp"><a class="folder-name" href="/ru/jackpots">��������</a></li>
								<li class="slot"><a class="folder-name" href="/ru/slots">�����</a></li>
										<li class="roul"><a class="folder-name" href="/ru/roulettes">�������</a></li>
												<li class="active card"><a class="folder-name" href="/ru/cards">���������</a></li>
													</ul>
													</aside>
													<div class="games-list main-games-list">
													<div class="section">
																			<header>
						<div class="in">
							<a class="title" href="<?=$groupGames['id=16']; ?>"><span class="inner">���������</span></a>
						</div>
						</header>
						<div class="items">
	<?php foreach($groupsGames as $groupGames): ?>
	<?php foreach($allGamesInfo as $gameInfo): ?>
	<?php if($groupGames['id'] == $gameInfo['id_group']): ?>
	<div class="item jp" data-id="54" href="#">
		<div class="pic">
			<img class="game-icon" src="../../../../img/games/submissions/<?=$gameInfo['img']; ?>">
			</div>
			<a class="title" href="<?=$gameInfo['link_game']; ?>"><?=$gameInfo['name']; ?></a>
					<div class="play-info">
		<div class="inner">
		<a class="btn btn-green link-login" href="<?=$gameInfo['link_game']; ?>">������</a>
		<a class="btn btn-gb" href="/game_info/<?=$gameInfo['link_info']; ?>.html">����</a>
		<a class="link" href="<?=$gameInfo['link_game']; ?>"><?=$gameInfo['name']; ?></a>
			</div>
			</div>
			</div>
	<?php endif ; ?>
	<?php endforeach; ?>
	<?php endforeach; ?>
</div>
</div>
</div>
</div>