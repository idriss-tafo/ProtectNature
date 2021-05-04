<!-- Simple Datatable start -->
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">edition des posts</h4>
        <p class="mb-0">ici il sagit de l'affichage, modification, ajout et supression.</p>
    </div>
    <div class="pb-20">
        <table class="data-table table stripe hover nowrap">
            <thead>
                <tr>
                    <th>Id</th>
                    <th class="table-plus datatable-nosort">Name</th>
                    <th>Slug</th>
                    <th>Update Date</th>
                    <th class="datatable-nosort">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $key => $value) : ?>
                    <tr>
                        <td><?php echo $value->id; ?></td>
                        <td class="table-plus"><?php echo $value->name; ?></td>

                        <td><?php echo $value->slug; ?></td>
                        <td><?php echo $value->created_At; ?></td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="<?php echo Router::affiche_url('admin/posts/view/' . $value->id); ?>"><i class="dw dw-eye"></i> View</a>
                                    <a class="dropdown-item" href="<?php echo Router::affiche_url('admin/posts/edit/' . $value->id); ?>"><i class="dw dw-edit2"></i> Edit</a>
                                    <a class="dropdown-item" href="<?php echo Router::affiche_url('admin/posts/delete/' . $value->id); ?>"><i class="dw dw-delete-3"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>< </tbody>
        </table>
    </div>
</div>