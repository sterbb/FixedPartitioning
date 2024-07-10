<?php
class FixedPartition{

     public function doFixedPartition(){
        if(isset($_POST["num-totalMemory"])){

            $osSize;
            $totalMemory;
            $availableMemory;

            //If compaction is needed
            $proceed;

            //multidimensional Array
            $memoryBlocks = array();

            //Array
            $jobSize = array();
            $rejectJob = array();


            //Current Job
            $numJob = 0;

            //Current Block
            $numBlock;
             
            //Blocks
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

            $this->initialTable($osSize,$memoryBlocks);

       
            do{
                $proceed = true;
                $numBlock = 0;
                
                //Reject Job if greater to all memory blocks
                if($jobSize[$numJob] > $memoryBlocks[0][0] && $jobSize[$numJob] > $memoryBlocks[1][0] && $jobSize[$numJob] > $memoryBlocks[2][0] && 
                $jobSize[$numJob] > $memoryBlocks[3][0] && $jobSize[$numJob] > $memoryBlocks[4][0] ){ 

                    array_push($rejectJob, $jobSize[$numJob]);
                    //proceed Next job
                    $numJob++;
                }else{
                    
                        //loop to look for available blocks
                        for($enterJobA=0;$enterJobA<5;$enterJobA++){

                            //Job enter in first memory block that is greater or equal to job size and open
                            if( ($jobSize[$numJob] <= $memoryBlocks[$numBlock][0]) && ( count($memoryBlocks[$numBlock]) != 4 )){

                                $remainingSize = $memoryBlocks[$numBlock][0] - $jobSize[$numJob];
                                array_push($memoryBlocks[$numBlock],"J".strval($numJob+1));
                                array_push($memoryBlocks[$numBlock],$jobSize[$numJob]);
                                array_push($memoryBlocks[$numBlock],$remainingSize);

                                //Output Table
                                echo' <div class="col-md-3 col-xl-3">
                                <h5 class="mt-0">Job '.$memoryBlocks[$numBlock][1].' Enter</h5>';

                                $this->outputTable($osSize,$memoryBlocks);

                            $proceed = false;
                            break;
                            
                            //Proceed to next Block
                            }else{
                                $numBlock++;
                            }
                            
                        }

                        //If Job is still not entered
                        if($proceed == true){
                            $numBlock = 0;
                            
                            //loop to look for blocks that is greater than the current block
                            for($enterJobO =0; $enterJobO<5; $enterJobO++){

                                //Job Exit
                                if( ($jobSize[$numJob] <= $memoryBlocks[$numBlock][0]) && (count($memoryBlocks[$numBlock]) == 4 ) ){

                                    //Output Table
                                    echo' <div class="col-md-3 col-xl-3">
                                    <h5 class="mt-0">Job '.$memoryBlocks[$numBlock][1].' Exit</h5>';
                                    $memoryBlocks[$numBlock][1] = '';

                                    $this->outputTable($osSize,$memoryBlocks);

                                  

                                    //Check if Compaction is needed - Block allocation == Job size
                                    if($memoryBlocks[$numBlock][0] != $memoryBlocks[$numBlock][2]){

                                        //job Exit
                                        array_pop($memoryBlocks[$numBlock]);
                                        array_pop($memoryBlocks[$numBlock]);
                                        array_pop($memoryBlocks[$numBlock]);  
                                        
                                        //Output Table
                                        //Compaction
                                        echo' <div class="col-md-3 col-xl-3">
                                        <h5 class="mt-0">Compaction</h5>';
                            
                                        $this->outputTable($osSize,$memoryBlocks);

                                    }else{

                                        array_pop($memoryBlocks[$numBlock]);
                                        array_pop($memoryBlocks[$numBlock]);
                                        array_pop($memoryBlocks[$numBlock]);  
                                    }

                            

                                    //Enter Job
                                    $remainingSize = $memoryBlocks[$numBlock][0] - $jobSize[$numJob];
                                    array_push($memoryBlocks[$numBlock],"J".strval($numJob+1));
                                    array_push($memoryBlocks[$numBlock],$jobSize[$numJob]);
                                    array_push($memoryBlocks[$numBlock],$remainingSize);

                                    //Output Table
                                    echo' <div class="col-md-3 col-xl-3">
                                    <h5 class="mt-0">Job '.$memoryBlocks[$numBlock][1].' Enter</h5>';
                                    
                                    $this->outputTable($osSize,$memoryBlocks);


                                    break;
                                }else{
                                    //proceed next Block
                                    $numBlock++;
                                }

                            }

                        }  
                    //proceed Next Job
                    $numJob++;


                }

                    
            }while($numJob != 5);

            echo' <div class="rejectJobs" id="rejectJobs">
            <h1>Rejected Jobs:</h1>';
            foreach ($rejectJob as $value){
                echo'<h2>'.$value.' </h2> <br>';
            }
            echo'</div>';

        }
        
    }


    //function for displaying the output
    public static function outputTable($osSize,$memoryBlocks){
         
       echo '<div class="table-responsive">
            <table class="table table-bordered mb-0">
                <thead>
                    <tr class="text-center">
                        <th><h1>OS  '. $osSize.'</h1></th>
                    </tr>
                </thead>
                <tbody>';
            
                    for($i=0; $i<5; $i++){

                        //If Job size is equal to memory block size. Output only 1 row (Available Block)
                        if(count($memoryBlocks[$i]) <2 ){
                                for($i2=0;$i2<1;$i2++){
                                    echo'
                                    <tr class="text-center">
                                        <th scope="row"><h1>'.$memoryBlocks[$i][$i2].'</h1></th>
                                    </tr>'; 
                                }
                            
                        //If Block Size is equal to job size. Output only 1 row (Occupied Block)                            
                        }elseif($memoryBlocks[$i][0] == $memoryBlocks[$i][2]){
                            for($i2=0;$i2<1;$i2++){
                                echo'
                                <tr class="text-center">
                                    <th scope="row"><h1>'.$memoryBlocks[$i][1].' '.$memoryBlocks[$i][2].'</h1></th>
                                </tr>'; 
                            }
                        }

                        //If Job size is lesser than memory block size. Output 2 row (Occupied Block)
                        elseif(count($memoryBlocks[$i])==4){
                            for($i2=0;$i2<1;$i2++){
                            echo'
                            <tr class="text-center">
                                <th scope="row"><h1>'.$memoryBlocks[$i][1].' '.$memoryBlocks[$i][2].'</h1></th>
                            </tr>
                            <tr class="text-center">
                                <th scope="row"><h1>'.$memoryBlocks[$i][3].'</h1></th>
                            </tr>'; 
                            }
                        }
                    };
                    echo'
                    </tbody>
                </table>
            </div>

        </div> <!-- end col -->';

    }

    //output Initial Table
    public static function initialTable($osSize,$memoryBlocks){
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
    }






}

?>