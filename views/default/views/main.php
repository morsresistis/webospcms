
      <!-- Blog Entries Column -->
      <div class="col-md-8">
        
        <h1 class="my-4">Blog Title
          <small>Description</small>
        </h1>
        
        <?php foreach ($posts as $p): ?>
        <!-- Blog Post -->
        <div class="card mb-4">       
        <img class="card-img-top" src="<?=$p['img']?>" alt="Card image cap">   
          <div class="card-body">
            <h2 class="card-title"><?=$p['title']?></h2>
            <p class="card-text"><?=cut_text($p['content'])?>...</p>
            <a href="post.php?id=<?=$p['id']?>" class="btn btn-primary"><?=$p['title']?></a>
          </div>
          <div class="card-footer text-muted">
            <p><?=$p['date']?></p>
          </div>
        </div>
        <?php endforeach ?>

        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
          <?php pagination(page()) ?>
        </ul>

      </div>
    
  
