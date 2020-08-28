<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"> Welcome <?php echo $_SESSION['userName']; ?>
				<hr>
				<h1>List of site publications</h1>
			

			</div>
            <div class="card-body">
				<table class="table table-hover table-bordered table-striped" border="">
					<tr>
						<td><p>Title</p></td>
						<td>Date</td>
						<td></td>
						<td></td>
					</tr>
				<?php foreach($posts as $p): ?>
					<tr>						
						<td><?=$p['title']?><br>

						</td>

						<td><?=$p['date']?></td>
						<td><a href="index.php?action=edit&id=<?=$p['id']?>">Edit</a></td>
						<td><a href="index.php?action=delete&id=<?=$p['id']?>&img=<?=$p['img']?>">Delete</a></td>
					</tr>
				<?php endforeach ?>
				</table>	
            </div>
        </div>
    </div>
</div>