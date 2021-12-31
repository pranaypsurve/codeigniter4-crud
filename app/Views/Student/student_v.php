<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3 class="m-5 text-center">Codeigniter 4 Crud</h3>
                <div class="card mt-5">
                <?php if($session->has('success')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong> <?= $session->get('success'); ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>
                <?php if($session->has('error')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong> <?= $session->get('error'); ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>
                    <div class="card-header">
                        <h3>Student Details 
                            <a href="<?= base_url('student/student/add_student'); ?>" class="btn btn-secondary float-end">Add</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Roll No</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($students_list)): ?>
                                <?php foreach($students_list as $list): ?>
                                <tr>
                                    <th scope="row"><?= esc($list['id']) ?></th>
                                    <td><?= esc($list['first_name']) ?></td>
                                    <td><?= esc($list['last_name']) ?></td>
                                    <td><?= esc($list['roll_no']) ?></td>
                                    <td><?= esc($list['age']) ?></td>
                                    <td><a href="<?= base_url('student/student/edit/'.$list['id']); ?>" class="btn btn-sm btn-primary ">Edit</a> | <a href="<?= base_url('student/student/delete/'.$list['id']); ?>" class="btn btn-sm btn-danger ">Delete</a></td>
                                </tr>
                                <?php endforeach ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan='6'>Data Not Available</td>
                                    </tr>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>