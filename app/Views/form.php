<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/fontawesome.min.css" integrity="sha512-lauN4D/0AgFUGvmMR+knQnbOADyD/XuQ8VF18I8Ll0+TLvsujshyxvU+uzogmQbSq6qJd5jnUdYtK8ShxXMlSg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/solid.min.css" integrity="sha512-bdqdas3Yr82pkTg5i0X1gcAT3tBXz/8H3J1ec7RyEKAvr/YiSCJNV2dnkukmL8CicjKb9rxmd+ILK8Kg2o2wvQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?php echo $mode ?> Data - santriKoding.com</title>
  </head>
  <body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <?php if(!empty(session()->getFlashdata('message'))) : ?>

                <div class="alert alert-success">
                    <?php echo session()->getFlashdata('message');?>
                </div>
                    
                <?php endif ?>
                <?php if(isset($validation)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $validation->listErrors() ?>
                    </div>
                <?php } ?>
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo isset($article['article_id']) ? base_url('update/'.$article['article_id']) : base_url('store')  ?>" method="POST">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="article_title" value="<?php echo isset($article['article_title']) ?? '' ?>" placeholder="Masukkan Title">
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                               <textarea class="form-control" name="article_content" rows="4" placeholder="Masukkan Konten"><?php echo isset($article['article_content']) ?? '' ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="article_status">
                                    <option value="" <?php echo !isset($article['article_status']) ? "selected" : "" ?>>-- PILIH --</option>
                                    <option value="Active" <?php echo isset($article['article_status']) == 'Active' ? "selected" : "" ?>>Active</option>
                                    <option value="Inactive" <?php echo isset($article['article_status']) == 'Inactive' ? "selected" : "" ?>>Inactive</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary"><?php echo $mode == 'edit' ? 'UPDATE' : 'ADD' ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>