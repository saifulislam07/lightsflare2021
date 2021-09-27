<table  class="table table-striped table-bordered table-hover">
    <tbody>
        <tr>
            <th>Name</th>
            <td><?php echo $userdetails->name; ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $userdetails->email; ?></td>
        </tr>
        <tr>
            <th>phone</th>
            <td><?php echo $userdetails->phone; ?></td>
        </tr>
        <tr>
            <th>Country</th>
            <td><?php echo $this->Common_model->table_info('country', 'id', $userdetails->country)->name; ?></td>
        </tr>
        <tr>
            <th>Regi Date</th>
            <td><?php echo $userdetails->created_at; ?></td>
        </tr>
    </tbody>
</table>