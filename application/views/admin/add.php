
    <!------------------------------------------- Add Section ------------------------------------------->
    <section id="add">
        <div class="container pl-5 pt-5">
            <h3>Add Data</h3>
        </div>
        <div class="container pt-3 pb-5">
            <div class="card mx-auto" style="max-width: 95%;">
                <div class="card-body" style="max-width: 95%; padding-left: 5%;">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name'); ?>">
                            <small class="form-text text-danger"><?= form_error('name'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username'); ?>">
                            <small class="form-text text-danger"><?= form_error('username'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>">
                            <small class="form-text text-danger"><?= form_error('email'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" id="password" name="password" value="<?= set_value('password'); ?>">
                            <small class="form-text text-danger"><?= form_error('password'); ?></small>
                        </div>
                  
                        <a href="<?= base_url(); ?>admin" class="btn btn-primary float-right">Cancel</a>
                        <button class="btn btn-primary float-right" name="add" style="margin-right: 3%;">Add Data</button>
                    </form>
                </div>
            </div>
        </div>
    </section>