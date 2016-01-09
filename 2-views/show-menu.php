<?php 
	include "3-controller/treatment-show-menu.php";
 ?>

 
<div id="titleMenuShow"><h1>Votre menu :)</h1></div>
<table id="showMenuTable">
 	<tr class="showMenuTableRow">
 		<td class="showMenuTableCell">Lundi</td>
 		<td class="showMenuTableCell">Mardi</td>
 		<td class="showMenuTableCell">Mercredi</td>
 		<td class="showMenuTableCell">Jeudi</td>
 		<td class="showMenuTableCell">Vendredi</td>
 		<td class="showMenuTableCell">Samedi</td>
 		<td class="showMenuTableCell">Dimanche</td>	
 	</tr>
 	<tr class="showMenuTableRow">
 	<?php for($i = 1; $i <= 7; $i++) {
 			if($i < $weekDay){ ?>
				<td class="showMenuTableCell"></td>
		<?php } else if ($i == $weekDay){ ?>
				<td class="showMenuTableCell"><?php echo Date("d M", $date);
					$nbrJour--; ?>
					<br />
					<span class="titleLink"><a href="?page=show-recipe&recipe=<?php echo $listTitle[$listTitleCounter]['rec_id'] ?>"><?php echo $listTitle[$listTitleCounter]['title']; $listTitleCounter++; ?></a></span>
				</td>
		<?php } else { ?>
				<td class="showMenuTableCell">
					<?php if($listTitleCounter < $endList) { 
							$date = $date+(60*60*24);
							echo Date("d M", $date);
							$nbrJour--; ?>
					<br />
						<span class="titleLink"><a href="?page=show-recipe&recipe=<?php echo $listTitle[$listTitleCounter]['rec_id'] ?>"><?php echo $listTitle[$listTitleCounter]['title']; $listTitleCounter++; ?></a></span>
					<?php } ?>
				</td>
		<?php }
		} ?>
 	</tr>
 	<?php while($nbrJour > 0){ ?>
		<tr class="showMenuTableRow">
 	<?php for($i = 1; $i <= 7; $i++){
 			if($nbrJour > 0) 
 				{ ?>
				<td class="showMenuTableCell">
					<?php if($listTitleCounter < $endList) { 
							$date = $date+(60*60*24);
							echo Date("d M", $date);
							$nbrJour--; ?>
					<br />
						<span class="titleLink"><a href="?page=show-recipe&recipe=<?php echo $listTitle[$listTitleCounter]['rec_id'] ?>"><?php echo $listTitle[$listTitleCounter]['title']; $listTitleCounter++; ?></a></span>
					<?php } ?>
				</td>
		<?php } else { ?>
				<td class="showMenuTableCell"></td>
	 		<?php }
	 		} ?>
	 	</tr>
	 <?php } ?>
 </table>