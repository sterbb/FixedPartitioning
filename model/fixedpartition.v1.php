<?php
class FixedPartition{
    
   



     public function set_memoryBlocks(){
        if(isset($_POST["num-totalMemory"])){

            $osSize;
            $totalMemory;
            $availableMemory;
            $memoryBlocks = array();
            $jobSize = array();
            $numBlock = 0;
            $x = 0;
            $b1 = array($_POST["num-b1"]);
            $b2 = array($_POST["num-b2"]);
            $b3 = array($_POST["num-b3"]);
            $b4 = array($_POST["num-b4"]);
            $b5 = array($_POST["num-b5"]);

          
            //multidimensional Array for storing data
            array_push($memoryBlocks, $b1);
            array_push($memoryBlocks, $b2);
            array_push($memoryBlocks, $b3);
            array_push($memoryBlocks, $b4);  
            array_push($memoryBlocks, $b5);

            array_push($jobSize, $_POST["num-j1"]);
            array_push($jobSize, $_POST["num-j2"]);
            array_push($jobSize, $_POST["num-j3"]);
            array_push($jobSize, $_POST["num-j4"]);
            array_push($jobSize, $_POST["num-j5"]);




            
            $osSize = $_POST["num-osSize"];
            $totalMemory = $_POST["num-totalMemory"];
            $availableMemory =  $totalMemory - $osSize;
            echo $totalMemory;
            echo $availableMemory;
            print_r($memoryBlocks);
            print_r($jobSize);

            echo' <div class="col-md-3 col-xl-3">
                                    <h5 class="mt-0">Initial</h5>
                                    
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                                <tr class="text-center">
                                                    <th><h1>OS  '. $osSize.'</h1></th>
                                                </tr>
                                            </thead>
                                            <tbody>';
                                            for($i=0; $i<5; $i++){
                                                for($i2=0;$i2<1;$i2++){
                                                    echo'
                                                    <tr class="text-center">
                                                        <th scope="row"><h1>'.$memoryBlocks[$i][$i2].'</h1></th>
                                                    </tr>'; 
                                                }
                                            };
                                            echo'
                                            </tbody>
                                        </table>
                                    </div>
                                </div> <!-- end col -->
                                                    ';
    
                                          

                                        

            
            do{
                
                //Reject Job if greater to all memory blocks
                if($jobSize[$x] > $memoryBlocks[0][0] && $jobSize[$x] > $memoryBlocks[1][0] && $jobSize[$x] > $memoryBlocks[2][0] && 
                $jobSize[$x] > $memoryBlocks[3][0] && $jobSize[$x] > $memoryBlocks[4][0] ){ 
                    echo"Reject Job";
                    $x++;
                }else{

                    
                    
                    //Job enter in first memory block that is greater or equal to job size and open
                    if( ($jobSize[$x] <= $memoryBlocks[$numBlock][0]) && ( count($memoryBlocks[$numBlock])!=4 )){
                        $remainingSize = $memoryBlocks[$numBlock][0] - $jobSize[$x];
                        array_push($memoryBlocks[$numBlock],"J".strval($x+1));
                        array_push($memoryBlocks[$numBlock],$jobSize[$x]);
                        array_push($memoryBlocks[$numBlock],$remainingSize);
                        echo count($memoryBlocks[$numBlock]);

                        //Output Table
                        echo' <div class="col-md-3 col-xl-3">
                        <h5 class="mt-0">Job '.$memoryBlocks[$numBlock][1].' Enter</h5>
                        
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr class="text-center">
                                        <th><h1>OS  '. $osSize.'</h1></th>
                                    </tr>
                                </thead>
                                <tbody>';
                               
                                for($i=0; $i<5; $i++){
                                    //If Job size is equal to memory block size. Output only 1 row
                                    if(count($memoryBlocks[$i]) <2){
                                            for($i2=0;$i2<1;$i2++){
                                                echo'
                                                <tr class="text-center">
                                                    <th scope="row"><h1>'.$memoryBlocks[$i][1].'  '.$memoryBlocks[$i][$i2].'</h1></th>
                                                </tr>'; 
                                            }
                                      //If Job size is lesser than memory block size. Output 2 row      
                                    }elseif(count($memoryBlocks[$i])==4)
                                        for($i2=0;$i2<1;$i2++){
                                        echo'
                                        <tr class="text-center">
                                            <th scope="row"><h1>'.$memoryBlocks[$i][1] + $memoryBlocks[$i][2].'</h1></th>
                                        </tr>
                                        <tr class="text-center">
                                            <th scope="row"><h1>'.$memoryBlocks[$i][1] + $memoryBlocks[$i][3].'</h1></th>
                                        </tr>'; 
                                        $i2++;
                                    }
                                };
                                echo'
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- end col -->
                                        ';

        
                    
                    ++$x;
                    ++$numBlock; 
                    //Job enter lesser and  
                    }elseif( ($jobSize[$x] <= $memoryBlocks[$numBlock][0]) && ( count($memoryBlocks[$numBlock])!=4 ) ){
                        
                    }



                }

                    
            }while($x != 5);

           
            echo' <div class="col-md-12 col-xl-6">
                            <div class="card">
                                <div class="card-body">
    
                                    <h5 class="mt-0">Bordered table</h5>
                                    <p class="text-muted font-13 mb-4">Add <code>.table-bordered</code> for
                                        borders on all sides of the table and cells.
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Username</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@TwBootstrap</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td colspan="2">Larry the Bird</td>
                                                <td>@twitter</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
            ';

      

            



        }
        
    }



    public function doFixedPartition(){
        echo'<script>alert("hello")</script>';
        $this->set_memoryBlocks();
    }

}

?>