<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"> Add a publication
			<div>
				
				<hr>
				<form method="post" action="index.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>" enctype='multipart/form-data'>
					<label>
						Title<br>
						<input type="text" name="title" size="40" value="<?=$post['title']?>" class="form-item" autofocus required>
					</label>
					<br>
					<label>
						Date  <br>    
						<input type="date" name="date" size="40" value="<?=$post['date']?>" class="form-item" required>
					</label>
					<br>

					<label>
						<input type="file" name="img">
					</label>
					<br>
					<label>
						Text<br>
						<textarea class="form-control" name="content" id="content" rows="5" width="100%"><?=$post['content']?></textarea>

					</label><br>
					<label>
						<input type="hidden" name="old_img" value="" class="form-item" autofocus required>
					</label>




			</div>	
			<div>
				
					<input type="submit" value="Save" class="btn btn-primary">
					<button type="button" value="Cancel" class="btn"><a href="index.php">Cancel</button>
			</div>

			</div>
            <div class="card-body">

            </div>
        </div>
    </div>
</div>	
</html>