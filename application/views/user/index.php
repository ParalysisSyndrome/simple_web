

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800 text-center pt-5">Your Profile</h1>
            <div class="container">
                <div class="data pt-5 pb-5">
                    <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $user['id'];?>" >
                            <div class="form-group">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" style="width: 40%;" id="name" name="name" value="<?= $user['name']; ?>">
                                <small class="form-text text-danger"><?= form_error('name'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" style="width: 40%;" id="username" name="username" value="<?= $user['username']; ?>">
                                <small class="form-text text-danger"><?= form_error('username'); ?></small>
                            </div>
                            
                          <button class="btn btn-primary mt-4" name="update">Update Data</button>
                      </form>
                      <hr class="mt-5 mb-5">
                      <form action="" method="post">
                          <div class="form-group">
                              <label for="password1" class="form-label">Current password</label>
                              <input type="text" class="form-control" style="width: 40%;" id="password1" name="password1">
                              <small class="form-text text-danger"><?= form_error('password1'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="password2" class="form-label">New password</label>
                              <input type="text" class="form-control" style="width: 40%;" id="password2" name="password2" >
                              <small class="form-text text-danger"><?= form_error('password2'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="password3" class="form-label">Confirm new password</label>
                              <input type="text" class="form-control" style="width: 40%;" id="password3" name="password3">
                              <small class="form-text text-danger"><?= form_error('password3'); ?></small>
                          </div>
                          <button class="btn btn-primary mt-4" name="update">Update Data</button>
                      </form>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Psychology 2020</span>
            </div>
            </div>
        </footer>

