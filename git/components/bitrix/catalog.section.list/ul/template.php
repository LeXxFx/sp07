<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<div style="display: none;">
	<?
	global $lastProced;
	$lastProced=0;
	function procLvl(&$res,$lvl)
	{
		global $lastProced;
		if ($lvl>1)
		{
			echo '<li class="submenu__title"><a href="'.$res[$lastProced]['SECTION_PAGE_URL'].'">'.$res[$lastProced]['NAME'].'</a></li>';
			$lastProced++;
		}

		while($lastProced<sizeof($res))
		{
			if ($res[$lastProced]['DEPTH_LEVEL']<$lvl)
			{	
				$lastProced-=1;
				return ;		
			}

			echo '<li class="';
			if ($res[$lastProced+1]['DEPTH_LEVEL']>$lvl)
				echo 'has-child';
			echo '"><a href="'.$res[$lastProced]['SECTION_PAGE_URL'].'">'.$res[$lastProced]['NAME'].'</a>';
			if ($res[$lastProced+1]['DEPTH_LEVEL']>$lvl)
			{
				echo '<div class="submenu"><div class="submenu__inner"><ul class="" style="">';
				procLvl($res,$lvl+1);
				echo '</ul></div></div>';
			}
			echo '</li>';

			$lastProced++;

		}
	}?>
</div>
	<ul class="clearfix" style="min-height: 430px;">
	<?procLvl($arResult['SECTIONS'],1);?>
	</ul>
