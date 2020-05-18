

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Data -->
          <section id="data">
              <div class="container">
                  <div class="row pt-5">
                      <div class="col">
                          <h3>Profile Dokter</h3>
                      </div>
                      <div class="col">
                          <div class="float-right">
                              <form action="" method="post">
                                  <div class="input-group ml-auto">
                                      <input type="text" class="form-control" name="search" placeholder="Search Data">
                                      <div class="input-group-append">
                                          <button class="btn btn-primary" type="submit">Search</button>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="container">
                  
                  <div class="card mt-3">             
                      <div class="card-body pt-5">
                      <table class="table">
                          <thead class="thead text-center">
                            <tr>
                              <th>Name</th><th>Email</th><th>Phone Number</th><th>address</th><th>education</th><th>experience</th><th>Password</th>
                              <th>#</>
                            </tr>
                          </thead>
                          <?php if( empty($dokter) ) : ?>
                              <div class="alert alert-danger" role="alert">
                                  Not found
                              </div>
                          <?php endif; ?>
                          <tbody>
                            <?php if(is_array($dokter)): ?>
                            <?php foreach($dokter as $profile) : ?>
                              <tr>
                                <td><?= $profile['name'] ?></td>
                                <td><?= $profile['email'] ?></td>
                                <td><?= $profile['phone'] ?></td>
                                <td><?= $profile['address'] ?></td>
                                <td><?= $profile['education'] ?></td>
                                <td><?= $profile['experience'] ?></td>
                                <td><?= $profile['password'] ?></td>
                                <td class="text-center">
                                  <a href="<?= base_url(); ?>admin/update/<?= $profile['id']; ?>" class="btn btn-primary">Update</a>
                                  <a href="<?= base_url(); ?>admin/delete/<?= $profile['id']; ?>" class="btn btn-danger" onclick="return confirm('Do you want to delete this data?');">Delete</a>
                                </td>
                              </tr>
                            <?php endforeach; ?>
                            <? endif; ?>
                          </tbody>
                      </table>
                  </div>
              </div>
          </section>


        </div>
        <!-- /.container-fluid -->

