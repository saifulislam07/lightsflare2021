<?php $admin_id = $this->session->userdata('admin_id'); ?>
<div class="col-lg-12">
    <table class="table table-bordered table-striped table-responsive-sm" >
        <tr>
            <th width="5%">SL</th>
            <th width="75%">Image</th>
            <th width="5%">Marks</th>
            <th width="5%">Award</th>
            <th width="10%">Note</th>
        </tr> 
        <?php
        $i = 1;
        foreach ($catWisePhotos as $each) {
            $dataArray = array(
                "judge_id" => $admin_id,
                "photo_id" => $each->id,
            );
            ?>
            <tr data-id="<?php echo $each->id; ?>">
                <td><?php echo $i++; ?></td>
                <td><img width="500px" src="<?php echo base_url('assets/admin/all_submissions/' . $each->image) ?>" alt="<?php echo $each->image ?>"></td>
                <td><input style="width: 50px;" type="text" name="marks" value="<?php
                    $oldmarks = $this->Common_model->table_info_condition('marking', $dataArray);
                    if (!empty($oldmarks->marks)) {
                        echo $oldmarks->marks;
                    }
                    ?>" class="marks"></td>
                <td>
                    <input type="hidden"  name="catid" class="category_id" value="<?php echo $each->category_id ?>">
                    <input type="checkbox" 
                    <?php
                    $oldcheck = $this->Common_model->table_info_condition('marking', $dataArray);
                    if (!empty($oldcheck->award)) {
                        echo $oldcheck->award == 1 ? 'checked' : '';
                    };
                    ?> 
                           name="awarded" class="awarded">
                </td>
                <td>
                    <textarea name="note" type="text" class="note">
                        <?php
                        $oldnote = $this->Common_model->table_info_condition('marking', $dataArray);
                        if (!empty($oldnote->note)) {
                            echo $oldmarks->note;
                        }
                        ?>
                    </textarea>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
