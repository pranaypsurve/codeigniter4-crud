<style>
    span.error{
        color:red;
    }
</style>
<div class="container-fluid">
    
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3>Add Student Details 
                            <a href="<?= base_url(); ?>" class="btn btn-danger float-end">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                    <form method="post"> 
                        <?= form_open() ?>
                        <div class="mb-3">
                            <label for="fName" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="fName" id="fName" value="<?= set_value('fName'); ?>" aria-describedby="fName">
                            <?php if(isset($validation)): ?>
                                <span class="error"><?= $validation->getError('fName'); ?></span>
                            <?php endif ?>
                        </div>
                        <div class="mb-3">
                            <label for="lName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lName" id="lName" value="<?= set_value('lName'); ?>">
                            <?php if(isset($validation)): ?>
                                <span class="error"><?= $validation->getError('lName'); ?></span>
                            <?php endif ?>    
                        </div>
                        <div class="mb-3">
                            <label for="rollno" class="form-label">Roll No</label>
                            <input type="text" class="form-control" name="rollno" id="rollno" value="<?= set_value('rollno');; ?>">
                            <?php if(isset($validation)): ?>
                                <span class="error"><?= $validation->getError('rollno'); ?></span>
                            <?php endif ?>  
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="text" class="form-control" name="age" id="age" value="<?= set_value('age');; ?>"> 
                            <?php if(isset($validation)): ?>
                                <span class="error"><?= display_error($validation,'age'); ?> </span> <!-- created custom helper -->
                            <?php endif ?>  
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