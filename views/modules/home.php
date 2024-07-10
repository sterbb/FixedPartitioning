
<div class="col-12" >
      <div class="card">
              <div class="card-body">
                <h5 class="mt-20" style="text-align:center; font-size: 50px;" >FIXED PARTITIONING
                    <img src="views/images/DISC.png" class="logo-icon" alt="logo icon" style="width:60px; height: 60px;"> 
                </h5>

                    <form method="POST" class="form-horizontal well" id="user-input"role="form">
                        <div class="row" >
                                <div class="col-sm-6">
                                    <h6 class="mt-20" style="text-align:left; font-size: 30px;" >Total Memory</h5>
                                    <input type="text"  value="" placeholder="Enter Total Memory" class="form-control" id="num-totalMemory" name="num-totalMemory" required >
                                </div>  
                                                        
                                <div class="col-sm-6">
                                    <h6 class="mt-20"style=" font-size: 30px;" >OS Size</h5>
                                    <input type="text"  value="" placeholder="Enter OS size" id="num-osSize" name="num-osSize" class="form-control" required >                           
                                </div>
                        </div>
                               
                        <div class="row">
                                <!----B1----->
                                <div class="col-sm-6">  
                                    <h6 class="mt-20" style="font-size: 30px;" >Block Partitions</h5>
                                    <label class="control-label">B1</label>
                                    <input type="text"  value="" placeholder="Enter Block 1" id="num-b1" name="num-b1" class="form-control" required >          
                                </div>
                                <!----J1----->
                                <div class="col-sm-6">  
                                    <h6 class="mt-20" style="font-size: 30px;" >Job Partitions</h5>
                                    <label class="control-label">J1</label>
                                    <input type="text" name="num-j1" id="num-j1" value="" placeholder="Enter Job 1"  class="form-control" required >          
                                </div>

                                <!----B2----->
                                <div class="col-sm-6">  
                                    <label class="control-label">B2</label>
                                    <input type="text"  value=""placeholder="Enter Block 2" id="num-b2" name="num-b2" class="form-control" required >  
                                </div>
                                <!----J2----->
                                <div class="col-sm-6">  
                                    <label class="control-label">J2</label>
                                    <input type="text" name="num-j2" id="num-j2" value=""placeholder="Enter Job 2" class="form-control" required >  
                                </div>

                                <!----B3----->
                                <div class="col-sm-6">  
                                    <label class="control-label">B3</label>
                                    <input type="text"  value="" placeholder="Enter Block 3" id="num-b3" name="num-b3" class="form-control" required >  
                                </div>

                                <!----J3----->
                                <div class="col-sm-6">  
                                    <label class="control-label">J3</label>
                                    <input type="text" name="num-j3" id="num-j3" value="" placeholder="Enter Job 3" class="form-control" required >  
                                </div>

                                <!----B4----->
                                <div class="col-sm-6">  
                                    <label class="control-label">B4</label>
                                    <input type="text"  value="" placeholder="Enter Block 4" id="num-b4" name="num-b4" class="form-control" required >  
                                </div>

                                <!----J4----->
                                <div class="col-sm-6">  
                                    <label class="control-label">J4</label>
                                    <input type="text" name="num-j4" id="num-j4" value="" placeholder="Enter Job 4" class="form-control" required >  
                                </div>

                                <!----B5----->
                                <div class="col-sm-6">  
                                    <label class="control-label">B5</label>
                                    <input type="text"  value="" placeholder="Enter Block 5" id="num-b5" name="num-b5" class="form-control" required >  
                                </div>

                                <!----J5----->
                                <div class="col-sm-6">  
                                    <label class="control-label">J5</label>
                                    <input type="text" name="num-j5" id="num-j5" value="" placeholder="Enter Job 5" class="form-control" required >  
                                </div> 
                                     
                        </div> 

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                    <div class="col-lg-9">
                                        <div class="float-sm-right">
                                            <button type="submit" class="btn btn-success btn-round px-5" id="btn-submit"><i class="fa fa-file"></i>&nbsp;&nbsp;Submit</button>
                                            &nbsp;&nbsp;&nbsp;
                                            <button type="button" class="btn btn-warning btn-round px-5" id="btn-clear"><i class="fa fa-save"></i>&nbsp;&nbsp;Clear</button> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form> <!---End of Form--->

                    <?php
                        $doAllocation = new FixedPartition();
                        $doAllocation -> doFixedPartition();
                    ?>

              


                 
                    <article class="photo">
                        <h6 class="mt-20" style="text-align:center; font-size: 30px;" >First Fit Partition</h5>
                            <div style="width:100%; text-align:center">
                            <img src="views/images/DISC.png" class="center" alt="logo icon" alt="first fit"  style="width:50%; height:50%"; >
                            </div>
                            <section class="mt-20" style="text-align:center;" >
                                <p class="text-auto-size" style="font-size:20px;">
                                <br>Fixed Partitioning is also known as Contiguous memory allocation. Fixed Partitioning is the easiest method, which is used to load more than one process into the main memory.
                                <br>In the first fit approach it allocates the first free partition large enough which can accommodate the process. 
                            </section>
                    </article>
                    <article class="photo" style='text-align:center;'>


                    <footer>
                        <p>© Copyright 2022 Fixed Partition Group All Rights Reserved.</p>
                    </footer>


        </div> <!---End of Card-body--->
    </div> <!---End of Card--->
</div> <!---End of Col--->
            
