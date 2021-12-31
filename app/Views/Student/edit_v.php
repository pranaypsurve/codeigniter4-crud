    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3>Edit Student Details 
                            <a href="<?= base_url(); ?>" class="btn btn-danger float-end">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php if(isset($validation)): ?>
                            <?= $validation->listErrors(); ?>
                        <?php endif ?>
                    <form method="post"> 
                        <?= form_open() ?>
                        <div class="mb-3">
                            <label for="fName" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="fName" id="fName" value="<?= $single_students_list["first_name"]; ?>" aria-describedby="fName">
                            <?php if(isset($validation)): ?>
                                <?= $validation->getError('fName'); ?>
                            <?php endif ?>
                        </div>
                        <div class="mb-3">
                            <label for="lName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lName" id="lName" value="<?= $single_students_list["last_name"]; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="rollno" class="form-label">Roll No</label>
                            <input type="text" class="form-control" name="rollno" id="rollno" value="<?= $single_students_list["roll_no"]; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="text" class="form-control" name="age" id="age" value="<?= $single_students_list["age"]; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    <!-- </form> -->
                    <?= form_open() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>