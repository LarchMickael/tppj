<script>
    $(document).ready(function() {
    var table=$('table').DataTable( {
            language: {
                "url": "Assets/Vendors/datatable/DataTables-1.10.10/Plugins/i18n/French.lang"
            },
            scrollY:        '400px',
            scrollCollapse: true,
            paging:         true,
            pagingType: "simple",
            pageLength: 25,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            dom : '<"#toolbar.col-xs-6">frtip'           
        } ).on( 'init.dt', function () {
            $('.buttonsBar').appendTo('#toolbar');
        } );
        
        $('table tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
            console.table(table.row('.selected').data());
        }
        } );
        $('#modrecipe').on('mousedown', function(){
            $(this).attr('href', "?page=modrecipe&id="+table.row('.selected').data()[0]);
        });        
    } );
</script>

<div>
	<div class="btn-group buttonsBar" role="group">
		<a id="addrecipe" class="btn btn-primary" href="?page=addrecipe">Ajouter</a>	
		<a id="modrecipe" class="btn btn-succes" >Modifier</a>	
		<a id="delrecipe" class="btn btn-danger" >Supprimer</a>	
	</div>
</div>

<div>
	<table class="table table-striped table-condensed table-bordered table-hover">
		<thead>
			<tr>
				<td>ID</td>
				<td>Titre</td>
				<td>lien</td>
				<td>tppj</td>
				<td>Type de repas</td>
				<td>Type de régime</td>
				<td>Pays d'origine</td>
			</tr>
		</thead>

		<?php foreach ($recipesList as $recipe) {
				?> <tr>
					<td><?php echo $recipe['rec_id'] ?></td>
					<td><?php echo $recipe['rec_title'] ?></td>
					<td><?php echo $recipe['rec_link'] ?></td>
					<td><?php if($recipe['rec_tppj'] == 1) echo "oui"; else echo "non"; ?></td>
					<td><?php $meals->get($recipe['mea_id']); echo $meals->mea_label; ?></td>
					<td><?php $diets->get($recipe['die_id']); echo $diets->die_label; ?></td>
					<td><?php $countries->get($recipe['cou_code']); echo $countries->cou_name; ?></td>
				</tr> <?php
		} ?>
		<tbody>
			
		</tbody>
	</table>
</div>