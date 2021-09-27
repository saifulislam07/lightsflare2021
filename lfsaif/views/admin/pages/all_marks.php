
<style>
    * {
        box-sizing: border-box;
    }
    .zoom:hover {
        -ms-transform: scale(3.5); /* IE 9 */
        -webkit-transform: scale(3.5); /* Safari 3-8 */
        transform: scale(3.5); 
    }

    .tablestyle3{
        margin: 0;
        padding: 0;
        line-height: 0;
        font-size: 10px;
    }
</style>

<?php
$color = array(
    '1' => '#EDBB99 ',
    '2' => '#82E0AA',
    '3' => '#AED6F1',
    '4' => '#D7BDE2',
    '5' => '#E6B0AA',
);
?>



<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">

                <div class="col-md-12 col-sm-6 col-12">
                    <div class="card tablestyle3">
                        <div class="card-header">
                            <h3 class="card-title">All Awarded Photos</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Participant</th>
                                            
                                            <th>Category</th>
                                            <th>Image</th>
                                            <th>MBC</th>
                                            <th>AD</th>
                                            <th>SAL</th>
                                            <th>Total</th>
                                            <!--<th>Position</th>-->
                                            <th>Note</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
//                                    $allJudges[]='';                                   
//                                    $allMarks[]='';
//     dumpVar($submission_details);
                                        
                                        //MBC=1336
                                        //AVJIT=1337
                                        //SAF=1338
                                        $i = 1;
                                        $cat_num = 1;
                                        unset($_SESSION['cat_id']);
                                        foreach ($topPhotographs as $each):
                                            if (empty($_SESSION['cat_id'])) {
                                                $_SESSION['cat_id'] = $each->category_id;
                                            }
                                            ?>


                                            <tr style="background-color:<?php echo $color[$each->category_id]; ?>">





                                                <td><?php echo $i++; ?></td>
                                                <td>
                                                    <?php
                                                    echo '<p>'.$each->name.'</p>';
                                                   
                                                    echo '<p style="color: blue">'.$each->email.'</p>';
                                                    echo '<b style="color:red">'.$each->nicename; ?></td>
                                                <td><?php echo $each->title; ?></td>
                                                <td><img class="zoom" width="50px" src="<?php echo site_url('assets/admin/all_submissions/' . $each->image); ?>" alt="<?php echo $each->image ?>" /></td>
                                                <td>
                                                    <?php
                                                    $allJudges = explode(",", $each->individual_judge);
                                                    $allMarks = explode(",", $each->individual_marks);
                                                    ?>
                                                    <?php
                                                    if ($allJudges[0] == 1336) {
                                                        echo $allMarks[0];
                                                    }else if($allJudges[1] == 1336){
                                                        echo $allMarks[1];
                                                    }else if($allJudges[2] == 1336){
                                                         echo $allMarks[2];
                                                    }else{
                                                        echo '0.00';
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php
                                                  
                                                    if ($allJudges[0] == 1337) {
                                                        echo $allMarks[0];
                                                    }else if($allJudges[1] == 1337){
                                                        echo $allMarks[1];
                                                    }else if($allJudges[2] == 1337){
                                                         echo $allMarks[2];
                                                    }else{
                                                        echo '0.00';
                                                    }
                                                  
                                                    ?></td>
                                                <td><?php
                                                     if ($allJudges[0] == 1338) {
                                                        echo $allMarks[0];
                                                    }else if($allJudges[1] == 1338){
                                                        echo $allMarks[1];
                                                    }else if($allJudges[2] == 1338){
                                                         echo $allMarks[2];
                                                    }else{
                                                        echo '0.00';
                                                    }
                                                    ?></td>
                                                <td><?php echo $each->totalMarks; ?></td>
                                                
                                                <td><?php echo $each->note; ?></td>
                                            </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>



