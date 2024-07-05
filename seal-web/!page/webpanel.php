<?php
if ($_SESSION['username'] != 'akisung') {
    echo "<meta http-equiv='refresh' content='0; URL=/member'>";
} else {
?>


    <div id="layout-wrapper">
        <div class="main-content mb-4">
            <div class="page-content">
                <div class="container">
                    <div class="row">

                        <style>
                            .textz {
                                font-size: 14px;
                            }
                        </style>
                        <?php include './body/sidebar.php' ?>


                        <div class="col-sm-12 col-md-9">
                            <div class="card">
                                <div class="card-body pt-2">
                                    <div class="p-2">
                                        <ul class="nav nav-pills nav-justified" role="tablist">
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link active" data-toggle="tab" href="#home-1" role="tab" aria-selected="true">
                                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                    <span class="d-none d-sm-block">Item Shop</span>
                                                </a>
                                            </li>
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link" data-toggle="tab" href="#home-2" role="tab" aria-selected="false">
                                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                    <span class="d-none d-sm-block">Item Mall</span>
                                                </a>
                                            </li>
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link" data-toggle="tab" href="#home-3" role="tab" aria-selected="false">
                                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                    <span class="d-none d-sm-block">Login Event</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content p-3 text-muted">

                                            <div class="tab-pane active" id="home-1" role="tabpanel">
                                                <h3>
                                                    Item Shop Category
                                                </h3>
                                                <hr>
                                                <button class="btn btn-sm btn-primary" onclick="add_category();"><i class="fa fa-plus"> Add Category</i></button>
                                                <div class="table-responsive pt-3 pb-3">
                                                    <table id="datatable_itemshop_category" class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th width="10px">#</th>
                                                                <th class="th-lg">Category Name</th>
                                                                <th class="th-sm" width="100px"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            require_once './system/config.php';
                                                            $i = 1;
                                                            $q = dd_q("SELECT * FROM itemshop_category");
                                                            while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $i; ?></td>
                                                                    <td><?php echo $row['category_name']; ?></td>
                                                                    <input type="hidden" value="<?php echo $row['id'] ?>" />
                                                                    <td>
                                                                        <button class="btn btn-sm btn-info" onclick="edit_category(<?php echo $row['idcategory'] ?>, '<?php echo $row['category_name']; ?>');"><i class="fa fa-pencil-alt"></i></button>
                                                                        <button class="btn btn-sm btn-danger" onclick="delete_category(<?php echo $row['idcategory']; ?>);"><i class="fa fa-trash"></i></button>
                                                                    </td>
                                                                </tr>
                                                            <?php $i++;
                                                            } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <br><br>

                                                <h3>
                                                    Item Shop
                                                </h3>
                                                <hr>
                                                <button class="btn btn-sm btn-primary" onclick="add_itemshop();"><i class="fa fa-plus"> Add Item</i></button>
                                                <div class="table-responsive pt-3 pb-3">
                                                    <table id="datatable_itemshop" class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <!-- <th width="10px">#</th> -->
                                                                <th class="th-lg">รูป</th>
                                                                <th class="th-sm">ชื่อ</th>
                                                                <th class="th-sm">หมวดหมู่</th>
                                                                <th class="th-md">ราคา</th>
                                                                <!-- <th class="th-lg">รายละเอียด</th> -->
                                                                <th class="th-md" width="60px"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            require_once './system/config.php';
                                                            $i = 1;
                                                            $q = dd_q("SELECT * FROM itemshop_item JOIN itemshop_category ON itemshop_item.idcategory = itemshop_category.idcategory");
                                                            while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
                                                            ?>
                                                                <tr>
                                                                    <!-- <td><?php echo $i; ?></td> -->
                                                                    <td><img src="assets/img/item_shop/<?php echo $row['images']; ?>" /></td>
                                                                    <td><?php echo $row['name']; ?></td>
                                                                    <td><?php echo $row['category_name']; ?></td>
                                                                    <td><?php echo $row['price']; ?></td>
                                                                    <!-- <td><?php echo $row['detail']; ?></td> -->
                                                                    <input type="hidden" value="<?php echo $row['id'] ?>" />
                                                                    <td>
                                                                        <button class="btn btn-sm btn-info" onclick="edit_itemshop(<?php echo $row['id'] ?>, <?php echo $row['idcategory'] ?>, '<?php echo $row['category_name']; ?>', '<?php echo $row['name']; ?>', '<?php echo $row['item_id']; ?>', '<?php echo $row['item_io']; ?>', '<?php echo $row['item_ioo']; ?>', '<?php echo $row['price']; ?>');"><i class="fa fa-pencil-alt"></i></button>
                                                                        <button class="btn btn-sm btn-danger" onclick="delete_itemshop(<?php echo $row['id']; ?>);"><i class="fa fa-trash"></i></button>
                                                                    </td>
                                                                </tr>
                                                            <?php $i++;
                                                            } ?>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>

                                            <div class="tab-pane" id="home-2" role="tabpanel">
                                                <h3>
                                                    Item Mall
                                                </h3>
                                                <hr>
                                                <button class="btn btn-sm btn-primary" onclick="add_itemmall();"><i class="fa fa-plus"> Add Item</i></button>
                                                <div class="table-responsive pt-3 pb-3">
                                                    <table id="datatable_itemmall" class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <!-- <th width="10px">#</th> -->
                                                                <th class="th-md">รูป</th>
                                                                <th class="th-lg">ชื่อ</th>
                                                                <th class="th-lg">ราคา</th>
                                                                <th class="th-md" width="10px"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            require_once './system/config.php';
                                                            $i = 1;
                                                            $q = dd_q("SELECT * FROM itemmall_item");
                                                            while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
                                                            ?>
                                                                <tr>
                                                                    <!-- <td><?php echo $i; ?></td> -->
                                                                    <td><img src="assets/img/item_mall/<?php echo $row['images']; ?>" /></td>
                                                                    <td><?php echo $row['name']; ?></td>
                                                                    <td><?php echo $row['price']; ?></td>
                                                                    <input type="hidden" value="<?php echo $row['id'] ?>" />
                                                                    <td>
                                                                        <button class="btn btn-sm btn-info" onclick="edit_itemmall(<?php echo $row['id'] ?>, '<?php echo $row['name']; ?>', '<?php echo $row['type']; ?>', '<?php echo $row['price']; ?>', '<?php echo $row['item_id']; ?>', '<?php echo $row['item_io']; ?>', '<?php echo $row['item_limit']; ?>');"><i class="fa fa-pencil-alt"></i></button>
                                                                        <button class="btn btn-sm btn-danger" onclick="delete_itemmall(<?php echo $row['id']; ?>);"><i class="fa fa-trash"></i></button>
                                                                    </td>
                                                                </tr>
                                                            <?php $i++;
                                                            } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="home-3" role="tabpanel">
                                                
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script> - <a href="http://www.sealmaple.com/">MapleSeal</a>.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-right d-none d-sm-block">
                            Edit by Maple
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <div class="modal" id="modal_category" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Item Shop Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_category">
                        <input type="hidden" id="idcategory" name="idcategory">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Category Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="category_name" name="category_name">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-save-category">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modal_itemshop" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Item Shop</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_itemshop" enctype="multipart/form-data">
                        <input type="hidden" id="iditemshop" name="id">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Category</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="itemshop_category" name="idcategory">
                                    <?php
                                        require_once './system/config.php';
                                        $q = dd_q("SELECT * FROM itemshop_category");
                                        while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <option value="<?php echo $row['idcategory']; ?>"><?php echo $row['category_name']; ?></option>
                                        <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="itemshop_name" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Item ID</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="itemshop_id" name="item_id">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Item IO</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="itemshop_io" name="item_io">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Item IOO</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="itemshop_ioo" name="item_ioo">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Price</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="itemshop_price" name="price">
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Detail</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="detail">
                            </div>
                        </div> -->
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Image</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="images" id="itemshop_images">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-save-itemshop">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modal_itemmall" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Item Mall</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_itemmall" enctype="multipart/form-data">
                        <input type="hidden" id="iditemmall" name="id">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="itemmall_name" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Type</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="itemmall_type" name="type">
                                    <option value="Amount">Amount</option>
                                    <option value="Duration">Duration</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Item ID</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="itemmall_id" name="item_id">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Item Option</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="itemmall_io" name="item_io">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Item Limit</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="itemmall_qty" name="item_limit">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Price</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="itemmall_price" name="price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Image</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="images" id="itemmall_images">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-save-itemmall">Save</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable_itemshop_category').DataTable();
            $('#datatable_itemshop').DataTable();
            $('#datatable_itemmall').DataTable();
        });

        // Itemshop Category
        function add_category() {
            jQuery('#idcategory').val('');
            jQuery('#category_name').val('');

            jQuery('#modal_category').modal('show');
        }

        function edit_category(id, name) {
            jQuery('#idcategory').val(id);
            jQuery('#category_name').val(name);

            jQuery('#modal_category').modal('show');
        }

        jQuery('.btn-save-category').on('click', function() {
            jQuery.ajax({
                type: "POST",
                url: "system/api/webpanel.php",
                data: jQuery('#form_category').serialize() + "&action=itemshop_category",
                success: function(por) {
                    if (por == "success") {
                        Swal.fire({
                            text: 'บันทึกสำเร็จแล้ว',
                            icon: 'success',
                            confirmButtonColor: '#00C851',
                            confirmButtonText: 'ตกลง',
                            timer: 2500
                        }).then((result) => {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire({
                            text: por,
                            icon: 'error',
                            confirmButtonColor: '#00C851',
                            confirmButtonText: 'ตกลง',
                            timer: 3500
                        })
                    }
                }
            });
        });

        function delete_category(id) {
            var id = id
            if (id == null) {
                Swal.fire({
                    text: 'Invalid ID',
                    icon: 'error',
                    confirmButtonColor: '#00C851',
                    confirmButtonText: 'ตกลง',
                    timer: 3500
                })

            } else {
                // console.log(id)
                Swal.fire({
                    title: 'คุณแน่ใจมั้ย?',
                    text: "แน่ใจว่าจะลบ",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#00C851',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'ไม่',
                    confirmButtonText: 'ใช่'
                }).then((result) => {
                    if (result.value) {
                        jQuery.ajax({
                            type: "POST",
                            url: "system/api/webpanel.php",
                            data: {
                                idcategory: id,
                                action: "itemshop_category",
                                delete: 1
                            },
                            success: function(por) {
                                if (por == "success") {
                                    Swal.fire({
                                        text: 'บันทึกสำเร็จแล้ว',
                                        icon: 'success',
                                        confirmButtonColor: '#00C851',
                                        confirmButtonText: 'ตกลง',
                                        timer: 2500
                                    }).then((result) => {
                                        window.location.reload();
                                    });
                                } else {
                                    Swal.fire({
                                        text: por,
                                        icon: 'error',
                                        confirmButtonColor: '#00C851',
                                        confirmButtonText: 'ตกลง',
                                        timer: 3500
                                    })
                                }
                            }
                        });
                    }
                })
            }
        };

        // Itemshop
        function add_itemshop() {
            jQuery('#iditemshop').val('');
            jQuery('#itemshop_name').val('');
            jQuery('#itemshop_id').val('');
            jQuery('#itemshop_io').val('0');
            jQuery('#itemshop_ioo').val('0');
            jQuery('#itemshop_price').val('');

            jQuery('#modal_itemshop').modal('show');
        }

        function edit_itemshop(id, idcategory, category_name, name, item_id, item_io, item_ioo, price) {
            jQuery('#iditemshop').val(id);
            jQuery('#itemshop_category').val(idcategory);
            jQuery('#itemshop_name').val(name);
            jQuery('#itemshop_id').val(item_id);
            jQuery('#itemshop_io').val(item_io);
            jQuery('#itemshop_ioo').val(item_ioo);
            jQuery('#itemshop_price').val(price);

            jQuery('#modal_itemshop').modal('show');
        }

        jQuery('.btn-save-itemshop').on('click', function() {
            var form = $('#form_itemshop')[0];
            var formData = new FormData(form);
            formData.append('action', 'itemshop_item');
            // formData.append('images', $('#itemshop_images')[0].files[0]); 

            jQuery.ajax({
                type: "POST",
                url: "system/api/webpanel.php",
                data: formData,
                contentType: false,
                processData: false,
                success: function(por) {
                    if (por == "success") {
                        Swal.fire({
                            text: 'บันทึกสำเร็จแล้ว',
                            icon: 'success',
                            confirmButtonColor: '#00C851',
                            confirmButtonText: 'ตกลง',
                            timer: 2500
                        }).then((result) => {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire({
                            text: por,
                            icon: 'error',
                            confirmButtonColor: '#00C851',
                            confirmButtonText: 'ตกลง',
                            timer: 3500
                        })
                    }
                }
            });
        });

        function delete_itemshop(id) {
            var id = id
            if (id == null) {
                Swal.fire({
                    text: 'Invalid ID',
                    icon: 'error',
                    confirmButtonColor: '#00C851',
                    confirmButtonText: 'ตกลง',
                    timer: 3500
                })

            } else {
                // console.log(id)
                Swal.fire({
                    title: 'คุณแน่ใจมั้ย?',
                    text: "แน่ใจว่าจะลบ",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#00C851',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'ไม่',
                    confirmButtonText: 'ใช่'
                }).then((result) => {
                    if (result.value) {
                        jQuery.ajax({
                            type: "POST",
                            url: "system/api/webpanel.php",
                            data: {
                                id: id,
                                action: "itemshop_item",
                                delete: 1
                            },
                            success: function(por) {
                                if (por == "success") {
                                    Swal.fire({
                                        text: 'บันทึกสำเร็จแล้ว',
                                        icon: 'success',
                                        confirmButtonColor: '#00C851',
                                        confirmButtonText: 'ตกลง',
                                        timer: 2500
                                    }).then((result) => {
                                        window.location.reload();
                                    });
                                } else {
                                    Swal.fire({
                                        text: por,
                                        icon: 'error',
                                        confirmButtonColor: '#00C851',
                                        confirmButtonText: 'ตกลง',
                                        timer: 3500
                                    })
                                }
                            }
                        });
                    }
                })
            }
        };

        // Itemmall
        function add_itemmall() {
            jQuery('#iditemmall').val('');
            jQuery('#itemmall_name').val('');
            jQuery('#itemmall_id').val('');
            jQuery('#itemmall_io').val('0');
            jQuery('#itemmall_limit').val('0');
            jQuery('#itemmall_price').val('');

            jQuery('#modal_itemmall').modal('show');
        }

        function edit_itemmall(id, name, type, price, item_id, item_io, item_limit) {
            jQuery('#iditemmall').val(id);
            jQuery('#itemmall_name').val(name.trim());
            jQuery('#itemmall_type').val(type);
            jQuery('#itemmall_price').val(price);
            jQuery('#itemmall_id').val(item_id);
            jQuery('#itemmall_io').val(item_io);
            jQuery('#itemmall_limit').val(item_limit);

            jQuery('#modal_itemmall').modal('show');
        }

        jQuery('.btn-save-itemmall').on('click', function() {
            var form = $('#form_itemmall')[0];
            var formData = new FormData(form);
            formData.append('action', 'itemmall_item');
            // formData.append('images', $('#itemshop_images')[0].files[0]); 

            jQuery.ajax({
                type: "POST",
                url: "system/api/webpanel.php",
                data: formData,
                contentType: false,
                processData: false,
                success: function(por) {
                    if (por == "success") {
                        Swal.fire({
                            text: 'บันทึกสำเร็จแล้ว',
                            icon: 'success',
                            confirmButtonColor: '#00C851',
                            confirmButtonText: 'ตกลง',
                            timer: 2500
                        }).then((result) => {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire({
                            text: por,
                            icon: 'error',
                            confirmButtonColor: '#00C851',
                            confirmButtonText: 'ตกลง',
                            timer: 3500
                        })
                    }
                }
            });
        });

        function delete_itemmall(id) {
            var id = id
            if (id == null) {
                Swal.fire({
                    text: 'Invalid ID',
                    icon: 'error',
                    confirmButtonColor: '#00C851',
                    confirmButtonText: 'ตกลง',
                    timer: 3500
                })

            } else {
                // console.log(id)
                Swal.fire({
                    title: 'คุณแน่ใจมั้ย?',
                    text: "แน่ใจว่าจะลบ",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#00C851',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'ไม่',
                    confirmButtonText: 'ใช่'
                }).then((result) => {
                    if (result.value) {
                        jQuery.ajax({
                            type: "POST",
                            url: "system/api/webpanel.php",
                            data: {
                                id: id,
                                action: "itemmall_item",
                                delete: 1
                            },
                            success: function(por) {
                                if (por == "success") {
                                    Swal.fire({
                                        text: 'บันทึกสำเร็จแล้ว',
                                        icon: 'success',
                                        confirmButtonColor: '#00C851',
                                        confirmButtonText: 'ตกลง',
                                        timer: 2500
                                    }).then((result) => {
                                        window.location.reload();
                                    });
                                } else {
                                    Swal.fire({
                                        text: por,
                                        icon: 'error',
                                        confirmButtonColor: '#00C851',
                                        confirmButtonText: 'ตกลง',
                                        timer: 3500
                                    })
                                }
                            }
                        });
                    }
                })
            }
        };

    </script>

<?php
}
?>