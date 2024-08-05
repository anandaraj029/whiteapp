<?php 
include_once('../inc/function.php');
?>
<!-- Main Content -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Card -->
                <div class="card bg-transparent">
                    <div class="card-body bg-white ">

                    <div class="row">
                    <div class="col-6">
                        <h4 class="pl-2 pt-3 pb-2">Sticker List</h4>
                    </div>
                        <div class="col-6 text-right">
                       <button type="button" class="btn" >Create New</button>               
                        </div>
                    </div>
                    </div>

                    <div class="table-responsive">
                        <table class="order-list-table text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID <img src="../../assets/img/svg/table-down-arrow.svg" alt="" class="svg"></th>
                                    <th>Purchase Date <img src="../../assets/img/svg/table-down-arrow.svg" alt="" class="svg"></th>
                                    <th>Customer <img src="../../assets/img/svg/table-down-arrow.svg" alt="" class="svg"></th>
                                    <th>Grand Total <img src="../../assets/img/svg/table-down-arrow.svg" alt="" class="svg"></th>
                                    <th>Tax</th>
                                    <th>Shipping</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <tr>
                                    <td>#00125</td>
                                    <td>14 November 2019</td>
                                    <td>Jim Spencer</td>
                                    <td>$2546.6</td>
                                    <td>$25.6</td>
                                    <td>$5.6</td>
                                    <td>12</td>
                                    <td><button type="button" class="status-btn un_paid">Unpaid</button></td>
                                    <td class="actions">
                                            <span class="contact-edit" data-toggle="modal" data-target="#contactEditModal">
                                                <img src="<?php echo $url; ?>assets/img/svg/c-edit.svg" alt="" class="svg">
                                            </span>
                                            <span class="contact-close">
                                                <img src="<?php echo $url; ?>assets/img/svg/c-close.svg" alt="" class="svg">
                                            </span>
                                        </td>
                                </tr>

                                <tr>
                                    <td>#00126</td>
                                    <td>15 November 2019</td>
                                    <td>Gordon Wood</td>
                                    <td>$645.2</td>
                                    <td>$6.2</td>
                                    <td>$6.2</td>
                                    <td>36</td>
                                    <td><button type="button" class="status-btn on_hold">On Hold</button></td>
                                    <td class="actions">
                                            <span class="contact-edit" data-toggle="modal" data-target="#contactEditModal">
                                                <img src="<?php echo $url; ?>assets/img/svg/c-edit.svg" alt="" class="svg">
                                            </span>
                                            <span class="contact-close">
                                                <img src="<?php echo $url; ?>assets/img/svg/c-close.svg" alt="" class="svg">
                                            </span>
                                        </td>
                                </tr>

                                <tr>
                                    <td>#00127</td>
                                    <td>16 November 2019</td>
                                    <td>Maggie Hawkins</td>
                                    <td>$1546.5</td>
                                    <td>$16.5</td>
                                    <td>$16.5</td>
                                    <td>25</td>
                                    <td><button type="button" class="status-btn on_hold">On Hold</button></td>
                                    <td class="actions">
                                            <span class="contact-edit" data-toggle="modal" data-target="#contactEditModal">
                                                <img src="<?php echo $url; ?>assets/img/svg/c-edit.svg" alt="" class="svg">
                                            </span>
                                            <span class="contact-close">
                                                <img src="<?php echo $url; ?>assets/img/svg/c-close.svg" alt="" class="svg">
                                            </span>
                                        </td>
                                </tr>

                                <tr>
                                    <td>#00128</td>
                                    <td>17 November 2019</td>
                                    <td>Chester Love</td>
                                    <td>$3568.8</td>
                                    <td>$38.8</td>
                                    <td>$8.8</td>
                                    <td>26</td>
                                    <td><button type="button" class="status-btn paid">Paid</button></td>
                                    <td class="actions">
                                            <span class="contact-edit" data-toggle="modal" data-target="#contactEditModal">
                                                <img src="<?php echo $url; ?>assets/img/svg/c-edit.svg" alt="" class="svg">
                                            </span>
                                            <span class="contact-close">
                                                <img src="<?php echo $url; ?>assets/img/svg/c-close.svg" alt="" class="svg">
                                            </span>
                                        </td>
                                </tr>

                                <tr>
                                    <td>#00129</td>
                                    <td>18 November 2019</td>
                                    <td>Clifton Morales</td>
                                    <td>$215.6</td>
                                    <td>$25.6</td>
                                    <td>$5.6</td>
                                    <td>16</td>
                                    <td><button type="button" class="status-btn completed">Completed</button></td>
                                    <td class="actions">
                                            <span class="contact-edit" data-toggle="modal" data-target="#contactEditModal">
                                                <img src="<?php echo $url; ?>assets/img/svg/c-edit.svg" alt="" class="svg">
                                            </span>
                                            <span class="contact-close">
                                                <img src="<?php echo $url; ?>assets/img/svg/c-close.svg" alt="" class="svg">
                                            </span>
                                        </td>
                                </tr>

                                <tr>
                                    <td>#00130</td>
                                    <td>19 November 2019</td>
                                    <td>Tasha Jackson</td>
                                    <td>$46.6</td>
                                    <td>$4.6</td>
                                    <td>$14.6</td>
                                    <td>36</td>
                                    <td><button type="button" class="status-btn completed">Completed</button></td>
                                    <td class="actions">
                                            <span class="contact-edit" data-toggle="modal" data-target="#contactEditModal">
                                                <img src="<?php echo $url; ?>assets/img/svg/c-edit.svg" alt="" class="svg">
                                            </span>
                                            <span class="contact-close">
                                                <img src="<?php echo $url; ?>assets/img/svg/c-close.svg" alt="" class="svg">
                                            </span>
                                        </td>
                                </tr>

                                <tr>
                                    <td>#00131</td>
                                    <td>20 November 2019</td>
                                    <td>Everett Aguilar</td>
                                    <td>$154.8</td>
                                    <td>$14.8</td>
                                    <td>$4.8</td>
                                    <td>25</td>
                                    <td><button type="button" class="status-btn un_paid">Unpaid</button></td>
                                    <td class="actions">
                                            <span class="contact-edit" data-toggle="modal" data-target="#contactEditModal">
                                                <img src="<?php echo $url; ?>assets/img/svg/c-edit.svg" alt="" class="svg">
                                            </span>
                                            <span class="contact-close">
                                                <img src="<?php echo $url; ?>assets/img/svg/c-close.svg" alt="" class="svg">
                                            </span>
                                        </td>
                                </tr>

                                <tr>
                                    <td>#00132</td>
                                    <td>21 November 2019</td>
                                    <td>Sarah Ramos</td>
                                    <td>$15.6</td>
                                    <td>$5.6</td>
                                    <td>$4.8</td>
                                    <td>14</td>
                                    <td><button type="button" class="status-btn on_hold">On Hold</button></td>
                                    <td class="actions">
                                            <span class="contact-edit" data-toggle="modal" data-target="#contactEditModal">
                                                <img src="<?php echo $url; ?>assets/img/svg/c-edit.svg" alt="" class="svg">
                                            </span>
                                            <span class="contact-close">
                                                <img src="<?php echo $url; ?>assets/img/svg/c-close.svg" alt="" class="svg">
                                            </span>
                                        </td>
                                </tr>

                                <tr>
                                    <td>#00133</td>
                                    <td>22 November 2019</td>
                                    <td>Eileen Figueroa</td>
                                    <td>$156.3</td>
                                    <td>$16.3</td>
                                    <td>$6.3</td>
                                    <td>54</td>
                                    <td><button type="button" class="status-btn completed">Completed</button></td>
                                    <td class="actions">
                                            <span class="contact-edit" data-toggle="modal" data-target="#contactEditModal">
                                                <img src="<?php echo $url; ?>assets/img/svg/c-edit.svg" alt="" class="svg">
                                            </span>
                                            <span class="contact-close">
                                                <img src="<?php echo $url; ?>assets/img/svg/c-close.svg" alt="" class="svg">
                                            </span>
                                        </td>
                                </tr>

                                <tr>
                                    <td>#00134</td>
                                    <td>23 November 2019</td>
                                    <td>Harold Harrington</td>
                                    <td>$254.1</td>
                                    <td>$4.1</td>
                                    <td>$4.1</td>
                                    <td>69</td>
                                    <td><button type="button" class="status-btn paid">Paid</button></td>
                                    <td class="actions">
                                            <span class="contact-edit" data-toggle="modal" data-target="#contactEditModal">
                                                <img src="<?php echo $url; ?>assets/img/svg/c-edit.svg" alt="" class="svg">
                                            </span>
                                            <span class="contact-close">
                                                <img src="<?php echo $url; ?>assets/img/svg/c-close.svg" alt="" class="svg">
                                            </span>
                                        </td>
                                </tr>

                                <tr>
                                    <td>#00135</td>
                                    <td>24 November 2019</td>
                                    <td>Tyler Howard</td>
                                    <td>$215.9</td>
                                    <td>$2.9</td>
                                    <td>$1.9</td>
                                    <td>14</td>
                                    <td><button type="button" class="status-btn un_paid">Unpaid</button></td>
                                    <td class="actions">
                                            <span class="contact-edit" data-toggle="modal" data-target="#contactEditModal">
                                                <img src="<?php echo $url; ?>assets/img/svg/c-edit.svg" alt="" class="svg">
                                            </span>
                                            <span class="contact-close">
                                                <img src="<?php echo $url; ?>assets/img/svg/c-close.svg" alt="" class="svg">
                                            </span>
                                        </td>
                                </tr>

                                <tr>
                                    <td>#00136</td>
                                    <td>25 November 2019</td>
                                    <td>Maxine Hogan</td>
                                    <td>$657.6</td>
                                    <td>$7.6</td>
                                    <td>$2.6</td>
                                    <td>47</td>
                                    <td><button type="button" class="status-btn completed">Completed</button></td>
                                    <td class="actions">
                                            <span class="contact-edit" data-toggle="modal" data-target="#contactEditModal">
                                                <img src="<?php echo $url; ?>assets/img/svg/c-edit.svg" alt="" class="svg">
                                            </span>
                                            <span class="contact-close">
                                                <img src="<?php echo $url; ?>assets/img/svg/c-close.svg" alt="" class="svg">
                                            </span>
                                        </td>
                                </tr>

                                <tr>
                                    <td>#00137</td>
                                    <td>26 November 2019</td>
                                    <td>Eleanor Bradley</td>
                                    <td>$2546.6</td>
                                    <td>$25.6</td>
                                    <td>$5.6</td>
                                    <td>26</td>
                                    <td><button type="button" class="status-btn on_hold">On Hold</button></td>
                                    <td class="actions">
                                            <span class="contact-edit" data-toggle="modal" data-target="#contactEditModal">
                                                <img src="<?php echo $url; ?>assets/img/svg/c-edit.svg" alt="" class="svg">
                                            </span>
                                            <span class="contact-close">
                                                <img src="<?php echo $url; ?>assets/img/svg/c-close.svg" alt="" class="svg">
                                            </span>
                                        </td>
                                </tr>

                                <tr>
                                    <td>#00138</td>
                                    <td>27 November 2019</td>
                                    <td>Nettie Stokes</td>
                                    <td>$645.2</td>
                                    <td>$6.2</td>
                                    <td>$6.2</td>
                                    <td>17</td>
                                    <td><button type="button" class="status-btn paid">Paid</button></td>
                                    <td class="actions">
                                            <span class="contact-edit" data-toggle="modal" data-target="#contactEditModal">
                                                <img src="<?php echo $url; ?>assets/img/svg/c-edit.svg" alt="" class="svg">
                                            </span>
                                            <span class="contact-close">
                                                <img src="<?php echo $url; ?>assets/img/svg/c-close.svg" alt="" class="svg">
                                            </span>
                                        </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>
</div>
<!-- End Main Content -->
</div>
<!-- End Main Wrapper -->

<?php 
include_once('../inc/footer.php');
?>

<!-- DataTables scripts -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script>
    $(document).ready(function() {
        $('.order-list-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: 'Order List'
                }
            ],
            "searching": true
        });
    });
</script>
