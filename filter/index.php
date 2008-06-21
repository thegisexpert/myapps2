<?php 
include('inc/header.php');
?>
prooohnjn
<title>coderszine.com : Demo Filter Search Result with Ajax, PHP & MySQL</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="js/search.js"></script>
<?php include('inc/container.php');?>
<div class="container">
	<h2>Example: Filter Search Result with Ajax, PHP & MySQL</h2>
	<br>
	<div class="row">		
		<div class="form-group col-md-3">

			<input type="text" class="search form-control" id="keywords" name="keywords" placeholder="By customer or item">			
		</div>
		<div class="form-group col-md-2">
			<input type="button" class="btn btn-primary" value="Search" id="search" name="search" />
		</div>
		<div class="form-group col-md-4">
			<select class="form-control" id="sortSearch">
			  <option value="">Sort By</option>
			  <option value="new">Newest</option>
			  <option value="asc">Ascending</option>
			  <option value="desc">Descending</option>
			  <option value="Processed">Processed</option>
			  <option value="Pending">Pending</option>
			  <option value="Cancelled">Cancelled</option>
			</select>
		</div>
	</div>
    <div class="loading-overlay" style="display: none;"><div class="overlay-content">Loading.....</div></div>
    <table class="table table-striped">
        <thead>
            <tr>
				<th>ID</th>
				<th>Customer Name</th>
				<th>Order Item</th>
				<th>Value</th>
				<th>Date</th>

			<?php			<th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="userData">
			include 'Search.php';
			$search = new Search();
			$allOrders = $search->searchResult(array('order_by'=>'participation_id DESC'));



			if(!empty($allOrders)) {
				foreach($allOrders as $order) {
					$status = '';
					if($order["status"] == 'Processed') {
						$status = 'btn-success';
					} else if($order["status"] == 'Pending') {
						$status = 'btn-warning';
					} else if($order["status"] == 'Cancelled') {
						$status = 'btn-danger';
					}
					echo '
					<tr>
					<td>'.$order["event_date"].'</td>
					<td>'.$order["event_name"].'</td>
					<td>'.$order["name"].'</td>
					<td>$'.$order["name"].'</td>
					<td>'.$order["event_name"].'</td>
					<td><button type="button" class="btn '.$status.' btn-xs">'.$order["status"].'</button></td>
					</tr>';
				}
			} else {
			?>            
				<tr><td colspan="5">No user(s) found...</td></tr>
			<?php } ?>
        </tbody>
    </table>	
</div>	
</div>	
<?php include('inc/footer.php');?>