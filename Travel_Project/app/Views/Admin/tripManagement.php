
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Trip Management</h1>
                    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

                            <div id="addAlert" class="alert alert-success alert-dismissible fade show d-none" role="alert">
                                <strong id="addMsg"></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- <h6 class="m-0 font-weight-bold text-primary">Trip Data</h6>       -->

                        <button type="button" class="btn theme text-white float-right" data-toggle="modal" data-target="#addTripModal">                            
                            Add New Trip
                        </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Trip img</th>
                                            <th>Destination</th>
                                            <th>Place</th>
                                            <th>Dep_date</th>
                                            <th>Ret_date</th>
                                            <th>Price</th>
                                            <th>Seats</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Trip img</th>
                                            <th>Destination</th>
                                            <th>Place</th>
                                            <th>Dep_date</th>
                                            <th>Ret_date</th>
                                            <th>Price</th>
                                            <th>Seats</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="tripdata">
                                        <!-- <tr>
                                            <td>Tiger</td>
                                            <td>System</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                            <td>$320,800</td>
                                        </tr> -->


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



                 <!-- Add Modal -->
     <div class="modal fade" id="addTripModal" tabindex="-1" aria-labelledby="addTripModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addTripModalLabel">Add Trip</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <div id="alertContainer" class="col-12" style="display: none;">
                  <div class="alert alert-danger" role="alert" id="errorMessages"></div>

              </div>
              <form action="" id="tripForm"  enctype="multipart/form-data">
                <div class="form-group">
                    <label for="destination">Destination</label>
                    <select class="form-control" id="cont_id" name="cont_id" required>
                    <option value="">Select Continent</option>

                      <?php foreach($conts as $cont):?>
                        <option value="<?= $cont['cont_id']?>"><?= $cont['cont_name']?></option>
                      <?php endforeach?>
                    </select>
                </div>


                <div class="form-group">
                    <label for="place">Place</label>
                    <select class="form-control" id="place_id" name="place_id" required>
                    </select>
                </div>

                <div class="form-group">
                    <label for="departure">Departure_Date</label>
                    <input type="datetime-local" class="form-control" id="departure" name="departure" aria-describedby="emailHelp" required>
                </div>

                <div class="form-group">
                    <label for="returnd">Return_Date</label>
                    <input type="datetime-local" class="form-control" id="returnd" name="returnd" aria-describedby="emailHelp" required>                
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" aria-describedby="emailHelp" required>
                </div>

                <div class="form-group">
                    <label for="seats">Number of Seats</label>
                    <input type="number" class="form-control" id="seats" name="seats" aria-describedby="emailHelp" required>
                </div>


                <div class="form-group mt-5">
                <label for="tripimg" class="d-block">Trip image</label>
                <input type="file" class="tripimg" id="tripimg" name="tripimg">
                <img id="tripimgPreview" src="#" alt="Trip Image" style="display:none; width:100px; height:100px;"/>
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn theme text-white" id="trip-save">Add Trip</button>
              </div>
        

                
            </form>
              </div>
    
            </div>
          </div>
        </div>
