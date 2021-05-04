<!-- Simple Datatable start -->
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">edition des users</h4>
        <p class="mb-0">ici il sagit de l'affichage, modification, ajout et supression.</p>
    </div>
    <div class="pb-20">
        <table class="data-table-export table stripe hover nowrap">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Date</th>
                    <th class="datatable-nosort">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $key => $value) : ?>

                    <tr>
                        <td><?php echo $value->id; ?></td>
                        <td><?php echo $value->email; ?></td>

                        <td><?php echo $value->username; ?></td>
                        <td><?php echo $value->roles; ?></td>
                        <td><?php echo $value->created_at; ?></td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="<?php echo Router::affiche_url('admin/users/view/' . $value->id); ?>"><i class="dw dw-eye"></i> View</a>
                                    <a class="dropdown-item" href="<?php echo Router::affiche_url('admin/users/edit/' . $value->id); ?>"><i class="dw dw-edit2"></i> Edit</a>
                                    <a class="dropdown-item" href="<?php echo Router::affiche_url('admin/users/delete/' . $value->id); ?>"><i class="dw dw-delete-3"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>< </tbody>
        </table>
    </div>

</div>
<a href="<?php echo Router::affiche_url('admin/users/edit'); ?>" class="btn btn-primary">Ajouter</a>